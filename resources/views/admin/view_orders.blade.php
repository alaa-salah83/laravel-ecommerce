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
            margin: 20px auto;
            border: 3px solid #bd2130;
            color: white;
            width:60%;
        }
        th{
            background-color: #3d4148;
            padding: 5px;
            font-weight: bold;
        }

        td{
            padding: 5px;
            border: 1px solid #bd2130;
        }

        img{
            width: 150px;
            height: 150px;
        }

        a.status{
            display: block;
            margin-top: 10px;
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
                <h2>All Orders</h2>
                <div class="div_deg_t">
                    <table class="table_deg_pro">
                        <tr>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product Title</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Print PDF</th>
                        </tr>
                        @foreach($order_data as $orders_data)
                            <tr>
                                <td>{{$orders_data->name}}</td>
                                <td>{{$orders_data->rec_address}}</td>
                                <td>{{$orders_data->phone}}</td>
                                <td>{{$orders_data->product->title}}</td>
                                <td>${{$orders_data->product->price}}</td>
                                <td>
                                    <img src="/products/{{$orders_data->product->image}}">
                                </td>
                                <td>{{$orders_data->payment_status}}</td>
                                <td>
                                    @if($orders_data->status=='in progress')
                                        <span style="color:skyblue">{{$orders_data->status}}</span>
                                    @elseif($orders_data->status=='On The Way')
                                        <span style="color:#DB6574">{{$orders_data->status}}</span>
                                    @else
                                        <span style="color:#ffc107">{{$orders_data->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('on_the_way',$orders_data->id)}}" class="btn btn-primary status">On The Way</a>
                                    <a href="{{url('delivered',$orders_data->id)}}" class="btn btn-warning status">Delivered</a>
                                </td>
                                <td>
                                    <a href="{{url('print_pdf',$orders_data->id)}}" class="btn btn-secondary">Print</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="div_deg_t">
                    {{$order_data->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript files-->
@include('admin.js')

</body>
</html>

