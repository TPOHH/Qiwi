<?php
function getQiwiSumm($numPhone, $token, $dateStart, $dataEnd, $type_cost, $nextTxnId, $nextTxnDate)
{
    $nextTxnDate = urlencode($nextTxnDate);
    $sum = 0;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://edge.qiwi.com/payment-history/v2/persons/'.$numPhone.'/payments?startDate='.$dateStart.'T00%3A00%3A00%2B03%3A00&endDate='.$dataEnd.'T23%3A59%3A59%2B03%3A00&operation='.$type_cost.'&rows=50&nextTxnId='.$nextTxnId.'&nextTxnDate='.$nextTxnDate);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


    $headers = array();
    $headers[] = 'Accept: application/json';
    $headers[] = 'Authorization: Bearer '.$token;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    $json = json_decode(($result), true); // преобразовываем строку в Ассоциативный JSON массив

    foreach ($json['data'] as $tranzaction) {
        if ($tranzaction['status'] == 'SUCCESS' or $tranzaction['status'] == 'WAITING') {
            if ($tranzaction['type'] == 'OUT') {
                $sum +=$tranzaction['total']['amount'];
                //echo $sum.' ['.$tranzaction['total']['amount'].'] ['.$tranzaction['txnId'].']<br>';
            }
        }
    }




   // echo '----------------<br>';

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    if ($json['nextTxnId'] != '')  {
       $sum += getQiwiSumm($_POST['personId'], $_POST['token'], $_POST['date'], $_POST['date2'], $_POST['type_cost'], $json['nextTxnId'], $json['nextTxnDate']);
        //echo 'не пусто '.$json['nextTxnId'].'<br>' ;
    }
    return $sum;
}