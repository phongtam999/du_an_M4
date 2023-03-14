<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Product::class);
        $products = Product::paginate(2);
        $categories = Category::get();
        $param = [
            'products' => $products,
            'categories' => $categories,
        ];

        return view('admin.products.index', $param);
    }
    public function create()
    {
        $this->authorize('view',Product::class);
        $categories = Category::get();
        $param = [
            'categories' => $categories
        ];
        return view('admin.products.add', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->authorize('create',Product::class);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->folow = $request->folow;
        $product->image = $request->image;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public/assets/product/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $product->save();
        toast('Thêm sản phẩm thành công','success','top-right');
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
        $this->authorize('view',Product::class);
        $productshow = Product::findOrFail($id);
        $param =[
            'productshow'=>$productshow,
        ];
        return view('admin.products.show',  $param );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update',Product::class);
        $products = Product::find($id);
        $categories = Category::get();
        $param = [
            'products' => $products,
            'categories' => $categories
        ];
        return view('admin.products.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update',Product::class);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->folow = $request->folow;
        $get_image = $request->image;
        if ($get_image) {
            $path = 'public/assets/product/' . $product->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/assets/product/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $product->save();
        toast('Cập nhật sản phẩm thành công','success','top-right');

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $this->authorize('delete',Product::class);
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back();
    }
    public function trash()
    {
        // $this->authorize('trash',Product::class);
        $softs = Product::onlyTrashed()->get();
        return view('admin.products.soft', compact('softs'));
    }
    //khôi phục lại
    public function restoredelete($id)
    {
        $this->authorize('restoredelete',Product::class);
        $products = Product::withTrashed()->where('id', $id);
        $products->restore();
        return redirect()->route('product.trash');
    }
    // Đưa vào thùng rác
    public  function softdeletes($id)
    {
        $this->authorize('softdeletes',Product::class);
        try {
            $products = Product::onlyTrashed()->where('id', $id)->forcedelete();
            toast('Xoá sản phẩm thành công','success','top-right');

            // $products->deleted_at = date("Y-m-d h:i:s");
            // $products->save();
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            toast('Xoá sản phẩm thất bại','error','top-right');
            return redirect()->route('product.trash');
            return back()->withInput()->with('error', 'Cập nhật không thành công!.');
        } 
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('product.index');
        }
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->paginate(2);
        return view('admin.products.index', compact('products'));
    }
}
