<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://proxyd.tarlanpayments.kz/tarlan/widget-new.js"></script>
</head>
<body>
    <div class="form">
        <button class="make-payment">Pay</button>
    </div>
    {{$secretKey = 21}}
    {{$secretKey .= 123456}}
    {{$secretKey = bcrypt($secretKey,array("10"))}}
</body>
<script>

    function generateForm() {
        var widget = new tp.TarlanPayments();
        widget.checkout(
            {
                reference_id: 19, // номер заказа
                request_url: 'http://localhost/', // адрес для перенаправления после платежа
                back_url: 'http://localhost/api/payment', // адрес для отправки коллбека
                description: 'оплата заказа', // описание платежа
                amount: 100, // сумма заказа
                merchant_id: 1, // номер мерчанта
                is_test: 1, // опция для тестовой оплаты
                secret_key: "{{$secretKey}}", // ключ выдданный для мерчанта
            },
            function (data) {
                console.log(data);
            },
            function (err) {
                // при неуспешной оплате
            }
        );
    }
    document.querySelector('.make-payment').addEventListener('click', generateForm);

</script>
</html>
