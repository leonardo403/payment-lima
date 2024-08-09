<?php
namespace App\Services;

use GuzzleHttp\Client;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentService
{
    protected $client;
    protected $apiKey;
    protected $url;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->apiKey = config('services.asaas.api_key');
        $this->url = config('services.asaas.url_asaas');
    }

    public function processPayment($data)
    {
        $currentDate = carbon::now();
        $paymentData = [
            'customer' => [
                'name' => $data['name'],
                'email' => $data['email'],
                'cpfCnpj' => $data['cpf'],
            ],
            'billingType' => $data['payment_method'],
            'value' => 100.00, // Valor do pagamento,
            'dueDate' => $currentDate->addDays(5),
        ];

        if ($data['payment_method'] === 'CREDIT_CARD') {
            $paymentRequest['creditCard'] = [
                'holderName' => $data['name'],
                'number' => $data['card_number'],
                'expiryMonth' => substr($data['card_expiry'], 0, 2),
                'expiryYear' => substr($data['card_expiry'], 3, 2),
                'ccv' => $data['card_cvv'],
            ];
        }

        $response = $this->client->post($this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'User-Agent' => 'Pagamentos Lima',
                'access_token' => $this->apiKey,
            ],
            'json' => $paymentData
            ]);

        $paymentData =  json_decode($response->getBody(), true);

        if($paymentData['billingType'] == 'PIX'){
            $idPay       =  $paymentData['id'];
            $responsePix = $this->client->get('https://sandbox.asaas.com/api/v3/payments/'.$idPay.'/pixQrCode', [
                'headers' => [
                    'User-Agent' => 'Pagamentos Lima',
                    'accept' => 'application/json',
                    'access_token' => $this->apiKey,
                ],
            ]);

            $paymentData = json_decode($responsePix->getBody(), true);
        }

        Payment::create([
            'payment_method' => $data['payment_method'],
            'customer_name' => $data['name'],
            'customer_email' => $data['email'],
            'customer_cpf' => $data['cpf'],
            'billing_type' => $paymentData['billingType'],
            'value' => 100.00,
            'due_date' => $paymentData['dueDate'] ?? null,
            'invoice_url' => $paymentData['invoiceUrl'] ?? null,
            'pix_qr_code' => $paymentData['encodedImage'] ?? null,
            'pix_copia_cola' => $paymentData['payload'] ?? null,
            'status' => $paymentData['status'] ?? null,
        ]);

        return $paymentData;
    }
}
