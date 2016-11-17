clapp/omnipay-otphu [![Build Status](https://travis-ci.org/dsge/omnipay-otphu.svg?branch=master)](https://travis-ci.org/dsge/omnipay-otphu) [![Coverage Status](https://coveralls.io/repos/github/dsge/omnipay-otphu/badge.svg?branch=master)](https://coveralls.io/github/dsge/omnipay-otphu?branch=master)
===

Experimental package, not recommended for production.

Usage
---

```
<?php
include 'vendor/autoload.php';

$gateway = Omnipay::create("\\".Clapp\OtpHu\Gateway::class);

$gateway->setShopId("0199123456");
$gateway->setPrivateKey(file_get_contents('myShopKey.privKey.pem'));
$gateway->setTransactionId('myGeneratedTransactionId');
$gateway->setTestMode(false);

try {
    $request = $gateway->purchase([
        'amount' => '100.00',
        'currency' => 'HUF'
    ]);
    $response = $request->send();

    if ($response->isRedirect()){
        $redirectionUrl = $response->getRedirectUrl();
        /**
         * redirect the user to $redurectionUrl
         */
    }
}catch(Exception $e){
    /**
     * something went wrong
     */
}
```

```
// after the user is redirected back to our site by OTP
<?php
include 'vendor/autoload.php';

$gateway = Omnipay::create("\\".Clapp\OtpHu\Gateway::class);

$gateway->setShopId("0199123456");
$gateway->setPrivateKey(file_get_contents('myShopKey.privKey.pem'));
$gateway->setTransactionId('myGeneratedTransactionId');
$gateway->setTestMode(false);

try {
    $response = $gateway->completePurchase([
        'transactionId' => $gateway->getTransactionId(),
    ])->send();
    $response = $request->send();

    if ($response->isSuccessful()){
        /**
         * the user's payment was successful
         */
    }
    if ($response->isPending()){
        /**
         * the user's payment is still pending, we should try $gateway->completePurchase() later
         */
    }
    if ($response->isCancelled()){
        /**
         * the user cancelled the payment
         */
    }
    if ($response->isRejected()){
        /**
         * the payment gateway rejected the user's payment
         */
        $reasonCode = $response->getTransaction()['statuscode']; //OTP's error code string
        $reasonMessage = $response->getRejectionReasonMessage(); //human readable string
    }
}catch(Exception $e){
    /**
     * something went wrong
     */
}
```