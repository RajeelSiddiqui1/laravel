<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use function Termwind\render;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "sku" => "required|unique:products,sku",
            "price" => "required|numeric",
            "status" => "required",
            "image" => "nullable|image|mimes:jpg,png,jpeg|max:2048",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $products = new Product();
        $products->name = $request->name;
        $products->sku = $request->sku;
        $products->price = $request->price;
        $products->status = $request->status;

        // Handle image upload before saving
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/'), $imageName);
            $products->image = $imageName;
        }

        if ($products->save()) {
            session()->flash('success', 'Product created successfully.');
            return redirect()->route('products.index');
        } else {
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('products.index');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        $oldImage = $product->image;

        $validator = Validator::make($request->all(), [
            "name" => "required",
            "sku" => "required",
            $id,
            "price" => "required|numeric",
            "status" => "required",
            "image" => "nullable|image|mimes:jpg,png,jpeg|max:2048",
        ]);

        if ($validator->fails()) {
            return redirect()->route('products.edit', $product->id)->withErrors($validator)->withInput();
        }

        
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->status = $request->status;

        // Handle image upload before saving
        if ($request->hasFile('image')) {

            if ($oldImage !== null && File::exists(public_path('uploads/products/' . $oldImage))) {
                File::delete(public_path('uploads/products/' . $oldImage));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/'), $imageName);
            $product->image = $imageName;
        }

        if ($product->save()) {
            session()->flash('success', 'Product updated successfully.');
            return redirect()->route('products.index');
        } else {
            session()->flash('error', 'Something went wrong.');
            return redirect()->route('products.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->image != null && File::exists('uploads/products/' . $product->image)) {
            File::delete(public_path('uploads/products/' . $product->image));
        }

        $destory = $product->delete();

        if(!$destory){
           session()->flash('error','Error in logic');
           return redirect()->route('products.index');
        }else{
            session()->flash('success','Product has been deleted successfully');
            return redirect()->route('products.index');
        }

    }
}
