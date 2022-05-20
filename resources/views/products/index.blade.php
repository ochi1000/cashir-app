@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::guard('admin')->check()||Auth::guard('agent')->check())
    <div class="mb-2">
        <a class="btn btn-primary" href="{{route('products.create')}}">Create Product</a>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3 mb-3">
            <div class="card w-100" >
            <img src="{{asset('image/'.$product->image.'')}}" height="200px" class="card-img-top">
                <div class="card-body mx-auto">
                  <h5 class="card-title text-center">{{ $product->name }}</h5>
                  <a onclick="makePayment('{{ $product->price }}', '{{Auth::user()->name}}', '{{Auth::user()->email}}')" role="button" class="btn btn-primary">Pay ₦{{ number_format($product->price) }} </a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
    {!! $products->links() !!}
</div>
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
    function makePayment(price, name, email) {
      FlutterwaveCheckout({
        public_key: "FLWPUBK_TEST-c546c695641f7933fb7f3a3c4432bdf3-X",
        tx_ref: "titanic-48981487343MDI0NzMx",
        amount: price,
        currency: "NGN",
        payment_options: "card, banktransfer, ussd",
        redirect_url: "http://cashir-app.herokuapp.com/handle_payment",
        meta: {
          consumer_id: 23,
          consumer_mac: "92a3-912ba-1192a",
        },
        customer: {
          email: email,
          phone_number: "08102909304",
          name: name,
        },
        customizations: {
          title: "The Titanic Store",
          description: "Payment for an awesome cruise",
          logo: "https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg",
        },
      });
    }
  </script>
@endsection