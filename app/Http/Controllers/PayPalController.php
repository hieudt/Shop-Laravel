<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use App\Services\PayPalService as PayPalSvc;
use Illuminate\Http\Request;

class PayPalController extends Controller
{
    private $paypalSvc;

    public function __construct(PayPalSvc $paypalSvc)
    {
        parent::__construct();
        $this->paypalSvc = $paypalSvc;
    }

    public function index()
    {
        $data = [
            [
                'name' => 'Vinataba',
                'quantity' => 1,
                'price' => 1,
                'sku' => '1'
            ],
            [
                'name' => 'Marlboro',
                'quantity' => 1,
                'price' => 1,
                'sku' => '2'
            ],
            [
                'name' => 'Esse',
                'quantity' => 1,
                'price' => 1,
                'sku' => '3'
            ]
        ];
        $transactionDescription = "Tobaco";

        $paypalCheckoutUrl = $this->paypalSvc
                                  ->setReturnUrl(url('paypal/status'))
                                  ->setItem($data)
                                  ->createPayment($transactionDescription);

        if ($paypalCheckoutUrl) {
            return redirect($paypalCheckoutUrl);
        } else {
            dd(['Error']);
        }
    }

    public function status()
    {
        $paymentStatus = $this->paypalSvc->getPaymentStatus();
        dd($paymentStatus);
    }

    public function paymentList()
    {
        $limit = 10;
        $offset = 0;

        $paymentList = $this->paypalSvc->getPaymentList($limit, $offset);

        dd($paymentList);
    }

    public function paymentDetail($paymentId)
    {
        $paymentDetails = $this->paypalSvc->getPaymentDetails($paymentId);

        dd($paymentDetails);
    }

    public function paymentGet(){
        return $this->paypalSvc->getPaymentStatus();
    }
}
