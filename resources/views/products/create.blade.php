@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-xs-10">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="pull-left">
                                <h2>Add New Product</h2>
                            </div>
                            <div class="text-right">
                                <a class="btn btn-primary float-right" href="{{ route('products.index') }}"> View all</a>
                            </div>
                        </div>
                    </div>
                         
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                         
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                         <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                <div class="form-group">
                                    <strong>Price:</strong>
                                    <input type="number" name="price" class="form-control" placeholder="Price">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <input type="file" name="image" class="form-control" placeholder="image">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                         
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
