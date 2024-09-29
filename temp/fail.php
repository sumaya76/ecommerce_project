<?php


$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("ecomm663b943a78b4c");
$store_passwd=urlencode("ecomm663b943a78b4c@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;

    // echo $status." "."<br>".$tran_date." ".$tran_id." ".$card_type;
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <style>
        .thankyou-wrapper{
          width:100%;
          height:auto;
          margin:auto;
          background:#ffffff; 
          padding:10px 0px 50px;
        }
        .thankyou-wrapper h1{
          font:100px Arial, Helvetica, sans-serif;
          text-align:center;
          color:#333333;
          padding:0px 10px 10px;
        }
        .thankyou-wrapper p{
          font:26px Arial, Helvetica, sans-serif;
          text-align:center;
          color:#333333;
          padding:5px 10px 10px;
        }
        .thankyou-wrapper a{
          font:26px Arial, Helvetica, sans-serif;
          text-align:center;
          color:#ffffff;
          display:block;
          text-decoration:none;
          width:250px;
          background:#E47425;
          margin:10px auto 0px;
          padding:15px 20px 15px;
          border-bottom:5px solid #F96700;
        }
        .thankyou-wrapper a:hover{
          font:26px Arial, Helvetica, sans-serif;
          text-align:center;
          color:#ffffff;
          display:block;
          text-decoration:none;
          width:250px;
          background:#F96700;
          margin:10px auto 0px;
          padding:15px 20px 15px;
          border-bottom:5px solid #F96700;
        }
        </style>
</head>
<body>

    <section class="login-main-wrapper">
        <div class="main-container">
            <div class="login-process">
                <div class="login-main-container">
                    <div class="thankyou-wrapper">
                        
                        <h2>Sorry!</h2>
                    
                       
                          <p>Please try again later</p>
                          <a href="../../../../front/php/public/index.php">Back to home</a>
                          <div class="clr"></div>
                      </div>
                      <div class="clr"></div>
                  </div>
              </div>
              <div class="clr"></div>
          </div>
      </section>
       <!--JS Link-->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>
<?php

} else {

	echo "Failed to connect with SSLCOMMERZ";
}
?>