<?php
include "func.php";

echo 'Статистика затрат с '. $_POST['date'].' по '.$_POST['date2'].': <br>';;

echo 'Тип затрат: '. $_POST['type_cost'].'<br>';
$sum = getQiwiSumm($_POST['personId'], $_POST['token'], $_POST['date'], $_POST['date2'], $_POST['type_cost'], $json['nextTxnId'], $json['nextTxnDate']);

echo 'Общая сумма затрат: '. $sum.'<br>';