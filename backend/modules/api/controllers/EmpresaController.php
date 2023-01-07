<?php

namespace app\modules\api\controllers;

use common\models\User;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

class EmpresaController extends ActiveController
{
    public $modelClass = 'common\models\Empresa';
}


?>
