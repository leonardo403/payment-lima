<!DOCTYPE html>
<html>
<head>
    <title>Pagamentos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Pagamento</h2>
        <form action="/payment" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="payment_method"Formas de pagamento:</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="BOLETO">Boleto</option>
                    <option value="CREDIT_CARD">Credit Card</option>
                    <option value="PIX">Pix</option>
                </select>
            </div>
             <!-- Campos de Cartão de Crédito -->
             <div id="credit-card-fields" style="display: none;">
                <div class="mb-3">
                    <label for="card_number" class="form-label">Número do Cartão</label>
                    <input type="text" class="form-control" id="card_number" name="card_number">
                </div>

                <div class="mb-3">
                    <label for="card_expiry" class="form-label">Data de Expiração</label>
                    <input type="text" class="form-control" id="card_expiry" name="card_expiry" placeholder="MM/AA">
                </div>

                <div class="mb-3">
                    <label for="card_cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control" id="card_cvv" name="card_cvv">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Finalizar Pagamento</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#payment_method').on('change', function() {
                if ($(this).val() === 'CREDIT_CARD') {
                    $('#credit-card-fields').show();
                    $('#card_number').attr('required', 'required');
                    $('#card_expiry').attr('required', 'required');
                    $('#card_cvv').attr('required', 'required');
                } else {
                    $('#credit-card-fields').hide();
                    $('#card_number').removeAttr('required');
                    $('#card_expiry').removeAttr('required');
                    $('#card_cvv').removeAttr('required');
                }
            });
        });
    </script>
</body>
</html>
