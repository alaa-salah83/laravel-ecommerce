<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){
        $category = new Category();
        $category->category_name = $request->category;
        $category->save();
        toastr()->timeOut(10000)->closeButton()->success('Category Added Successfully');
        return redirect()-> back();
    }

    public function delete_category($id){
        $info = Category::find($id);
        $info->delete();
        toastr()->timeOut(10000)->closeButton()->success('Category Deleted Successfully');
        return redirect()->back();
    }

    public function edit_category($id){
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request,$id){
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->timeOut(10000)->closeButton()->success('Category Updated Successfully');
        return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }

    public function upload_product(Request $request){
        $data_pro = new Product();
        $data_pro->title = $request->title;
        $data_pro->description = $request->description;
        $data_pro->price = $request->price;
        $data_pro->quantity = $request->quantity;
        $data_pro->category = $request->category;
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data_pro->image = $imagename;
        }
        $data_pro->save();
        toastr()->timeOut(10000)->closeButton()->success('Product Added Successfully');
        return redirect()->back();
    }

    public function view_product(){
        $product = Product::paginate(10);        //10 specifies number of rows
        return view('admin.view_product',compact('product'));
    }

    public function delete_product($id){
        $data_delete = Product::find($id);
        $img_path = public_path('products/'.$data_delete->image);
            if(file_exists($img_path)){
                unlink($img_path);
            }
        $data_delete->delete();
        toastr()->timeOut(10000)->closeButton()->success('Product Deleted Successfully');
        return redirect()->back();
    }

    public function edit_product($slug){
//        $data = Product::find($id);
        $data = Product::where('slug',$slug)->get()->first();
        $category_data = Category::all();
        return view('admin.edit_Product',compact('data','category_data'));
    }

    public function update_product(Request $request,$id){
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $img= $request->image;
        if($img){
            $imagename = time().'.'.$img->getClientOriginalExtension();
            //storage in public folder
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }

        $data->save();
        toastr()->timeOut(10000)->closeButton()->success('Product Updated Successfully');
        return redirect('/view_product');
    }

    public function product_search(Request $request){
        $search = $request->search;
            $product = Product::where('title', 'LIKE', '%' . $search . '%')->
            orWhere('category', 'LIKE', '%' . $search . '%')->paginate(5);
            $product->appends(['search' => $search]);    //add search to the next page
            return view('admin.view_product', compact('product'));
    }

    public function view_orders(){
        $order_data = Order::paginate(5);
        return view('admin.view_orders',compact('order_data'));
    }

    public function on_the_way($id){
        $data = Order::find($id);
        $data->status = 'On The Way';
        $data->save();
        return redirect('/view_orders');
    }

    public function delivered($id){
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();
        return redirect('/view_orders');
    }

    public function print_pdf($id){
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice',compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
