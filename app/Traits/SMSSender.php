<?php


namespace App\Traits;

use Illuminate\Support\Facades\Http;

use App\FailedMessage;

trait SMSSender {
    private $api_url = 'https://www.4jawaly.net/api/sendsms.php?';
    private $user = 'username=pcdoctor';
    private $pass = 'password=pbdc741963';

    public function sendSms ($msg, $phone) {
        $message      = "message=" . urlencode($msg);
        $phone_number = "numbers=$phone";
        $encode       = "sender=PCD%20SUPPORT&unicode=e&Rmduplicated=1&return=json";

        $url_sms  = $this->api_url . $this->user . '&' . $this->pass . '&' . $message . '&' . $phone_number . '&' . $encode;
        $response = Http::get($url_sms);
        $response = (array) json_decode($response->body());

        /*
            if the message not sent successfully 
            store the message and the phone
        */
        
        if ($response['Code'] != 100) {
            FailedMessage::create([
                'phone'    => $phone,
                'message'  => $msg,
                'err_code' => $response['Code'],
                'err_msg'  => $response['MessageIs']
            ]);
        }
    }
}