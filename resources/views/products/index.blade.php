@extends('layouts.app')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-10 mt-4">
            <div class="col-md-12 d-flex justify-content-end mb-3">
                <a href="{{ route('products.create') }}" class="btn btn-info">Create Product</a>
            </div>
            @session('success')
                <div class="alert alert-success">
                    <span >{{ $value }}</span>
                </div>
                
            @endsession
        </div>
        <div class="col-md-10">
            <div class="card border-0 shadow-lg my-3">
                <div class="card-header bg-dark text-white">
                    <h3>Product List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Sku</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->isNotEmpty())

                        @foreach ($products as $item)

                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->sku }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td><img src="{{ asset('images/'.$item->image) }}" alt="" width="110" height="80"></td>
                                <td>
                                    <a href="{{ route('products.show', $item->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('products.edit', $item->id) }}" class="btn btn-warning">Edit</a>

                                    <form action="{{ route('products.delete',$item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                    
                                </td>


                            </tr>
                            
                        @endforeach

                        @else

                        <h1 class="mt-3 text-center">No Product Found</h1>
                            
                        @endif
                        
                        
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    
@endsection


