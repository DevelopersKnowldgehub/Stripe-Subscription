<?php
require_once 'config.php';
require_once 'vendor/autoload.php';

if($_POST)
{

\Stripe\Stripe::setApiKey("$stripe_secret_key");  
$err = '';

try {
if (!isset($_POST['stripeToken']))
throw new Exception("The Stripe Token was not generated correctly");
if(!empty($_POST['checkbox'] && $_POST['checkbox'] == "recurring")) /*----for recurring payment------*/
{
$custarr= \Stripe\Customer::create(array(
                                 "name" => $_POST['card_holder_name'],
                                 "source" => $_POST['stripeToken']
                                     ));
$result=   \Stripe\Subscription::create(array(
                                   "customer" =>$custarr['id'],
                                   "plan" => "plan_GXSrgptP0SEzSs"
                                    ));
}
else{    /*------------for monthly payment-------------*/

$result=  \Stripe\Charge::create(array("amount" =>10*100,
                          "currency" => "usd",
                        "card" => $_POST['stripeToken'])); 
}


if($result)
{
echo "Your payment was successful.";
}else{
echo " Please correct the errors and try again.";
}

}
catch (Exception $e) {
$err = $e->getMessage();
echo $err;
}
}
?>
