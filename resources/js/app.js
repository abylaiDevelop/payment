
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
    secret_key: '123456', // ключ выдданный для мерчанта
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
