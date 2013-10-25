<?php
require_once(APPPATH.'libraries/stripe/Stripe.php');
Stripe::setApiKey("sk_test_ikqKx5SJpIQpPQqSblf40sAJ");
// Get the credit card details submitted by the form
//$token = $stripeToken;

// Create the charge on Stripe's servers - this will charge the user's card
try 
{
  $charge = Stripe_Charge::create(array(
  "amount" => $amount, // amount in cents, again
  "currency" => "usd",
  "card" => $token,
  "description" => $description)
);
echo "1";
} 
catch(Stripe_CardError $e) 
{
  echo " The card has been declined";

}

?>
