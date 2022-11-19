<?php

use yii\db\Migration;

/**
 * Class m221117_154851_init_rbac
 */
class m221117_154851_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // add "createPost" permission
        $createPost = $auth->createPermission('post/create');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // add "updatePost" permission
        $updatePost = $auth->createPermission('post/update');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        //add "deletePost" permission
        $deletePost = $auth->createPermission('post/delete');
        $deletePost->description = 'Delete own post';
        $auth->add($deletePost);

        // add "author" role and give this role the "createPost" permission
        $common_user = $auth->createRole('common_user');
        $auth->add($common_user);
        $auth->addChild($common_user, $createPost);
        $auth->addChild($common_user, $updatePost);
        $auth->addChild($common_user, $deletePost);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $common_user);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($common_user, 2);
        $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221117_154851_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
