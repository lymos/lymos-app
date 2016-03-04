<?php
namespace Home\Common;

use Org\Util\PHPMailer;

class Email {
        private static $init_mail = false;
	private static $mail = null;

	private static function initMail(){
		self::$init_mail = true;
		if(! self::$mail){
			self::$mail = new \Org\Util\PHPMailer(true);
		}
		$config = C('MAIL_CONFIG');
		extract($config);
        self::$mail->IsSMTP();
        self::$mail->CharSet='UTF-8';
        self::$mail->SMTPAuth = true; //开启认证
        self::$mail->Port = $port;
        self::$mail->Host = $host;
        self::$mail->Username = $username;
        self::$mail->Password = $password;
        //$mail->IsSendmail(); 
        //self::$mail->AddReplyTo("","mckee");//回复地址
        self::$mail->From = $from;
        self::$mail->FromName = $from_name;
        
	}

	public static function sendEmail($to, $subject, $content, $is_html = false, $attachment = false){
		if(! self::$init_mail){
			self::initMail();
		}

        self::$mail->AddAddress($to);
        self::$mail->Subject = $subject;
        self::$mail->Body = $content;
        //self::$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; 
        if($attachment){
        	self::$mail->AddAttachment($attachment); 
        }
        if($is_html){
        	self::$mail->IsHTML(true);
        }
        return self::$mail->Send(); 
	}

}
?>