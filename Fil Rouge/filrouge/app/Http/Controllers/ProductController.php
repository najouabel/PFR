<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;

class ProductController extends Controller
{
    public function create_product()
    {
        $categories = Category::all();
        // dd($categories);
        return view('dashbored',["category"=>$categories]);
    }
    public function acceuil()
    {
        return view('acceuil');
    }
    
    public function contact()
    {
        return view('contact');
    }
    
    public function dashbored()
    {
        $categories = Category::all();
        $user = Auth::user();
        // $cat = $categories->products;
        $products = Product::all();
        return view('dashbored', [
            'products' => $products,
            'user' => $user,
            'category'=>$categories,
        ]);
    }
    public function store_product(Request $request)
    {
        //dd($request->hasFile('image'));
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

       


        $file = $request->file('image');
        $destinationPath = 'images/';
        $profileImage = date('YmdHis').".".$file->getClientOriginalExtension();
        $file->move($destinationPath, $profileImage);
        

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $profileImage,
            'category_id' => $request->category_id,
        ]);

        return Redirect::route('dashbored');
    }

    public function index_product()
    {
        $user = Auth::user();
        $products = Product::all();
        return view('index_product', [
            'products' => $products,
            'user' => $user,
        ]);
    }
    public function index_product_one()
{
    $user = Auth::user();
    $categoryId = request()->query('categoryId');
    $category = Category::find($categoryId);
    $products = $category->products;
    return view('index_product_one', [
        'products' => $products,
        'user' => $user,
    ]);
}
    
    
    public function show_product(Product $product)
    {
        // $cats = Category::all();  
        // return view('show_product', compact('product','cats'));
        return view('show_product', compact('product'));
    }

    public function edit_product(Product $product)
    {
        return view('edit_product', compact('product'));
    }

    public function update_product(Product $product, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        // $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
        // Storage::disk('local')->put('public/' . $path, file_get_contents($file));
        $destinationPath = 'images/';
        $profileImage = date('YmdHis').".".$file->getClientOriginalExtension();
        $file->move($destinationPath, $profileImage);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $profileImage,
        ]);

        return Redirect::route('dashbored');
    }

    public function delete_product(Product $product)
    {
        $product->delete();
        return Redirect::route('dashbored');
    }
}
