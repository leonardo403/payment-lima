<?php
namespace App\Services;

use GuzzleHttp\Client;
use App\Models\Payment;

class PaymentService
{
    protected $client;
    protected $apiKey;
    protected $url;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->apiKey = config('services.asaas.api_key');
        $this->url = 'https://sandbox.asaas.com/api/v3/payments';
    }

    public function processPayment($data)
    {
        $response = $this->client->post($this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'access_token' => $this->apiKey,
            ],
            'json' => [
                'customer' => [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'cpfCnpj' => $data['cpf'],
                ],
                'billingType' => $data['payment_method'],
                'value' => 100.00, // Valor do pagamento,
                'dueDate' => '2024-08-12',
                // Outros campos conforme necessário
            ],
        ]);

        $paymentData =  json_decode($response->getBody(), true);

        Payment::create([
            'payment_method' => $data['payment_method'],
            'customer_name' => $data['name'],
            'customer_email' => $data['email'],
            'customer_cpf' => $data['cpf'],
            'billing_type' => $paymentData['billingType'],
            'value' => 100.00,
            'due_date' => $paymentData['dueDate'] ?? null,
            'invoice_url' => $paymentData['invoiceUrl'] ?? null,
            'pix_qr_code' => $paymentData['pixQrCode'] ?? null,
            'pix_copia_cola' => $paymentData['pixCopiaCola'] ?? null,
            'status' => $paymentData['status'],
        ]);

        return $paymentData;
    }
}

