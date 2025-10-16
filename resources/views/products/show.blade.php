@extends('layouts.app')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-10 mt-4">
            <div class="col-md-12 d-flex justify-content-end mb-3">
                <a href="{{ route('products.index') }}" class="btn btn-info">Go Back</a>
            </div>
            @session('success')
                <div class="alert alert-success">
                    <span >{{ $value }}</span>
                </div>
                
            @endsession
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-lg my-3">
                <div class="card-header bg-dark text-white">
                    <h3>Product Info</h3>
                </div>
                <div class="card-body">
                    <div class=" p-1">
                        <h4>Name  :  {{ $product->name}}</h4>
                    </div>
                    <div class=" p-1">
                        <h4>Sku : {{ $product->sku}}</h4>
                    </div>
                    <div class="p-1">
                        <h4>Decription : {{ $product->description}}</h4>
                    </div>
                    <div class="p-1">
                        <h4>Price : {{ $product->price}}</h4>
                    </div>
                    <div class="p-1">
                        <h4>Image :   <img src="{{ asset('images/'.$product->image) }}" alt="" width="200" height="110"></h4>
                        <div class="p-2"></div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    
@endsection


