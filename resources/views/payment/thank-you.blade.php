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
            <p>Boleto gerado com sucesso. Clicar <a href="{{ $paymentData['invoiceUrl'] }}">aqui</a> para ver o boleto.</p>
        @elseif ($paymentData['billingType'] == 'PIX')
            <p>Pix gerado com sucesso.</p>
            <p>QR Code: <img src="{{ $paymentData['pixQrCode'] }}" alt="QR Code"></p>
            <p>Copia e Cola: {{ $paymentData['pixCopiaCola'] }}</p>
        @elseif ($paymentData['billingType'] == 'CREDIT_CARD')
            <p>Payment processado com sucesso.</p>
        @endif
    </div>
</body>
</html>
