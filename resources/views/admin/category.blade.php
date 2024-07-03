<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dark Bootstrap Admin </title>
    @include('admin.css')

    <style>
        input[type="text"]{
            width: 400px;
            height: 50px;
        }

        .div-design{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }
        .table_design{
            text-align: center;
            margin: 50px auto;
            border: 3px solid #bd2130;
            color: white;
            width: 60%;
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
                <h1 style="color: white">Add Category</h1>
                <div class="div-design">
                <form action="{{url('add_category')}}" method="post">
                    @csrf
                    <div>
                        <label><input type="text" name="category"></label>
                        <input type="submit" value="Add Category" class="btn btn-primary">
                    </div>
                </form>
                </div>

                <div>
                    <table class="table_design">
                        <tr>
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        @foreach($data as $data)
                        <tr>
                            <td>
                                {{$data->category_name}}
                            </td>
                            <td>
                                <a href="{{url('edit_category',$data->id)}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{url('delete_category',$data->id)}}"
                                   class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
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
          title: "Are You Sure Delete Category?",
          text: "Once deleted, you will not be able to recover this category!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
          .then((willCancel) => {
              if (willCancel) {
                  window.location.href = urlToRedirect;
              } else {
                  swal("Your Category is safe!");
              }
          });
  }
</script>

@include('admin.js')

</body>
</html>
