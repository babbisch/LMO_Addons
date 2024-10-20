<?php

function tippsend($subject, $mailtext, $to, $from, $reply)
{
    require_once (PATH_TO_LMO . '/includes/PHPMailer.php');
    $mail = new PHPMailer(true);

    $mail->addAddress($to);
    $mail->setFrom($reply, $from);
    $mail->Body = iconv('UTF-8', 'ISO-8859-1', $mailtext);
    $mail->Subject = iconv('UTF-8', 'ISO-8859-1', $subject);
    if ($mail->send()) {
        $mail->ClearAllRecipients();
        $mail->ClearReplyTos();
    } else {
        $mail->ErrorInfo();
        $mail->ClearAllRecipients();
        $mail->ClearReplyTos();
    }
};

?>