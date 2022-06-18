<?php	
	function sendCOTP($O_Email ,$otp) {
            		$to      = $O_Email;
                        $subject = 'Book Venue Login OTP';
                        $message = $otp;
                        $headers = 'From: bookvenue01@gmail.com'       . "\r\n" .
                                     'Reply-To: bookvenue01@gmail.com' . "\r\n" .
                                     'X-Mailer: PHP/' . phpversion();

                        mail($to, $subject, $message, $headers);
	}
?>