<?php

namespace App\Http\Controllers;


use Session;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Image::all();
        return view('products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'product_image' => 'required|mimes:png,jpg,jpeg',
        ]);

        $imageName = '';
        if($image = $request->file('product_image')){
            $product_image_name = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/product/',$product_image_name);
        }

        Image::create([
            'name' => $request->name,
            'product_image' => $product_image_name,
        ]);

        Session()->flash('success_msg', 'Product Successfully uploaded');

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Image::FindOrFail($id);
        return view('edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Image::FindOrFail($id);
        $product->name = $request->input('name');

        $request->validate([
            'name' => 'required',
        ]);


        $deleteOldImage = 'images/product/'.$product->product_image;
        if($request->file('product_image')){
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $imageName = time().'-'.uniqid().'.'.$extension;
            $file->move('images/product/', $imageName);
            $product->product_image = $imageName;
        }

        $product->save();
        Session()->flash('success_msg', 'Product Successfully Updated');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Image::FindOrFail($id);
        $deleteOldImage = 'images/product/'.$product->product_image;
        if(file_exists($deleteOldImage)){
            File::delete($deleteOldImage);
        }
        $product->delete();
        Session()->flash('success_msg', 'Product Successfully Deleted.');
        return redirect()->back();
    }
}
