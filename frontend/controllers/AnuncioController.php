<?php

namespace frontend\controllers;

use common\models\Anuncio;
use common\models\Categoria;
use common\models\Empresa;
use frontend\models\AnuncioSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnuncioController implements the CRUD actions for Anuncio model.
 */
class AnuncioController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['update', 'delete'],
                    'rules' => [
                        [
                            'actions' => ['update','delete'],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function ($rule, $action) {
                                if ($this->isUserAuthor()) {
                                    return true;
                                }
                                return false;
                            }
                        ],
                    ],
                ],
            ]
        );
    }

    public function isUserAuthor()
    {
       $idEmpresa = $this->findModel(\Yii::$app->request->get('id'))->id_Empresa;
       $empresa = Empresa::find()->where(['id' => $idEmpresa]);
       $query = $empresa->all();

       $funciona = 0;

       foreach ($query as $emp){
           if ($emp->idAdmin == \Yii::$app->user->id){
               $funciona = 1;
           }
       }


       if ($funciona == 1){
           return true;
       }
       else{
           return false;
       }

    }

    /**
     * Lists all Anuncio models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AnuncioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $items = ArrayHelper::map(Categoria::find()->all(), 'id', 'Nome');
        $empresas = ArrayHelper::map(Empresa::find()->all(), 'id', 'Nome');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'items' => $items,
            'empresas' => $empresas,
        ]);
    }

    /**
     * Displays a single Anuncio model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $query = Empresa::find();
        $empresas = $query->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'empresas' => $empresas,
        ]);
    }

    /**
     * Creates a new Anuncio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Anuncio();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        $items = ArrayHelper::map(Empresa::find()->where(['idAdmin' => \Yii::$app->user->id])->all(), 'id', 'Nome');
        $itemsCategoria = ArrayHelper::map(Categoria::find()->all(), 'id', 'Nome');
        $query = Empresa::find();
        $empresas = $query->all();

        return $this->render('create', [
            'model' => $model,
            'items' => $items,
            'empresas' => $empresas,
            'itemsCategoria' => $itemsCategoria,
        ]);
    }

    /**
     * Updates an existing Anuncio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }


        $items = ArrayHelper::map(Empresa::find()->where(['idAdmin' => \Yii::$app->user->id])->all(), 'id', 'Nome');
        $itemsCategoria = ArrayHelper::map(Categoria::find()->all(), 'id', 'Nome');
        $query = Empresa::find()->where(['idAdmin' => \Yii::$app->user->getId()]);
        $empresas = $query->all();

        return $this->render('update', [
            'model' => $model,
            'items' => $items,
            'empresas' => $empresas,
            'itemsCategoria' => $itemsCategoria,
        ]);
    }

    /**
     * Deletes an existing Anuncio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Anuncio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Anuncio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Anuncio::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
