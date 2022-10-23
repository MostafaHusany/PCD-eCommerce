<?php


namespace App\Traits;

use Illuminate\Support\Facades\Http;

use App\SentSMS;

trait SMSSender {
    private $api_url = 'https://www.4jawaly.net/api/sendsms.php?';
    private $user = 'username=pcdoctor';
    private $pass = 'password=pbdc741963';

    public function sendSms ($msg, $phone, SentSMS $requested_sms = null) {

        $requested_sms = isset($requested_sms) ? $requested_sms : SentSMS::create([
            'phone'    => $phone,
            'message'  => $msg
        ]);

        $message      = "message=" . urlencode($msg);
        $phone_number = "numbers=$phone";
        $encode       = "sender=Dwingsa&unicode=e&Rmduplicated=1&return=json";

        $url_sms  = $this->api_url . $this->user . '&' . $this->pass . '&' . $message . '&' . $phone_number . '&' . $encode;
        $response = Http::get($url_sms);
        $response = (array) json_decode($response->body());
    

        /*
            if the message not sent successfully 
            store the message and the phone
        */
        
        if ($response['Code'] != 100) {
            $requested_sms->status   = -1;
            $requested_sms->err_code = $response['Code'];
            $requested_sms->err_msg  = $response['MessageIs'];
            $requested_sms->save();
        } else {
            $requested_sms->status = 1;
            $requested_sms->save();
        }
        
        return $requested_sms->status == 1;
    }
}