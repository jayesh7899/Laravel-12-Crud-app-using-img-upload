@extends('layouts.app')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-10">

            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('products.index') }}" class="btn btn-info">Go Back</a>
            </div>

            <div class="card border-0 shadow-lg my-3">
                <div class="card-header bg-dark text-white">
                    <h3>Create Product</h3>
                </div>

                <form action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input value="{{ old('name') }}" type="text" name="name" class="form-control" placeholder="Name">

                        @error('name')
                            <p class="text-danger">{{ $message }}</p>                            
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Sku</label>
                        <input value="{{ old('sku') }}"  type="text" name="sku" class="form-control" placeholder="Sku">

                        @error('sku')
                            <p class="text-danger">{{ $message }}</p>                            
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="">Price</label>
                        <input value="{{ old('price') }}"  type="text" name="price" class="form-control" placeholder="Price">

                        @error('price')
                            <p class="text-danger">{{ $message }}</p>                            
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea  name="description" class="form-control" row="5" placeholder="Description">{{ old('name') }}</textarea>

                        @error('description')
                            <p class="text-danger">{{ $message }}</p>                            
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" placeholder="Image" name="image">

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
