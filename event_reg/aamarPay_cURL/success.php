<?php
if($_POST['pay_status']=="Successful"){
    $merTxnId= $_POST['mer_txnid'];
    
}

$curl_handle=curl_init();
curl_setopt($curl_handle,CURLOPT_URL,"https://sandbox.aamarpay.com/api/v1/trxcheck/request.php?request_id=$merTxnId&store_id=aamarpaytest&signature_key=dbb74894e82415a2f7ff0ec3a97e4183&type=json");

curl_setopt($curl_handle, CURLOPT_VERBOSE, true);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
$buffer = curl_exec($curl_handle);
curl_close($curl_handle);
$a = (array)json_decode($buffer);
// echo "<pre>";
// print_r($a);
// echo "</pre>";

$paystatus=$a['pay_status'];
    $pg_txnid=$a['pg_txnid'];
    $amount=$a['amount'];
    $mer_txnid=$a['mer_txnid'];
    $merchant_id=$a['merchant_id'];
    $store_id=$a['store_id'];
    $currency=$a['currency'];
    $currency_merchant=$a['currency_merchant'];
    $convertion_rate=$a['convertion_rate'];
    $store_amount='';
    $date=$a['date'];
    $bank_trxid=$a['bank_trxid'];
    $cardnumber=$a['cardnumber'];
    $cardholder='';
    $bin_cardtype=$a['bin_cardtype'];
    $opt_a=$a['opt_a'];
    $opt_b=$a['opt_b'];
    $opt_c=$a['opt_c'];
    $opt_d=$a['opt_d'];
    $ip=$a['ip'];
    $reason='';
    $other_currency='';
    $success_url='';
    $fail_url='';
    $pg_service_charge_BDT='';
    $pg_service_charge_USD='';
    $pg_card_bank_name='';
    $pg_card_bank_country='';
    $risk_level=$a['risk_level'];
    $cus_phone=$a['cus_phone'];
    //$status=$a['status_code'];

    include "connection.php";

    $returnval = 0;
    



        $stid = oci_parse($conn, "begin PKG_PAYMENT.DPD_PAYMENT_INSERT(:o_status,:paystatus,:pg_txnid,:amount,:mer_txnid,:merchant_id,:store_id,:currency,:currency_merchant,:convertion_rate,:store_amount,:date,:bank_trxid,:cardnumber,:cardholder,:bin_cardtype,:opt_a,:opt_b,:opt_c,:opt_d, :ip, :reason,:other_currency,:success_url,:fail_url,:pg_service_charge_BDT,
    :pg_service_charge_USD,:pg_card_bank_name,:pg_card_bank_country,:risk_level,:p_MEM_MOBILE_NO,:inv_type); end;");
//,:p_INVOICE_AMOUNT,:p_OTC_AMOUNT,:P_INV_NO,:p_MEM_ID

        oci_bind_by_name($stid, ":o_status", $returnval, -1, SQLT_INT);
        oci_bind_by_name($stid, ":paystatus", $paystatus, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":pg_txnid", $pg_txnid, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":amount", $amount, -1, SQLT_INT);
        oci_bind_by_name($stid, ":mer_txnid", $mer_txnid, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":merchant_id", $merchant_id, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":store_id", $store_id, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":currency", $currency, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":currency_merchant", $currency_merchant, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":convertion_rate", $convertion_rate, -1, SQLT_INT);
        oci_bind_by_name($stid, ":store_amount", $store_amount, -1, SQLT_INT);
        oci_bind_by_name($stid, ":date", $date, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":bank_trxid", $bank_trxid, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":cardnumber", $cardnumber, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":cardholder", $cardholder, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":bin_cardtype", $bin_cardtype, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":opt_a", $opt_a, -1, SQLT_INT);
        oci_bind_by_name($stid, ":opt_b", $opt_b, -1, SQLT_INT);
        oci_bind_by_name($stid, ":opt_c", $opt_c, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":opt_d", $opt_d, -1, SQLT_INT);
        oci_bind_by_name($stid, ":ip", $ip, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":reason", $reason, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":other_currency", $other_currency, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":success_url", $success_url, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":fail_url", $fail_url, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":pg_service_charge_BDT", $pg_service_charge_BDT, -1, SQLT_INT);
        oci_bind_by_name($stid, ":pg_service_charge_USD", $pg_service_charge_USD, -1, SQLT_INT);
        oci_bind_by_name($stid, ":pg_card_bank_name", $pg_card_bank_name, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":pg_card_bank_country", $pg_card_bank_country, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":risk_level", $risk_level, -1, SQLT_CHR);
        
        //oci_bind_by_name($stid, ":p_INVOICE_AMOUNT", $_SESSION['INVOICE_AMOUNT'], -1, SQLT_INT);
        //oci_bind_by_name($stid, ":p_OTC_AMOUNT", $_SESSION['OTC_CHARGE'], -1, SQLT_INT);
        //oci_bind_by_name($stid, ":P_INV_NO", $_SESSION['INV_NO'], -1, SQLT_CHR);
        //oci_bind_by_name($stid, ":p_MEM_ID", $_SESSION['MEM_ID'], -1, SQLT_INT);
        oci_bind_by_name($stid, ":p_MEM_MOBILE_NO", $cus_phone, -1, SQLT_CHR);
        oci_bind_by_name($stid, ":inv_type", $inv_type, -1, SQLT_CHR);
    
        

        oci_execute($stid);
       // print $returnval;


        if ($returnval === 1) {
            echo '<script>
            // alert("Payment Successfully Completed");

            // window.location.href = "http://localhost/bandhan_84_carousel/event_reg/alert.php";
            window.location.href = "https://bandhan84.com/event_reg/alert.php";
            // window.location.href = "https://ndcaa.iadmissionbd.net/pay_slip.php";
        </script>';
        } 

        oci_free_statement($stid);
        oci_close($conn);


?>

