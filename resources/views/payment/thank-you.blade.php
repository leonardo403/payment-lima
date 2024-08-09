<!DOCTYPE html>
<html>
<head>
    <title>Obrigado</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Agradecemos a confiança!</h2>
        @if ($paymentData['billingType'] == 'BOLETO')
            <p>Boleto gerado com sucesso. Clicar <a href="{{ $paymentData['invoiceUrl'] }}">aqui</a> para ver o boleto.</p>
        @elseif ($paymentData['pixQrCode'])
            <p>Pix gerado com sucesso.</p>
            <p>QR Code: <img src="data:image/png;base64, {{ $paymentData['pixQrCode'] }}" alt="QR Code"  style='display:block; width:300px;height:300px;'>
            <p>Copia e Cola: {{ $paymentData['pixCopiaCola'] }}</p>
        @elseif ($paymentData['billingType'] == 'CREDIT_CARD')
            <p>Payment processado com sucesso.</p>
        @endif
    </div>
</body>
</html>
