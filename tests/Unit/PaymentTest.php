<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Http;

class PaymentTest extends TestCase
{
    protected $paymentService;

    public function setUp(): void
    {
        parent::setUp();
        $this->paymentService = new PaymentService();
    }

    public function test_Credit_Card_Payment()
    {
        $mockResponse = [
            'id' => '123',
            'billingType' => 'CREDIT_CARD',
            'value' => 100.00,
            'customer' => [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'cpfCnpj' => '12345678901',
            ],
            'status' => 'PENDING',
        ];

        Http::fake([
            'https://sandbox.asaas.com/api/v3/payments' => Http::response($mockResponse, 200),
        ]);

        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'cpf' => '12345678901',
            'payment_method' => 'CREDIT_CARD',
            'value' => 100.00,
        ];

        $result = $this->paymentService->processPayment($data);

        $this->assertArrayHasKey('id', $result);
        $this->assertEquals('CREDIT_CARD', $result['billingType']);
        $this->assertEquals(100.00, $result['value']);
    }

    public function test_PIX_Payment()
    {
        $mockResponse = [
            'id' => '123',
            'billingType' => 'PIX',
            'value' => 100.00,
            'customer' => [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'cpfCnpj' => '12345678901',
            ],
            'status' => 'PENDING',
        ];

        Http::fake([
            'https://sandbox.asaas.com/api/v3/payments' => Http::response($mockResponse, 200),
        ]);

        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'cpf' => '12345678901',
            'payment_method' => 'PIX',
            'value' => 100.00,
        ];

        $result = $this->paymentService->processPayment($data);

        $this->assertArrayHasKey('id', $result);
        $this->assertEquals('PIX', $result['billingType']);
        $this->assertEquals(100.00, $result['value']);
    }

    public function test_BOLETO_Payment()
    {
        $mockResponse = [
            'id' => '123',
            'billingType' => 'BOLETO',
            'value' => 100.00,
            'customer' => [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'cpfCnpj' => '12345678901',
            ],
            'status' => 'PENDING',
        ];

        Http::fake([
            'https://sandbox.asaas.com/api/v3/payments' => Http::response($mockResponse, 200),
        ]);

        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'cpf' => '12345678901',
            'payment_method' => 'BOLTEO',
            'value' => 100.00,
        ];

        $result = $this->paymentService->processPayment($data);

        $this->assertArrayHasKey('id', $result);
        $this->assertEquals('BOLETO', $result['billingType']);
        $this->assertEquals(100.00, $result['value']);
    }
}
