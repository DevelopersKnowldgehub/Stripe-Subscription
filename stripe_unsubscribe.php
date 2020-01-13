<?php
require_once 'config.php';
require_once 'vendor/autoload.php';

if($_POST)
{

\Stripe\Stripe::setApiKey("$stripe_secret_key");  
$err = '';

try {
throw new Exception("Cannot be deleted");
if(!empty($_POST['unsubscribe']))
{

$subscription = \Stripe\Subscription::retrieve(
  'sub_GXSu3lzfnJXOQC'
);
$subscription->delete();


}
catch (Exception $e) {
$err = $e->getMessage();
echo $err;
}
}
?>
