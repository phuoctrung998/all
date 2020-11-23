<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@rootWeb', dirname(dirname(__DIR__)));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
if(isset($_SERVER['HTTPS']))
{
    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
}
else
{
  $protocol = 'http';
}
Yii::setAlias('@webDomain',$protocol.'://'.$_SERVER['SERVER_NAME']);

