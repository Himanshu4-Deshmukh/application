<?php
include('includes/function.php');

if(isset($_POST['email_data']))
{  
    $table =$_POST['table'];
	// print_r($_POST['email_data']);die();
	foreach ($_POST['email_data'] as $e ) {

		$emails[]=trim($e['email'],"'"); 
	}

	// print_r($emails);die();
// 	$count =  file_get_contents("mail/count.txt");
    $count = 0;
 	for($i=$count;$i<count($emails);$i++)
	{
		$to  = $emails[$i];
		$subject = 'TRUSTED RTO SERVICE PROVIDER SINCE 2005
';
		$message = file_get_contents("template.html"); 
		$headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: RTO Online@gaadiwalaonline.com\r\n"."X-Mailer: php";
        if(mail($to, $subject, $message, $headers)) {
			$file = fopen("mail/mailsentlist.txt","a+");
			fwrite($file, $to.",\r\n");
			fclose($file);
		        $datas['msg_status'] = "Sent";
		}
		else
		{
			$file = fopen("mail/notmailsentlist.txt","a+"); 
			fwrite($file, $to.",\r\n");
			fclose($file);
			$datas['msg_status']="Not Sent";
		}

        $datas['last_sent_on']= date('d-m-Y h:i:s');
        
        $up = updateData($table, $datas, 'email',$to);
        
	}
	if(up)
	{
	   echo  "Sent" ;
	}
	else
	{
	    echo "Not Sent";
	}

// 	$filec = fopen("mail/count.txt",'w'); 
// 	fwrite($filec, $i);
// 	fclose($filec);
}
?>

