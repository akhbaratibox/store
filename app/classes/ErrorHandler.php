<?php


namespace App\classes;


class ErrorHandler
{
    public function hendleErrors($error_number
    , $error_message, $error_file, $error_line){

        $error = "[{$error_number}] An error occured
        in file {$error_file} on {$error_line}: $error_message";

        $environment = getenv('APP_ENV');

        if($environment == 'local'){
            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
        }else{
            $data = [
                'to' => getenv('ADMIN_EMAIL'),
                'subject' => 'System Error',
                'view' => 'errors',
                'name' => 'admin',
                'body' => $error,

            ];

            ErrorHandler::emailAdmin($data)->outputFriedlyError();
        }
    }

    public function outputFriedlyError(){
        ob_end_clean();
        view('errors/generic');
        exit();
    }
    public static function emailAdmin($data){
        $mail = new Mail();
        $mail->send($data);

        return new static();
    }

}
