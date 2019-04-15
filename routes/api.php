<?php

use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\WebProfile;
use PayPal\Api\InputFields;
use PayPal\Api\Transaction;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use App\Category;
use App\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('create-payment/{TotalMoney}',function($TotalMoney){
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AQG0uZcqTDVbflrhqHs33iBkXkhzVXEJhedkEGeAMHF0v7lhtKUDICAgjW7vOZoWZSnXO-5KLk-DkiXl',     // ClientID
            'EGAp9f7IauE8FH315z7nJVQ30oAjb84IxwUBu7HLzA40kl3QtrOIFmbTdU5mOx4ww8Qy-teSIM5SGNBA'      // ClientSecret
        )
    );
    $payer = new Payer();
    $payer->setPaymentMethod("paypal");
    $item1 = new Item();
    $item1->setName('Mua Hang ShopROGTEAM')
        ->setCurrency('USD')
        ->setQuantity(1)
        ->setPrice(GetTotal($TotalMoney));
    
    $itemList = new ItemList();
    $itemList->setItems(array($item1));
    $details = new Details();
    $details->setShipping(0)
        ->setTax(0)
        ->setSubtotal(GetTotal($TotalMoney));
    $amount = new Amount();
    $amount->setCurrency("USD")
        ->setTotal(GetTotal($TotalMoney))
        ->setDetails($details);
    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("Payment description")
        ->setInvoiceNumber(uniqid());
    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl(url('/checkout/bill'))
        ->setCancelUrl(url('/checkout/bill'));
    // Add NO SHIPPING OPTION
    $inputFields = new InputFields();
    $inputFields->setNoShipping(1);
    $webProfile = new WebProfile();
    $webProfile->setName('test' . uniqid())->setInputFields($inputFields);
    $webProfileId = $webProfile->create($apiContext)->getId();
    $payment = new Payment();
    $payment->setExperienceProfileId($webProfileId); // no shipping
    $payment->setIntent("sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));
    try {
        $payment->create($apiContext);
    } catch (Exception $ex) {
        echo $ex;
        exit(1);
    }
    return $payment;
});

Route::post('execute-payment',function(Request $request){
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AQG0uZcqTDVbflrhqHs33iBkXkhzVXEJhedkEGeAMHF0v7lhtKUDICAgjW7vOZoWZSnXO-5KLk-DkiXl',     // ClientID
            'EGAp9f7IauE8FH315z7nJVQ30oAjb84IxwUBu7HLzA40kl3QtrOIFmbTdU5mOx4ww8Qy-teSIM5SGNBA'      // ClientSecret
        )
    );
    $paymentId = $request->paymentID;
    $payment = Payment::get($paymentId, $apiContext);
    $execution = new PaymentExecution();
    $execution->setPayerId($request->payerID);
    try {
        $result = $payment->execute($execution, $apiContext);
    } catch (Exception $ex) {
        echo $ex;
        exit(1);
    }
    return $result;
});

Route::group(['prefix' => 'v1'], function(){
    Route::get('users', function() {
        return User::all();
    });
});
 
