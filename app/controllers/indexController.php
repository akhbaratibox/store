<?php

namespace App\Controllers;


use App\classes\Mail;

class IndexController extends BaseController
{
    
    public function show()
    {
        echo "Inside Homepage from controller class";

        echo "test email..";

        echo "<br>";

        $mail = new Mail();
        $data = [
            'to' => 'makhbarati@gmail.com',
            'subject' => 'hi wellcome to',
            'view' => 'welcome',
            'name' => 'mohammad akhbarati',
            'body' => 'test template',

        ];
        if($mail->send($data)){
            echo "email send successfuly";
        }else{
            echo "not email send ";
        }
    }
}
