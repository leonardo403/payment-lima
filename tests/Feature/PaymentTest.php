<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_rota(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Acessar a rota /payment
     */
     public function test_payment(): void
     {
        $response = $this->get('/payment');

        $response->assertStatus(200);
     }

    /**
     * Acessar a rota /thank-you
     */
    public function test_thank_you(): void
     {
        $response = $this->get('/thank-you');

        $response->assertStatus(200);
     }
}
