<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://edge.qiwi.com/qw-limits/v1/persons/'.$_POST['personId'].'/actual-limits?types%5B0%5D=TURNOVER');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Authorization: Bearer '.$_POST['token'];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

$json = json_decode(($result), true); // преобразовываем строку в Ассоциативный JSON массив

echo 'Лимит: '.$json['limits']['RU']['0']['max'].' '.$json['limits']['RU']['0']['currency'].'<br>';
echo 'Расходы: '.$json['limits']['RU']['0']['spent'].' '.$json['limits']['RU']['0']['currency'].'<br>';
echo 'Осталось: '.$json['limits']['RU']['0']['rest'].' '.$json['limits']['RU']['0']['currency'].'<br>';


if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);