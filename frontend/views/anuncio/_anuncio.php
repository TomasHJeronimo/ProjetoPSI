<?php

use yii\helpers\Html;

?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class='tile'>
    <img class='tile-img' style="background-image: url(https://static.pexels.com/photos/9050/pexels-photo.jpg);"/>
    <div class='tile-info'>
        <h1><?= $model->titulo ?></h1>
        <p><?= $model->descricao ?></p>
    </div>
</div>
