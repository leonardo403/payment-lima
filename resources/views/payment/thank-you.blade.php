<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Thank You</h2>
        @if ($paymentData['billingType'] == 'BOLETO')
            <p>Boleto created successfully. Click <a href="{{ $paymentData['invoiceUrl'] }}">here</a> to view the boleto.</p>
        @elseif ($paymentData['billingType'] == 'PIX')
            <p>Pix created successfully.</p>
            <p>QR Code: <img src="{{ $paymentData['pixQrCode'] }}" alt="QR Code"></p>
            <p>Copia e Cola: {{ $paymentData['pixCopiaCola'] }}</p>
        @elseif ($paymentData['billingType'] == 'CREDIT_CARD')
            <p>Payment processed successfully.</p>
        @endif
    </div>
</body>
</html>
