<?php 
require_once 'config.php';
require_once 'vendor/autoload.php';
  ?>
<html>
<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">
   
<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid gray;
  border-bottom: 16px solid gray;
  width: 80px;
  display:none;
  height: 80px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}
.ui-datepicker-calendar {
    display: none;
    }
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.docker{
    position: fixed;
    z-index: 9;
    margin-left: 39%;
}
.payment_form{
      margin: 0 auto;
    width: 70%;
}
</style>
  </head>
<body>
  <?php 


$arrOut[]='<div class="alert alert-danger">';
$arrOut[]='<p style="text-align:center;font-weight: 700;color: #d02020;font-size: 18px;">Your plan has expired. Please make a payment to gain access to plan features.</p>';                                                         
$arrOut[]='</div>';
echo join(' ',$arrOut);

  ?>

 <div class="container">
<div class="loader docker" ></div>
        <div class="row">
            <div class="col-md-12">

<div class="panel panel-default panel-flat">
 <div class="panel-body payment_form">
   <div class="alert alert-danger" id="a_x200" style="display: none;"> <strong>Error!</strong> <span class="payment-errors"></span> </div>
<form onsubmit="validate_stripe_subscription_form()" style="" accept-charset="UTF-8" action="" class="require-validation" data-cc-on-file="false" id="subscription-payment-form" method="post">
    <div style="margin:0;padding:0;display:inline">
  <!--    <input name="utf8" type="hidden" value="✓"> -->

    </div>         
<div class="form-row">
   <div class="col-xs-12 form-group  required">
<img src="./images/payment_card.png" class="img-responsive">
</div>
</div>

                
             
            <div class="form-row">
              <div class="col-xs-12 form-group card required">
                <label class="control-label">Name On Card</label>
                <input name="card_holder_name" placeholder="Enter Name" onblur="this.placeholder = 'Enter Name'" onfocus="this.placeholder = ''"  autocomplete="off" class="form-control card-holder-name" type="text">
              </div>
             
            </div>
            
            <div class="form-row">
              <div class="col-xs-12 form-group card required">
                <label class="control-label">Billing Address</label>
                <input name="address" placeholder="Enter Address" onblur="this.placeholder = 'Enter Address'" onfocus="this.placeholder = ''"  autocomplete="off" class="form-control address" type="text">
              </div>
            </div>  
                      

             <div class="form-row">

              <div class="col-xs-6 form-group card required">
                <label class="control-label">Zip</label>
                <input name="zip" placeholder="Enter Zip" onblur="this.placeholder = 'Enter Zip'" onfocus="this.placeholder = ''"  autocomplete="off" class="form-control zip" id="zipcode" type="text">
              </div>

           
<!--             </div>
             <div class='form-row'> -->
              <div class="col-xs-6 form-group card required">
                <label class="control-label">City</label>
                <input name="city" placeholder="Enter City" autocomplete="off"  id ="city_name" class="form-control city" type="text">
              </div>
            </div>


            <div class="form-row">

<!--             </div>                      
            <div class='form-row'> -->
              <div class="col-xs-6 form-group card required">
                <label class="control-label">State</label>
                <input name="state" placeholder="Enter State" id="state_name" autocomplete="off" class="form-control state" type="text">
              </div>
                            <div class="col-xs-6 form-group card required">
                <label class="control-label">Country</label>
                
                <select name="country" class="form-control country">
                <option value="USA">USA</option>                         
                </select>
              </div>
            </div>           

            <div class="form-row clearfix">
              <div class="col-xs-12 form-group card required">
                <label class="control-label">Card Number</label>
                <input placeholder="Enter Card Number" onblur="this.placeholder = 'Enter Card Number'" onfocus="this.placeholder = ''"  autocomplete="off" class="form-control card-number remove_char" size="20" type="text">
              </div>
            </div>

            <div class="form-row pvaline_card">
              <div class="col-xs-6 form-group cvc required">
                <label class="control-label">CVC</label>
                <input autocomplete="off" class="form-control card-cvc remove_char "  placeholder="CVC" onblur="this.placeholder = 'CVC'" onfocus="this.placeholder = ''" size="4" type="text">
              </div>
              <div class="col-xs-6 form-group expiration required">
                <label class="control-label">Expiration</label>
                <input id="date-exp" class="form-control date-picker" placeholder="MM/YYYY" onblur="this.placeholder = 'MM/YYYY'" onfocus="this.placeholder = ''" size="2" type="text">
              </div>
