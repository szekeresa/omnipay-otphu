<?php

use Clapp\OtpHu\Gateway as OtpHuGateway;
use Omnipay\Omnipay;
use Illuminate\Validaton\ValidationException;

class GatewayTestHelper extends TestCase
{
    public function testActualApiCall()
    {
        if (!file_exists('#02299991.privKey.pem')) {
            return;
        }

        return;

        $gateway = Omnipay::create('\\'.OtpHuGateway::class);
        $transactionId = str_replace('-', '', $this->faker->uuid);
        $gateway->setShopId('02299991');
        $gateway->setTransactionId($transactionId);
        $gateway->setPrivateKey(file_get_contents('#02299991.privKey.pem'));
        $gateway->setReturnUrl('https://www.example.com/processing-your-payment');
        $gateway->setTestMode(true);
        try {
            $response = $gateway->purchase([
                'amount' => '100.00',
                'currency' => 'HUF',
            ])->send();

            $response->getTransactionId(); // a reference generated by the payment gateway

            if ($response->isSuccessful()) {
                // payment was successful: update database
                /*
                 * ez sosem történhet meg, mert 3 szereplős fizetést használ az otp,
                 * ami azt jelenti, hogy nem mi kérjük be a bankkártya adatokat, hanem az otp oldala,
                 *
                 * így a terhelés sem sikerülhet anélkül, hogy át ne irányítanánk az otp oldalára
                 */
                print_r($response);
            } elseif ($response->isRedirect()) {
                // redirect to offsite payment gateway
                /*
                 * mindig redirectes választ fogunk kapni a ->puchase()-től, hiszen a háromszereplős fizetés miatt át kell irányítani a felhasználót az otp oldalára
                 */
                //$url = $response->getRedirectUrl();
                //$data = $response->getRedirectData(); // associative array of fields which must be posted to the redirectUrl

                echo "\n\n".'REDIRECT NEEDED TO'."\n";
                $url = $response->getRedirectUrl();
                echo $url."\n";
                echo 'TransactionId: '.$response->getTransactionId();
                echo "\n\n";

                //$response->redirect();
            } else {
                // payment failed: display message to customer
                /*
                 * az otp nem fogadta el a terhelési kérésünket
                 */
                echo $response->getMessage();
            }
        } catch (ValidationException $e) {
            /*
             * hiányzó shopid, hiányzó vagy hibás private key, vagy hiányzó felhasználó adatok
             */
        } catch (Exception $e) {
            // internal error, log exception and display a generic message to the customer
            echo $e->getMessage();

            echo "\n\n".$e->getTraceAsString()."\n";
            exit("\n".'Sorry, there was an error processing your payment. Please try again later.');
        }
    }
}

/*
 * OTP Internetes Kártyás Fizetőfelület, 4.0 verzió

Teszteléshez használatos kártyaszám

Kártyaszám:               Lejárat:              Cvc2 kód:
4908 3660 9990 0425       2014.10 (1014)        823

Teszteléshez használatos cafeteria kártyaszám

Kártyaszám:               Lejárat:              Cvc2 kód:
6101 3240 1000 2441       2006.02 (0206)        nincs


Kártyaszám, melynek terhelését a kártyarendszer minden esetben visszautasítja

Kártyaszám:               Lejárat:              Cvc2 kód:
1111 1111 1111 1117       2004.04 (0404)        111


Pos azonosítók:
HUF: #02299991
EUR: #02299992
USD: #02299992
 */
