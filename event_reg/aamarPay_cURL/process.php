<?php
error_reporting(0); //warning hide

if(!isset($_POST['MEM_NAME'])){
    echo "Direct access restricted";
    exit();
}

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){
  $fullName=$_POST['MEM_NAME'];
  $email=$_POST['PRE_EMAIL'];
  $phone_number=$_POST['MEM_MOBILE_NO'];
  $amount= $_POST['TOTAL_PAYABLE'];
  $OTC_CHARGE=$_POST['OTC_CHARGE'];
  $INVOICE_AMOUNT=$_POST['INVOICE_AMOUNT'];
  $PRE_ADDR='Dhaka';
  $DIST_DESC='53';
  $DIV_DESC='01';
  $MEM_ID=$_POST['MEM_ID'];
  $INV_NO=$_POST['INV_NO'];
  
   
}


function rand_string( $length ) {
	$str="";
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++) { $str .= $chars[ rand( 0, $size - 1 ) ]; }
	return $str;
}
function redirect_to_merchant($url) {

	?>
    <html xmlns="http://www.w3.org/1999/xhtml">
      <head><script type="text/javascript">
        function closethisasap() { document.forms["redirectpost"].submit(); } 
      </script></head>
      <body onLoad="closethisasap();">
      
        <form name="redirectpost" method="post" action="<?php echo 'https://sandbox.aamarpay.com/'.$url; ?>"></form>
      </body>
    </html>
    <?php	
    exit;
} 

$cur_random_value=rand_string(10);


$url = 'https://sandbox.aamarpay.com/request.php';
$fields = array(
    'store_id' => 'aamarpaytest', 'amount' => $amount, 'payment_type' => 'VISA',
    'currency' => 'BDT', 'tran_id' => $cur_random_value,
    'cus_name' => $fullName, 'cus_email' => $email,
    'cus_add1' => $PRE_ADDR, 'cus_add2' => $PRE_ADDR,
    'cus_city' => $DIST_DESC, 'cus_state' => $DIV_DESC, 'cus_postcode' => $PRE_POST_CODE,
    'cus_country' => 'Bangladesh', 'cus_phone' => $phone_number,
    'cus_fax' => 'Not¬Applicable', 'ship_name' => $fullName,
    'ship_add1' => $PRE_ADDR, 'ship_add2' => $PRE_ADDR,
    'ship_city' => $DIST_DESC, 'ship_state' => $DIV_DESC,
    'ship_postcode' => $PRE_POST_CODE, 'ship_country' => 'Bangladesh',
    'desc' => 'Bandhan', 'success_url' => 'https://bandhan84.com/event_reg/aamarPay_cURL/success.php',
    'fail_url' => 'https://bandhan84.com/event_reg/aamarPay_cURL/fail.php',
    'cancel_url' => 'https://bandhan84.com/event_reg/aamarPay_cURL/cancel.php',
    'opt_a' => $INVOICE_AMOUNT, 'opt_b' => $OTC_CHARGE,
    'opt_c' => $INV_NO, 'opt_d' => $MEM_ID,
    'signature_key' => 'dbb74894e82415a2f7ff0ec3a97e4183');
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&'); 
$ch = curl_init();
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_URL, $url);  
curl_setopt($ch, CURLOPT_POST, count($fields)); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));	
curl_close($ch); 

redirect_to_merchant($url_forward);

?>