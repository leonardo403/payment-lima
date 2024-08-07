<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentFormRequest;
use App\Services\PaymentService;
use App\Http\Resources\PaymentResource;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        return view('payment.index');
    }

    public function processPayment(PaymentFormRequest $request)
    {
        $paymentData = $this->paymentService->processPayment($request->validated());
        dd($paymentData);
        $paymentResource = new PaymentResource((object) $paymentData);

        if ($validatedData['payment_method'] == 'BOLETO') {
            return redirect()->route('thank-you')->with('paymentData', $paymentData);
        }

        if ($validatedData['payment_method'] == 'PIX') {
            return redirect()->route('thank-you')->with('paymentData', $paymentData);
        }

        if ($validatedData['payment_method'] == 'CREDIT_CARD') {
            return redirect()->route('thank-you')->with('paymentData', $paymentData);
        }

        return redirect()->route('thank-you')->with('paymentData', $paymentResource->toArray($request));
    }

    public function thankYou()
    {
        $paymentData = session('paymentData');

        return view('payment.thank-you', compact('paymentData'));
    }
}