<!--               <div class="col-xs-4 form-group expiration required">
                <label class="control-label">&nbsp;</label>
                <input class="form-control card-expiry-year remove_char" placeholder="YYYY" onblur="this.placeholder = 'YYYY'" onfocus="this.placeholder = ''" size="4" type="text">
              </div> -->
               </div>
           <div class="form-row">
              <div class="col-xs-12 form-group card required">
               <!--   <div class="checkbox"> -->
               <input type="hidden" name="checkbox" value="0">
                <label for="checkbox"><input type="checkbox" name="checkbox" value="recurring" checked>&nbsp;I'd like to be registered for a monthly subscription plan</label>
              </div>
              </div>
            <div class="form-row pvaline_card">
              <div class="col-md-12">
                <div class="form-control total disc" style="font: bold !important;font-size: 15px;font-weight: 800;text-align: center;    background: #ebebeb;">
                  Total Amount To Pay:
                  <span class="amount">$10</span>
                </div>
              </div>
            </div>
            <div id="error_subscription" style="color:red;display:none;"class="payment-errors"></div>
            <div class="form-row pvaline_card">
              <div class="col-md-12 form-group">
                <button class="form-control btn btn-primary submit-btn" type="submit">Pay Now »</button>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12 error form-group hide">
                <div class="alert-danger alert">
                  Please correct the errors and try again.
                </div>

              </div>

            </div>
          </form>
          </div>
          </div>
          </div> 
      </div>
  </div>
  

<script type="text/javascript">


  function validate_stripe_subscription_form(){

$("#subscription-payment-form input[type='text']").each(function(){

     if($(this).val().trim()==''){
      $(this).addClass('error');
      return false;
     }
});
}
// this identifies your website in the createToken call below
Stripe.setPublishableKey("<?php echo $stripe_publication_key; ?>");/*for test*/

$(document).ready(function() {
  
$("#subscription-payment-form").submit(function(event) {
  var valid_err=0;
  $("#subscription-payment-form input[type='text']").each(function(){

     if($(this).val().trim()==''){
      $(this).addClass('error');
 
       valid_err=1;
     }

});
  if(valid_err==1){
    return false;
  }


  
  $('.loader').show();
// disable the submit button to prevent repeated clicks
$('.submit-btn').attr("disabled", "disabled");
// createToken returns immediately - the supplied callback submits the form if there are no errors
                var expgroup = $('#date-exp').val();
                alert(expgroup);
                var expArray = expgroup.split( '/' );
                var expmm = ( expArray[ 0 ] );
                var expyy = ( expArray[ 1 ] );
Stripe.createToken({
number: $('.card-number').val(),
cvc: $('.card-cvc').val(),
exp_month: expmm,
exp_year: expyy,
name: $('.card-holder-name').val(),
address_line1: $('.address').val(),
address_city: $('.city').val(),
address_zip: $('.zip').val(),
address_state: $('.state').val(),
address_country: $('.country').val()

}, stripeResponseHandler);
return false; // submit from callback
});

});


function stripeResponseHandler(status, response) {
 
if (response.error) {
  $('.loader').hide();
 
// re-enable the submit button
$('.submit-btn').removeAttr("disabled");
// show the errors on the form
$(".payment-errors").html(response.error.message);

$(".payment-errors").show();

} else {
var form$ = $("#subscription-payment-form");
// token contains id, last4, and card type
var token = response['id'];
// insert the token into the form so it gets submitted to the server
form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
// and submit
//form$.get(0).submit();
var post_data=$('#subscription-payment-form').serializeArray();
$.ajax({

type: "POST",
url: "stripe_subscription.php",
data: post_data,
cache: false,
success: function(result){
 
    $('.payment-errors').html(result);
      $('.payment-errors').show();
  $('.docker').hide();
  document.getElementById("subscription-payment-form").reset();


}
});
}
}
$(document).ready(function(){

$("#subscription-payment-form input[type='text']").keyup(function() {

var elem=$(this);
var val = elem.val();
if(val!==" ")
{
  elem.removeClass('error');
}
else
{
  elm.addClass('error');
}
});

$('body').delegate('.remove_char','keyup blur',function() {

var elem=$(this);
var val=elem.val();
var removeChar=val.replace(/\D/g,'');
elem.val(removeChar);

});
     $('#date-exp').bind('keyup','keydown', function(event) {
    var inputLength = event.target.value.length;
    if(inputLength === 2){
      var thisVal = event.target.value;
      thisVal += '/';
      $(event.target).val(thisVal);
    }
  })
});
 </script>


</body>
</html>