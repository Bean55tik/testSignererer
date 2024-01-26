<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$ipa = htmlspecialchars($_POST['ipa']);
$p12 = htmlspecialchars($_POST['p12']);
$mobileprovision = htmlspecialchars($_POST['mobileprovision']);
$password = htmlspecialchars($_POST['pass']);

// Upload IPA
$curl = curl_init('//upload.starfiles.co/file');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS,array('upload' => $ipa));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
echo curl_exec($curl);
curl_close($curl);

// Upload P12
$curl = curl_init('//upload.starfiles.co/file');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS,array('upload' => $p12));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
echo curl_exec($curl);
curl_close($curl);

// Upload Mobileprovision
$curl = curl_init('//upload.starfiles.co/file');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS,array('upload' => $mobileprovision));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
echo curl_exec($curl);
curl_close($curl);

// Sign
$response = json_decode(file_get_contents('https://sign.starfiles.co?ipa=' . $ipa .'&p12=' . $p12 . '&mobileprovision=' . $mobileprovision . '&password=' . $password), true);
if($response['status'])
    header('Location: ' . $response['url']);
else
    echo 'Signing Failed';