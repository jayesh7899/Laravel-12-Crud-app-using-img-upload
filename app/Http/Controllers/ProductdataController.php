<?php

namespace App\Http\Controllers;

use App\Models\Productdata;
use Illuminate\Support\Facades\File;


use Illuminate\Http\Request;

class ProductdataController extends Controller
{
    //
    public function index(){

        $products=Productdata::latest()->get();

        return view('products.index',compact('products'));
    }

    public function create(){

        return view('products.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image')){
            $filename=time().'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('images'),$filename);
        }

        Productdata::create([

            'name'=>$request->name,
            'sku'=>$request->sku,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=>$filename

        ]);

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    public function edit($id){

        $products=Productdata::find($id);

        return view('products.edit',compact('products'));
    }
    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'description' => 'required',
            'price' => 'required|numeric',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product=Productdata::find($id);
        $product->name=$request->name;
        $product->sku=$request->sku;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->save();

        if($request->hasFile('image')){
            //for delete img

            File::delete(public_path('images/'.$product->image));

            $filename=time().'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('images'),$filename);
        }

        if(!empty($filename)){
            $product->image=$filename;
        }
        $product->save();


        return redirect()->route('products.index')->with('success','Product Updated Successfully...');
    }
    public function delete(Request $request, $id){

        $product=Productdata::find($id);
        $product->delete();

        return redirect()->route('products.index')->with('success','Product Deleted Successfully...');
    }
    public function show($id){

        $product=Productdata::find($id);

        return view('products.show', compact('product'));
    }


    
}
