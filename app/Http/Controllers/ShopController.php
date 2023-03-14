<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopLoginRequest;
use App\Http\Requests\ShopRegisterRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        $products = Product::all();
        $categories = Category::all();
        //  $prams = [
        //     'products'=>$products
        //  ];
        return view('shop.main', compact('products','categories'));
    }

    public function detail($id)
    {
        $products = Product::find($id);
        // dd($products);
        return view('shop.detail', compact('products'));
    }

    //view giỏ hàng
    public function cart()
    {   $products = Product::all();
        $categories = Category::all();
        $param = [
                    'products'=>$products,
                    'categories'=>$categories,
                 ];
        return view('shop.cart',$param);
    }
    //thêm vào giỏ hàng
    public function addToCart($id)
    {
        $product = Product::find($id);
        // dd($product);
        if(!$product) {
            abort(404);
            // dd(abort(404));
        }
        $cart = session()->get('cart',[]);
        // dd($product);
        // nếu giỏ hàng trống thì đây là sản phẩm đầu tiên
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "image" => $product->image
                    ]
            ];
            // dd($cart);
            session()->put('cart', $cart);
            return redirect()->back();
        }
        // nếu giỏ hàng không trống thì kiểm tra xem sản phẩm này có tồn tại không thì tăng số lượng
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            // dd(session()->get('cart'));
            return redirect()->back();
        }
        // nếu mặt hàng không tồn tại trong giỏ hàng thì thêm vào giỏ hàng với số lượng = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back();
       
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
    }
    // xoá giỏ hàng
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Đã xoá sản phẩm thành công');
        }
    }

    //hiển thị form đăng nhập
    public function login()
    {
        return view('shop.login');
    }
    //xử lý form đăng nhập
    public function checklogin(ShopLoginRequest $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            return redirect()->route('shop');
        } else {
            return redirect()->route('shop.login');
        }
    }

    public function register()
    {
        return view('shop.register');
    }
    public function checkregister(ShopRegisterRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = bcrypt($request->password);
        try {
            if ($request->password ==  $request->confirmpassword) {
                $customer->save();
                return redirect()->route('shop.login');
            }
        } catch (\exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('shop.register');
        }
    }
    public function checkout(){
        return view('shop.checkout');
    }

    public function order(Request $request)
    {
        if ($request->product_id == null) {
            return redirect()->back();
        } else {
            $id = Auth::guard('customers')->user()->id;
            $data = Customer::find($id);
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;

            if (isset($request->note)) {
                $data->note = $request->note;
            }
            $data->save();

            $order = new Order();
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->date_at = date('Y-m-d H:i:s');
            $order->total = $request->totalAll;
            $order->save();
        }
        $count_product = count($request->product_id);
        for ($i = 0; $i < $count_product; $i++) {
            $orderItem = new OrderDetail();
            $orderItem->order_id =  $order->id;
            $orderItem->product_id = $request->product_id[$i];
            $orderItem->quantity = $request->quantity[$i];
            $orderItem->total = $request->total[$i];
            $orderItem->save();
            session()->forget('cart');
            DB::table('products')
                ->where('id', '=', $orderItem->product_id)
                ->decrement('quantity', $orderItem->quantity);
        }
      
    

        // dd($request);
        // alert()->success('Thêm Đơn Đặt: '.$request->name,'Thành Công');
        return redirect()->route('shop');
}
}
