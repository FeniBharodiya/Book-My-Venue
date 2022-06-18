<?php	
	function sendCOTP($REmail ,$otp) {
            		$to      = $REmail;
                        $subject = 'Book Venue Verify Email OTP';
                        $message = $otp;
                        $headers = 'From: bookvenue01@gmail.com'       . "\r\n" .
                                     'Reply-To: bookvenue01@gmail.com' . "\r\n" .
                                     'X-Mailer: PHP/' . phpversion();

                        mail($to, $subject, $message, $headers);
	}
?>