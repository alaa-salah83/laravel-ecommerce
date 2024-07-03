<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dark Bootstrap Admin </title>
    @include('admin.css')
    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        input[type='text']{
            width:400px;
            height:50px;
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
            <h1 style="color: white;">Update Category</h1>
                <div class="div_deg">
                    <form method="post" action="{{url('update_category',$data->id)}}">
                        @csrf
                        <label><input type="text" name="category" value="{{$data->category_name}}"></label>
                        <label><input type="submit" value="Update Category" class="btn btn-primary"></label>
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

