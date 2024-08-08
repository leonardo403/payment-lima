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
            'id' => $this->id,
            'customer' => $this->customer,
            'billingType' => $this->billingType,
            'value' => $this->value,
            'dueDate' => $this->dueDate,
            'invoiceUrl' => $this->invoiceUrl,
            //'pixQrCode' => $this->pixQrCode,
            //'pixCopiaCola' => $this->pixCopiaCola,
            'status' => $this->status,
        ];
    }
}
