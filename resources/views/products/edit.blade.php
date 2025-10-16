@extends('layouts.app')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-10">

            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('products.index') }}" class="btn btn-info">Go Back</a>
            </div>

            <div class="card border-0 shadow-lg my-3">
                <div class="card-header bg-dark text-white">
                    <h3>Edit Product</h3>
                </div>

                <form action="{{ route('products.update', $products->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input value="{{ $products->name }}" type="text" name="name" class="form-control" placeholder="Name">

                        @error('name')
                            <p class="text-danger">{{ $message }}</p>                            
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Sku</label>
                        <input value="{{ $products->sku }}"  type="text" name="sku" class="form-control" placeholder="Sku">

                        @error('sku')
                            <p class="text-danger">{{ $message }}</p>                            
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="">Price</label>
                        <input value="{{ $products->price }}"  type="text" name="price" class="form-control" placeholder="Price">

                        @error('price')
                            <p class="text-danger">{{ $message }}</p>                            
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea   name="description" class="form-control" row="5" placeholder="Description">{{ $products->description }}</textarea>

                        @error('description')
                            <p class="text-danger">{{ $message }}</p>                            
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" placeholder="Image" name="image">
                        <img src="{{ asset('images/'.$products->image) }}" alt="" width="110" height="80">
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>                            
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>

                    
                </div>
                </form>
            </div>
        </div>
    </div>


    
@endsection

