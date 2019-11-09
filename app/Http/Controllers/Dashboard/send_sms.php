<?php 
class CMSMS 
{ 
	  function CreateMessage($ProductToken, $Sender, $Recipient, $Tariff, $Body) 
	  { 
		 $XMLSMS = new SimpleXMLElement('<MESSAGES/>'); 
		 $XMLSMS->addChild('AUTHENTICATION'); 
		 $XMLSMS->AUTHENTICATION->addChild('PRODUCTTOKEN', $ProductToken); 
		 $XMLSMS->addChild('TARIFF'); 
		 $XMLSMS->TARIFF = $Tariff; 
		 $XMLSMS->addChild('MSG'); 
		 $XMLSMS->MSG->addChild('FROM'); 
		 $XMLSMS->MSG->FROM = $Sender; 
		 $XMLSMS->MSG->addChild('BODY'); 
		 $XMLSMS->MSG->BODY = $Body; 
		 $XMLSMS->MSG->addChild('TO'); 
		 $XMLSMS->MSG->TO = $Recipient; 
	return $XMLSMS->asXML(); 
	  }
	  function SendMessage($URL, $Message) 
	  { 
		 $ch = curl_init(); 
		 curl_setopt($ch, CURLOPT_URL, $URL); 
		 curl_setopt($ch, CURLOPT_POST, 1); 
		 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml', 'Content-length: ' . strlen($Message))); 
		 curl_setopt($ch, CURLOPT_POSTFIELDS, $Message); 
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		 $return = curl_exec($ch); 
		 curl_close($ch);
		 return $return; 
	  } 
} 
//Send SMS
$SMS = new CMSMS; 
$ProductToken="0E845632-C291-4892-B664-0E49C81E888D";//token you get in email
$Tariff=0; $Sender="123456789"; //your no
$Recipient=$member->phone; $Body=$template->content;
$XMLtoSend = $SMS->CreateMessage($ProductToken, $Sender, $Recipient, $Tariff, $Body); 
$return=$SMS->SendMessage('http://gateway.cmdirect.nl/cmdirect/gateway.ashx', $XMLtoSend); 
echo $return;
?>
