<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dark Bootstrap Admin </title>
    @include('admin.css')
    <style>
        .div_deg_t{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }
        .table_deg_pro{
            text-align: center;
            margin: 50px auto;
            border: 3px solid #bd2130;
            color: white;
            width:60%;
        }
        th{
            background-color: #3d4148;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
        }

        td{
            padding: 10px;
            border: 1px solid #bd2130;
            text-align: center;
        }

        input[type='search']{
            width: 500px;
            height: 45px;
            margin-left: 10px;
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
                <form action="{{url('product_search')}}" method="get">
                    @csrf
                    <input type="search" name="search" >
                    <input type="submit" class="btn btn-secondary" value="Search">
                </form>
{{--                <h1 style="color: white;">Products</h1>--}}
                <div class="div_deg_t">

                    <table class="table_deg_pro">
                        <tr>
                            <th>Product Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($product as $products)
                        <tr>
                            <td>{{$products->title}}</td>
                            <td>{{$products->description}}</td>
                            <td>{{$products->category}}</td>
                            <td>${{$products->price}}</td>
                            <td>{{$products->quantity}}</td>
                            <td>
                                <img src="products\{{$products->image}}" alt="Product Image"
                                     style="width: 100px; height: 100px">
                            </td>
                            <td>
                                <a href="{{url('edit_product',$products->slug)}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{url('delete_product',$products->id)}}" class="btn btn-danger"  onclick="confirmation(event)">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="div_deg_t">
                    {{$product->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript files-->

<script>
    function confirmation(event){
        event.preventDefault();
        const urlToRedirect = event.currentTarget.getAttribute('href');

        swal({
            title: "Are You Sure Delete Product?",
            text: "Once deleted, you will not be able to recover this product!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                } else {
                    swal("Your Product is safe!");
                }
            });
    }
</script>
@include('admin.js')

</body>
</html>

