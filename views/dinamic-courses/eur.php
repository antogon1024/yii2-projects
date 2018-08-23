<?php
$this->registerCssFile('/css/dinamic-courses/dinamic-courses.css');
$this->registerCssFile('/css/dinamic-courses/icons.css');
$this->registerJsFile('/js/dinamic-courses/dinamic-courses.js', ['depends' => [\yii\web\JqueryAsset::className()], 'defer'=>'defer']);

include dirname(__FILE__).'/desctop.php';