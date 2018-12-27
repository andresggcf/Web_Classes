<?php

$emailTo = $_GET['to'];
$subject = $_GET['subject'];
$body = $_GET['message'];
$headers = 'From: '.$_GET['from']."\r\n".'Reply to:'.$_GET['from']."\r\n".'x-mailer: PHP/'. phpversion();

$result = array();

$result['success'] = mail($emailTo, $subject, $body, $headers);

if(array_key_exists('callback', $_GET)){

	header('Content-Type: text/javascript; charset=utf8');
    header('Access-Control-Allow-Origin: http://www.example.com/');
    header('Access-Control-Max-Age: 3628800');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

    $callback = $_GET['callback'];
    echo $callback.'('.json_encode($result).');';

}else{
    // normal JSON string
    header('Content-Type: application/json; charset=utf8');

    echo $data;
}

?>