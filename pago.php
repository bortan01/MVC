
<!DOCTYPE html>

<head>
</head>

<body>

    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <style>

        /* Media query for mobile viewport */
        @media screen and (max-width: 400px) {
            #paypal-button-container {
                width: 100%;
            }
        }

        /* Media query for desktop viewport */
        @media screen and (min-width: 400px) {
            #paypal-button-container {
                width: 250px;
                display: inline-block;
            }
        }

    </style>


    <script>
        paypal.Button.render({
            env: 'sandbox', // sandbox | production
            style: {
                label: 'generic', // checkout | credit | pay | buynow | generic
                size: 'responsive', // small | medium | large | responsive
                shape: 'pill', // pill | rect
                color: 'blue'   // gold | blue | silver | black
            },

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create

            client: {
                sandbox: 'AYBxpDiCPENjEjXEShxiZHedWBvHjRLKGdhPAlU0yIbGaF3rYMr9rsdmyAbikjHBh-v1tsKijMXD1lnx',
                production: ''
            },

            // Wait for the PayPal button to be clicked

            payment: function (data, actions) {
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: {total: '10', currency: 'USD'},
                                description: "Compra de productos a Develoteca:$10",
                                custom: "Codigo"
                            }
                        ]
                    }
                });
            },

            // Wait for the payment to be authorized by the customer

            onAuthorize: function (data, actions) {
                return actions.payment.execute().then(function () {
                    console.log(data);
                    window.location = "verificador.php?paymentToken=" + data.paymentToken + "&paymentID=" + data.paymentID;
                });
            }

        }, '#paypal-button-container');

    </script>

    <div id="paypal-button-container"></div>

</body>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<style>

    /* Media query for mobile viewport */
    @media screen and (max-width: 400px) {
        #paypal-button-container {
            width: 100%;
        }
    }