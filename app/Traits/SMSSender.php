<?php


namespace App\Traits;

trait SMSSender {
    private $api_url = 'https://www.4jawaly.net/api/sendsms.php?';
    private $user = 'username=pcdoctor';
    private $pass = 'password=pbdc741963';

    public function sendSms ($message, $phone_number) {
        $message      = "message=$message";
        $phone_number = "numbers=$phone_number";
        $encode       = "sender=PCD%20SUPPORT&unicode=e&Rmduplicated=1&return=xml";

        $url_sms  = $this->api_url . $this->user . '&' . $this->pass . '&' . urlencode($message) . '&' . $phone_number . '&' . $encode;
        $response_hmsms = file_get_contents($url_sms);
    }
}