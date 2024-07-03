<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype','user')->get()->count();
        $product= Product::all()->count();
        $order = Order::all()->count();
        $delivered = Order::where('status','Delivered')->get()->count();
        return view('admin.index',compact('user','product','order','delivered'));
    }

    public function home(){
        $product_user = Product::paginate(12);
        if(Auth::user('id')){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.index',compact('product_user','count'));
    }

    public function login_home(){
        $product_user = Product::paginate(12);
        if(Auth::user('id')){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.index',compact('product_user','count'));
    }

    public function product_details($id){
        $details_data = Product::find($id);
        if(Auth::user('id')){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.product_details',compact('details_data','count'));
    }

    public function add_cart($id){
        $product_id = $id;        //get product id

        $user = Auth::user();    //get all data of user login

        $user_id = $user->id;    // get user id

        $data = new Cart();
        $data->user_id = $user_id;
        $data->product_id  = $product_id;

        $data->save();
        toastr()->timeOut(10000)->closeButton()->success('Product Added to the Cart Successfully');

        return redirect()->back();

    }

    public function shopping_cart(){
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
            $cart = Cart::where('user_id',$userid)->get();
        }
        else{
            $count = '';
        }
        return view('home.shopping_cart',compact('count','cart'));
    }

    public function delete_cart($id){
        $data_delete = Cart::find($id);
        $data_delete->delete();
        toastr()->timeOut(10000)->closeButton()->success('Cart Deleted Successfully');
        return redirect()->back();
    }

    public function confirm_order(Request $request){
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $userid = Auth::user()->id;
        $cart = Cart::where('user_id',$userid)->get();

        foreach ($cart as $carts){
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id  = $userid;
            $order->product_id  = $carts->product_id;
            $order->save();
        }
        $remove_cart = Cart::where('user_id',$userid)->get();
        foreach ($remove_cart as $remove){

            $data = Cart::find($remove->id);
            $data->delete();

        }
        toastr()->timeOut(10000)->closeButton()->success('Product Ordered Successfully');
        return redirect()->back();
    }

    public function user_order(){
        $user = Auth::user()->id;
        $count = Cart::where('user_id',$user)->get()->count();
        $data = Order::where('user_id',$user)->get();
        return view('home.user_order',compact('count','data'));
    }

    public function stripe($total)
    {
        return view('home.stripe',compact('total'));

    }

    public function stripePost(Request $request,$total)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $total * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        $name = Auth::user()->name;
        $address = Auth::user()->address;
        $phone = Auth::user()->phone;
        $userid = Auth::user()->id;

        $cart = Cart::where('user_id',$userid)->get();

        foreach ($cart as $carts){
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id  = $userid;
            $order->product_id  = $carts->product_id;
            $order->payment_status = "paid";
            $order->save();
        }
        $remove_cart = Cart::where('user_id',$userid)->get();
        foreach ($remove_cart as $remove){

            $data = Cart::find($remove->id);
            $data->delete();

        }
        toastr()->timeOut(10000)->closeButton()->success('Product Ordered Successfully');
        return redirect('shopping_cart');

//        Session::flash('success', 'Payment successful!');
//
//        return back();
    }

    public function shop(){
        $product_user = Product::paginate(12);
        if(Auth::user('id')){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.shop',compact('product_user','count'));
    }

    public function why(){
        if(Auth::user('id')){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.why',compact('count'));
    }

    public function testimonial(){
        if(Auth::user('id')){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.testimonial',compact('count'));
    }

    public function contact(){
        if(Auth::user('id')){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.contact',compact('count'));
    }
}
