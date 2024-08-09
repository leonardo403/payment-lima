<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ?? null,
            'customer' => [
                'name' => $this->name ?? null,
                'email' => $this->email ?? null,
                'cpfCnpj' => $this->cpfCnpj ?? null,
            ],
            'billingType' => $this->billingType ?? null,
            'value' => $this->value ?? null,
            'dueDate' => $this->dueDate ?? null,
            'invoiceUrl' => $this->invoiceUrl ?? null,
            'pixQrCode' => $this->encodedImage ?? null,
            'pixCopiaCola' => $this->payload ?? null,
            'status' => $this->status ?? null,
        ];
    }
}
