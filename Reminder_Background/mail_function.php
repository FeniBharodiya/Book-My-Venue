<?php	
//	function sendCOTP($REmail,$RVID) {
//            		$to      = $REmail;
//                        $subject = 'Hurry up!!, Venue is waiting for you';
//                        
//                        ob_start();
//                        include './mailtemplet.html';
//                        $body = ob_get_clean();
//                        
//                        $message = 'Dear,sir'
//                                . 'Guess what ??? '.$RVID.' venue that you checked earlear is now finallyyy available so check it out and book it before again it get booked '
//                                . 'Thank you'
//                                . 'team venueazy';
//                        $headers = 'From: bookvenue01@gmail.com'       . "\r\n" .
//                                     'Reply-To: bookvenue01@gmail.com' . "\r\n" .
//                                     'Content-Type: text/html'."\r\n".
//                                 'X-Mailer: PHP/' . phpversion();
//                        mail($to, $subject,$body, $message, $headers);
//	}
	
	function sendCOTP($REmail,$RVID) {
            		$to = $REmail;

                        $subject = 'Website Change Reqest';

                        $headers = 'From:bookvenue01@gmail.com';
                        $headers .= 'Reply-To: bookvenue01@gmail.com' . "\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                        $email_template = './mailtemplet.html';
                        //$message = 'Testing Testing';
                        
                        $message = file_get_contents($email_template);

                        mail($to, $subject, $message, $headers);
	}
?>