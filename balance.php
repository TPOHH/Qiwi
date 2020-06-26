<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://edge.qiwi.com/funding-sources/v2/persons/'.$_POST['personId'].'/accounts');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Authorization: Bearer '.$_POST['token'];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

$json = json_decode(($result), true); // преобразовываем строку в Ассоциативный JSON массив
echo 'Баланс ₽: '.$json['accounts']['0']['balance']['amount'].' ['.$json['accounts']['0']['alias'].']'.'<br>';
echo 'Баланс $: '.$json['accounts']['1']['balance']['amount'].' ['.$json['accounts']['1']['alias'].']'.'<br>';
echo 'Баланс €: '.$json['accounts']['2']['balance']['amount'].' ['.$json['accounts']['2']['alias'].']'.'<br>';

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

