<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_method',
        'customer_name',
        'customer_email',
        'customer_cpf',
        'billing_type',
        'value',
        'due_date',
        'invoice_url',
        'pix_qr_code',
        'pix_copia_cola',
        'status',
    ];
}
