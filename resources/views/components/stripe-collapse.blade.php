<form id="payment-form">
    @csrf
    <input name='value' type="text" wire:model='total' class='hidden'>
    <input name='coupon' type="text" wire:model='couponId' class='hidden'>
    <input name='course' type="text" wire:model='courseId' class='hidden'>
    <input name='type' type="text" value="0" class='hidden'>
    <input type="text" name="payment_platform" value="2" class='hidden'>
    <div id="error-message" role="alert"></div>

    <button type="submit" id="submit-button"
        class="block w-full px-4 py-2 mt-4 font-bold text-center text-white bg-pink-500 hover:bg-pink-600 rounded-xl">Pay
        en OXXO</button>
</form>
<input id="name" name="name" value="{{auth()->user()->name}}" class='hidden'>
<input id="email" name="email" value="{{auth()->user()->email}}" class='hidden'>

<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('{{ config('services.stripe.key') }}');
        var form = document.getElementById('payment-form');
        var clientSecret

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var datos = new FormData(form);
            console.log(datos.get('value'));

            fetch('/payment/pay', {
                    method: 'POST',
                    body: datos
                })

                .then(res => res.json())
                .then(function(responseJson) {
                    clientSecret = responseJson.client_secret;
                    console.log(clientSecret)

            stripe.confirmOxxoPayment(
                    `${clientSecret}`, {
                        payment_method: {
                            billing_details: {
                                name: document.getElementById('name').value,
                                email: document.getElementById('email').value,
                            },
                        },
                    }
                )

                .then(function(result) {
                    if (result.error) {
                        var errorMsg = document.getElementById('error-message');
                        errorMsg.innerText = result.error.message;
                    }
                });
                })
        });
</script>