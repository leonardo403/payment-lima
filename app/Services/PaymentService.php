<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class PaymentService
{
    protected $client;
    protected $apiKey;
    protected $url;

    public function __construct(Http $client)
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
                'value' => 100.00, // Valor do pagamento
                // Outros campos conforme necessário
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}

