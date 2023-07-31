<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $pageTitle = 'Tambahkan Product';
        $categories = ProductCategory::all();

        return view('Product.create', [
            // 'pageTitle' => $pageTitle,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom Ini Harus Diisi.',
            'numeric' => 'Format Angka',
            'product_code.unique' => 'kode barang sudah ada',
        ];

        $validator = Validator::make($request->all(), [
            'product_code' => 'required|unique:products,product_code',
            'name' => 'required',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'stock' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();


        }

        $image_path = '';

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('products', 'public');
        }

        $product = New Product;
        $product->product_code = $request->product_code;
        $product->image = $image_path;
        $product->name = $request->name;
        $product->selling_price = $request->selling_price;
        $product->purchase_price = $request->purchase_price;
        $product->stock = $request->stock;
        $product->category_id= $request->category_id;
        $product->save();

        // Alert::success('Sukses Menambahkan', 'Sukses Menambahkan Produk.');
        return redirect()->route('Product.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
