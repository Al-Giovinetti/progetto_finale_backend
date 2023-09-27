




<head>
    <meta charset="utf-8" />
    <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.min.js"></script>
  </head>
  <body>
    <!-- Step one: add an empty container to your page -->
    <div id="dropin-container"></div>
  




    <form id="payment-form" action="{{ route('payment') }}" method="post">
        @csrf
        <!-- Metti l'empty container in cui vuoi mostrare il widget di pagamento Braintree -->
        <div id="dropin-container"></div>
        <input type="submit" value="Paga" />
        <!-- Questo campo hidden è dove verrà inserito il "payment_method_nonce" generato da Braintree -->
        <input type="hidden" id="nonce" name="payment_method_nonce" />
        <!-- Aggiungi questo campo CSRF token per proteggere il tuo form -->
      </form>
      








    <script type="text/javascript">
    // Step two: create a dropin instance using that container (or a string
//   that functions as a query selector such as '#dropin-container')
    braintree.dropin.create({
    // Step three: get client token from your server, such as via
    //    templates or async http request
    authorization:  '{{$clientToken}}',
    container: '#dropin-container'
    }, (error, dropinInstance) => {
    // Use 'dropinInstance' here
    // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
    });



    const form = document.getElementById('payment-form');

    braintree.dropin.create({
        authorization:  '{{$clientToken}}',
    container: '#dropin-container'
    }, (error, dropinInstance) => {
    if (error) console.error(error);

    form.addEventListener('submit', event => {
        event.preventDefault();

        dropinInstance.requestPaymentMethod((error, payload) => {
        if (error) console.error(error);

        // Step four: when the user is ready to complete their
        //   transaction, use the dropinInstance to get a payment
        //   method nonce for the user's selected payment method, then add
        //   it a the hidden field before submitting the complete form to
        //   a server-side integration
        document.getElementById('nonce').value = payload.nonce;
        form.submit();
        });
    });
    });
    </script>
  </body>