<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    @include('home.css')
    <style>
        .div_deg_t{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }
        .table_deg_pro{
            text-align: center;
            margin: 20px auto;
            border: 3px solid #bd2130;
            width:100%;
        }
        th{
            background-color: skyblue;
            padding: 5px;
            font-weight: bold;
        }

        td{
            padding: 5px;
            border: 1px solid #bd2130;
        }

        img{
            width: 200px;
            height: 200px;
        }
    </style>
</head>

<body>
<div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->
    <div class="div_deg_t">

        <table class="table_deg_pro">
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Delivery Status</th>
            </tr>
            @foreach($data as $dataOrders)
                <tr>
                    <td>{{$dataOrders->product->title}}</td>
                    <td>${{$dataOrders->product->price}}</td>
                    <td>
                        <img src="/products/{{$dataOrders->product->image}}">
                    </td>
                    <td>{{$dataOrders->status}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
<!-- end hero area -->

<!-- info section -->
@include('home.footer')

</body>
</html>

