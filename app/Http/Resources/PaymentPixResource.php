<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentPixResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'billingType' => $this->billingType,
            'value' => $this->value,
            'dueDate' => $this->dueDate,
            'invoiceUrl' => $this->invoiceUrl,
            'pixQrCode' => $this->encodedImage,
            'pixCopiaCola' => $this->pixCopiaCola,
            'status' => $this->status,
        ];
    }
}
