<?php
// Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey('sk_test_BrM2i718KhRuj8UqBZRJheqU00GNpmDKuT');

$intent = \Stripe\PaymentIntent::create([
  'amount' => 1099,
  'currency' => 'eur',
  // Verify your integration in this guide by including this parameter
  'metadata' => ['integration_check' => 'accept_a_payment'],
]);