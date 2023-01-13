<?php

use yii\db\Migration;

/**
 * Class m221115_213838_init_rbac
 */
class m221115_213838_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;


        $createAdd = $auth->createPermission('createAdd');
        $createAdd->description = 'Create a add';
        $auth->add($createAdd);

        $updatePost = $auth->createPermission('updateAdd');
        $updatePost->description = 'Update add';
        $auth->add($updatePost);


        $empresa = $auth->createRole('empresa');
        $auth->add($empresa);
        $auth->addChild($empresa, $createAdd);
        $auth->addChild($empresa, $updatePost);


        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $empresa);


        $auth->assign(utilizador,3);
        $auth->assign(empresa, 2);
        $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221115_213838_init_rbac cannot be reverted.\n";
        $auth = Yii::$app->authManager;

        $auth->removeAll();

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221115_213838_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
