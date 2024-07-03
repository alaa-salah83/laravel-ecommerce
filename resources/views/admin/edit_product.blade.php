<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dark Bootstrap Admin </title>
    @include('admin.css')
    <style>
        .div_deg_pro{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        label{
            display: inline-block;
            width:200px;
            font-size: 20px !important;
            color:white !important;
        }
        input[type='text']{
            width:350px;
            height:50px;
        }
        textarea{
            width:450px;
            height: 80px;
        }

        .input_height{
            padding: 15px;
        }
    </style>
</head>
<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 style="color: white;">Edit Product</h1>
                <div class="div_deg_pro">
                    <form action="{{url('update_product',$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input_height">
                            <label>Product Title</label>
                            <input type="text" name="title" value="{{$data->title}}" required>
                        </div>

                        <div class="input_height">
                            <label>Description</label>
                            <textarea name="description" maxlength="50"  required>{{$data->description}}</textarea>
                        </div>

                        <div class="input_height">
                            <label>Price </label>
                            <input type="text" name="price" value="{{$data->price}}">
                        </div>

                        <div class="input_height">
                            <label>Quantity</label>
                            <input type="number" name="quantity" value="{{$data->quantity}}">
                        </div>

                        <div class="input_height">
                            <label>Product Category</label>
                            <select name="category" required>
                                <option value="{{$data->category}}">{{$data->category}}</option>
                                @foreach($category_data as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input_height">
                            <label>Current Image</label>
                            <img src="/products/{{$data->image}}" style="width:100px; height:100px">
                        </div>
                        <div class="input_height">
                            <label>New Image</label>
                            <input type="file" name="image">
                        </div>

                        <div class="input_height">
                            <input type="submit" value="Update Product" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- JavaScript files-->
@include('admin.js')

</body>
</html>
