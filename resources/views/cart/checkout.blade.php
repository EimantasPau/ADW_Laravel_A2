@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-3 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Payment
                    </div>
                    <div class="card-body">
                        <form action="{{route('order.charge')}}" method="POST" id="payment-form" class="d-flex justify-content-center">
                            @csrf
                            <button class="btn btn-outline-primary waves-effect" id="purchaseButton">Make payment</button>
                        </form>
                    </div>
                </div>
                <!--/.Panel-->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var orderItems = {!! json_encode($orderItems)!!};
        var total = {{ $total }};
        var email = '{!! Auth::user()->email !!}';
        var handler = StripeCheckout.configure({
            key: 'pk_test_QYrjougFb8PzIw8Ri3plmK1M',
            image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
            locale: 'auto',
            token: function(token, args) {
                //Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);

                var shippingName = document.createElement('input');
                shippingName.setAttribute('type', 'hidden');
                shippingName.setAttribute('name', 'name');
                shippingName.setAttribute('value', args.shipping_name);

                var street = document.createElement('input');
                street.setAttribute('type', 'hidden');
                street.setAttribute('name', 'street');
                street.setAttribute('value', args.shipping_address_line1);

                var postcode = document.createElement('input');
                postcode.setAttribute('type', 'hidden');
                postcode.setAttribute('name', 'postcode');
                postcode.setAttribute('value', args.shipping_address_zip);

                var city = document.createElement('input');
                city.setAttribute('type', 'hidden');
                city.setAttribute('name', 'city');
                city.setAttribute('value', args.shipping_address_city);

                var country = document.createElement('input');
                country.setAttribute('type', 'hidden');
                country.setAttribute('name', 'country');
                country.setAttribute('value', args.shipping_address_country);

                form.appendChild(hiddenInput);
                form.appendChild(shippingName);
                form.appendChild(street);
                form.appendChild(postcode);
                form.appendChild(city);
                form.appendChild(country);
                // Submit the form
                form.submit();
            }
        });

        document.getElementById('purchaseButton').addEventListener('click', function(e) {
            // Open Checkout with further options:
            var itemList = '';
            var orderItemsArray = [];
            for (prop in orderItems) {
                orderItemsArray.push(orderItems[prop]);
            }

            orderItemsArray.forEach(function(element){
                var lineDescription = element.quantity + ' x ' + element.name + ' £' + element.price + '\n';
                console.log(lineDescription);
                itemList += lineDescription;
            });
            handler.open({
                email: email,
                billingAddress: true,
                shippingAddress: true,
                name: 'Make the payment',
                description: itemList,
                currency: 'gbp',
                amount: total * 100,
                allowRememberMe : false
            });

            e.preventDefault();
        });

        // Close Checkout on page navigation:
        window.addEventListener('popstate', function() {
            handler.close();
        });
    </script>
@endpush
