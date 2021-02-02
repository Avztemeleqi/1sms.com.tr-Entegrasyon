<?php
header('Content-Type: text/html; charset=utf-8');
$postUrl='http://panel.1sms.com.tr:8080/api/smspost/v1'; // POST URL
$username='USERNAME'; // Kullanıcı Adı
$password='PASSWORD'; // Şifre
$validity='2880'; // default
$sendDateTime='2021.2.1.19.25.0'; // 2021.2.1.19.25.0 Şeklinde Girilecek
$header='TEST'; // Onaylanmış Mesaj Başlığı Olmalıdır
$numara1='905444444444'; // Numara 90'lı girmeniz önerilir
$mesaj1='MESAJ İÇERİĞİ'; // Mesaj İçeriği
$postData = "" . "<sms>" . "<username>".$username."</username>" . "<password>".$password."</password>" . "<header>".$header."</header>" . "<validity>".$validity."</validity>" . "<message>" . "<gsm>" . "<no>".$numara1."</no>" . "</gsm>" . "<msg><![CDATA[".$mesaj1."]]></msg>" . "</message>" . "</sms>";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $postUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

$xml=simplexml_load_string($xmlString);
$response = curl_exec($ch);

curl_close($ch);
echo $response;


?>
