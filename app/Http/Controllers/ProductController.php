<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {

        $category = Product::all();
        return view('product.index',compact('category'));
    }


    public function create()
    {
        $cat = Category::orderBy('name','ASC')->get();
        return view('product.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Product();
        $cat->name = $request->name;
        $cat->product_code = strtoupper(strtolower($request->product_code));
        $cat->category_id = $request->category_id;
        if(empty($request->status))
        {
            $cat->status = 0;
        }else{
            $cat->status = 1;
        }

        $cat->slug = Str::slug($request->name);
        $cat->quantity = Str::slug($request->quantity);
        $cat->save();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::all();
        $category = Product::findOrFail($id);
        return view('product.edit',compact('category','cat'));
    }


    public function update(Request $request, $id)
    {
        $cat = Product::findOrFail($id);

        $cat->name = $request->name;
        $cat->product_code = strtoupper(strtolower($request->product_code));
        $cat->category_id = $request->category_id;
        $cat->quantity = $request->quantity;
        $cat->slug = Str::slug($request->name);
        $cat->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = new Product();
        $cat->destroy($id);
        return redirect()->back();
    }
    public function individual($id){
      $product = Product::findOrFail($id);
      return view('product.individual',compact('product'));
    }
    public function add(Request $request, $id)
    {
        $p = Product::findOrFail($id);
        $p->quantity+1;
        $p->save();
        return redirect()->route('product.index');
    }
    public function sub(Request $request, $id)
    {
        $p = Product::findOrFail($id);
        $no = $request->name1;
        $p->quantity = $p->quantity - $no;
        $p->save();
        return redirect()->route('product.index');
    }
    public function price($slug)
    {
        return $slug;
        exit;
    //   $price = Product::where('product_code',$code)->get();
    //   echo $price;
    //   echo "<pre>";
    //   print_r($price);
    //   return json_encode($price);
    }
}
