<?php
//error_reporting(E_ALL | E_STRICT);
//ini_set('display_startup_errors', 1);
//ini_set('display_errors', '1');

if ($_POST['work_mode'] == 'limit') {
    require ('limit.php');
} elseif ($_POST['work_mode'] == 'balance') {
    require ('balance.php');
} elseif ($_POST['work_mode'] == 'cost'){
    require ('cost.php');
} else {
    echo 'Ни одно из условий не подошло, введите данные, выберете режим работы и попробуйте еще раз';
}