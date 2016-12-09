<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;

use PayPal\Api\Amount;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Payer;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentCard;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;

class Paypal extends Model
{
    const PAYMENT_PAYPAL = 'paypal';
    const PAYMENT_CARD = 'credit_card';

    private $clientID;
    private $clientSecret;
    private $apiContext;
    private $redirectUrls;

    private $paymentType;

    public function __construct($paymentType)
    {
        $this->clientID = config('paypal.client_id');
        $this->clientSecret = config('paypal.client_secret');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential($this->clientID, $this->clientSecret)
        );

        $this->redirectUrls = new RedirectUrls();
        $this->redirectUrls->setReturnUrl(url('payment/success'))
                           ->setCancelUrl(url('payment/failed'));

        $this->paymentType = $paymentType;
    }

    public function paymentPaypal ()
    {
        # code...
    }

    public function paymentCard ()
    {
        $card = new PaymentCard([
            'type' => 'visa',
            'number' => '4669424246660779',
            'expire_month' => '11',
            'expire_year' => '2019',
            'cvv2' => '012',
            'first_name' => 'Joe',
            'billing_country' => 'US',
            'last_name' => 'Shopper',
        ]);

        $fundingInstrument = new FundingInstrument();
        $fundingInstrument->setPaymentCard($card);

        return $fundingInstrument;
    }

    public function payer (FundingInstrument $fundingInstrument)
    {
        $payer = new Payer();
        $payer->setPaymentMethod($this->paymentType)
              ->setFundingInstruments([$fundingInstrument]);
    }

    public function payment (Payer $payer, Transaction $transaction)
    {
        $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions([$transaction])
                ->setRedirectUrls($this->redirectUrls);
    }

    public function hello ()
    {

        // $baseUrl = url('payment');
        //
        // dd($baseUrl);
        //
        // exit;

        // $card = new PaymentCard([
        //     'type' => 'visa',
        //     'number' => '4669424246660779',
        //     'expire_month' => '11',
        //     'expire_year' => '2019',
        //     'cvv2' => '012',
        //     'first_name' => 'Joe',
        //     'billing_country' => 'US',
        //     'last_name' => 'Shopper',
        // ]);

        // $fundingInstrument = new FundingInstrument();
        // $fundingInstrument->setPaymentCard($card);

        // $payer = new Payer();
        // $payer->setPaymentMethod('credit_card')
        //       ->setFundingInstruments([$fundingInstrument]);

        $amount = new Amount();
        $amount->setCurrency('USD')
               ->setTotal(1);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setDescription('Donation for Beering...');

        // $baseUrl = url('payment');
        // $redirectUrls = new RedirectUrls();
        // $redirectUrls->setReturnUrl($baseUrl.'/success')
        //              ->setCancelUrl($baseUrl.'/failed');

        $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions([$transaction])
                ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            //dd($response);
        } catch (Exception $ex) { //PayPalConnectionException
            //dd($ex);
        }

        $transactions = $payment->getTransactions();
        $relatedResources = $transactions[0]->getRelatedResources();
        $authorization = $relatedResources[0]->getAuthorization();

        dd($authorization);

        // $_payer = $payer->getPayerInfo();//$payment->getPayer();//->getPayerInfo();
        //
        // dd($_payer);
        //
        // $_transaction = $payment->getTransactions();
        // $_paymentExecute = new PaymentExecution();
        // $_paymentExecute->setPayerId($_payer->getPayerId());
        // $_paymentExecute->setTransactions([$_transaction]);
        //
        // dd($payment->execute($_paymentExecute, $this->apiContext));

        //return $payment;

        // $creditCard = new CreditCard([
        //     'type'  =>'visa',
        //     'number' => '4417119669820331',
        //     'expire_month' => '11',
        //     'expire_year' => '2019',
        //     'cvv2' => '012',
        //     'first_name' => 'Joe',
        //     'last_name' => 'Shopper'
        // ]);
        //
        // try {
        //     $creditCard->create($apiContext);
        //     echo $creditCard;
        // }
        // catch (\PayPal\Exception\PayPalConnectionException $ex) {
        //     // This will print the detailed information on the exception.
        //     //REALLY HELPFUL FOR DEBUGGING
        //     echo $ex->getData();
        // }
        //
        // return 'hola desde el modelo';
    }
}
