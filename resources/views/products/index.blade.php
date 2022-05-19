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
        <div class="col-md-3">
            <div class="card w-100" >
            <img src="{{asset('image/'.$product->image.'')}}" height="200px" class="card-img-top">
                <div class="card-body mx-auto">
                  <h5 class="card-title text-center">{{ $product->name }}</h5>
                  <a href="{{route('payment.create')}}" class="btn btn-primary">Pay ₦{{ number_format($product->price) }} </a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
    {!! $products->links() !!}
</div>


@endsection