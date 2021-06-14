<label class="mt-3">Card details:</label>

<div class="form-group form-row">
    <input class="form-control" name="payu_card" type="text" placeholder="numero tarjeta">

    <input class="form-control" name="payu_cvc" type="text" placeholder="CVC">

    <input class="form-control" name="payu_month" type="text" placeholder="MM">

    <input class="form-control" name="payu_year" type="text" placeholder="YY">

    <div class="col-2">
        <select class="custom-select" name="payu_network">
            <option selected>Select</option>
            <option value="visa">VISA</option>
            <option value="amex">AMEX</option>
            <option value="mastercard">MASTERCARD</option>
        </select>
    </div>

    <input class="form-control" name="payu_name" type="text" placeholder="Nombre">

    <input class="form-control" name="payu_email" type="email" placeholder="email@example.com">
</div>