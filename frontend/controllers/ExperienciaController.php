<?php

namespace frontend\controllers;

use common\models\Categoria;
use common\models\Experiencia;
use app\models\ExperienciaSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExperienciaController implements the CRUD actions for Experiencia model.
 */
class ExperienciaController extends Controller
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
            ]
        );
    }

    /**
     * Lists all Experiencia models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ExperienciaSearch();
        $dataProvider = $searchModel->searchMinhas($this->request->queryParams);
        $query = Experiencia::find()->where(['idUser' => \Yii::$app->user->id]);
        $experiencias = $query->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'experiencias' => $experiencias,
        ]);
    }

    /**
     * Displays a single Experiencia model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Experiencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Experiencia();
        $model->idUser = \Yii::$app->user->id;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        $itemsCategoria = ArrayHelper::map(Categoria::find()->all(), 'id', 'Nome');

        return $this->render('create', [
            'model' => $model,
            'itemsCategoria' => $itemsCategoria,
        ]);
    }

    /**
     * Updates an existing Experiencia model.
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

        $itemsCategoria = ArrayHelper::map(Categoria::find()->all(), 'id', 'Nome');

        return $this->render('update', [
            'model' => $model,
            'itemsCategoria' => $itemsCategoria,
        ]);
    }

    /**
     * Deletes an existing Experiencia model.
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
     * Finds the Experiencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Experiencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Experiencia::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
