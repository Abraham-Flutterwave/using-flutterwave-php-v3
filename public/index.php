<?php

require __DIR__. '/../vendor/autoload.php';


use Dotenv\Dotenv;
use Flutterwave\Flutterwave;
use Flutterwave\Util\Currency;
use Flutterwave\Service\Bill;
use Flutterwave\Payload;
use Flutterwave\Service\PayoutSubaccounts;
use Flutterwave\Config\PackageConfig;

$dotenv = Dotenv::createImmutable(__DIR__."/../");
$dotenv->safeLoad();

// $biller_code = "BIL099";

// $payload = new Payload();
// // $payload->set("country", "NG");
// // $payload->set("customer_id", "+2349067985861");
// // $payload->set("amount", "2000");
// $payload->set("biller_code", "BIL099");
// $payload->set("customer", "+2349067985861");
// $payload->set("item_code", "AT099");
// // $payload->set("type", "AIRTIME");
// // $payload->set("reference", "TEST_".uniqid().uniqid());

// $service = new Bill();
// // $request = $service->getCategories();
// // $request = $service->validateService("AT099"); # Deprecated.
// // $request = $service->createPayment($payload);
// // $request = $service->validateCustomerInfo($payload);
// $request = $service->getBillerItems("BIL099");

// echo '<pre>';
// print_r($request);
// echo '</pre>';

## Testing PayoutSubaccounts

use Flutterwave\Customer;
use Flutterwave\Service\PayoutSubaccount;

// {
//     "customerId":"test@gmail.com",
//     "currency":"RWF",
//     "amount": 12,
//     "fullName":"Test user",
//     "email":"test@gmail.com",
//     "cardNumber":"5061460166976054667",
//     "cvv":"564",
//     "expiryMonth":"09",
//     "expiryYear":"31",
//     "phone":"+15206897417",
//     "authorization": {
//     "mode": "pin",
//     "pin": "3310"
//     }
// }

// Flutterwave::bootstrap();

// $data = [
//     "amount" => 2000,
//     "currency" => Currency::RWF,
//     "tx_ref" => "TEST-".uniqid().time(),
//     "redirectUrl" => "https://www.example.com",
//     "additionalData" => [
//         // "subaccounts" => [
//         //     ["id" => "RSA_345983858845935893"]
//         // ],
//         "meta" => [
//             "unique_id" => uniqid().uniqid()
//         ],
//         "payment_plan" => null,
//         "card_details" => [
//             "card_number" => "5061460166976054667",
//             "cvv" => "564",
//             "expiry_month" => "09",
//             "expiry_year" => "31",
//             "authorization" => [
//                 "mode" => "pin",
//                 "pin" => "3310"
//             ]
//         ]
//     ],
// ];

// $cardpayment = \Flutterwave\Flutterwave::create("card");
// $customerObj = $cardpayment->customer->create([
//     "full_name" => "Olaobaju Abraham",
//     "email" => "ola2fhahfj@gmail.com",
//     "phone" => "+234900154861"
// ]);
// $data['customer'] = $customerObj;
// $payload  = $cardpayment->payload->create($data);
// $result = $cardpayment->initiate($payload);

// echo "<pre>";
// print_r($result);

## Checkout implementation
// Flutterwave::bootstrap();

$transaction = new \Flutterwave\Service\Transactions(
    PackageConfig::setUp( # use package config with composer.
        $_ENV['FLW_SECRET_KEY'],
        $_ENV['FLW_PUBLIC_KEY'],
        $_ENV['FLW_ENCRYPTION_KEY'],
        $_ENV['FLW_ENV']
    )
);

$response = $transaction->verifyWithTxref('UNIQUE_TRANSACTION_REFERENCE');
print_r($response);