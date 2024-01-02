@extends('master')
@section('content')
<div class="breadcrumb-section breadcrumb-bg">
  <div class="container">
    <div class="row">
    <div class="col-lg-8 offset-lg-2 text-center">
      <div class="breadcrumb-text">
      <h1>Add Product</h1>
      </div>
    </div>
    </div>
  </div>
  </div>
  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Add product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <br>
  <form action = "/create" method = "post" class="form-group" style="width:70%; margin-left:15%;" action="/action_page.php" enctype="multipart/form-data">

  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

    <label class="form-group">Name:</label>
    <input type="text" class="form-control" placeholder="Name" name="name" required>
    <label>description:</label>
    <input type="text" class="form-control" placeholder="description" name="description"required>
    <label>photo: &nbsp &nbsp (.jpg / .png )</label>
    <input type="file" class="form-control" placeholder="photo" name="photo"required>
    <label>quantity:</label>
    <input type="number" class="form-control" placeholder="quantity" name="quantity"required>
    <label>price:</label>
    <input type="number" class="form-control" placeholder="price" name="price"required>
  <label>category:</label>
  <select class="form-control" name="category_id">
    <option value="drinks">drinks</option>
    <option value="food">food</option>
    <option value="cameras">cameras</option>
    <option value="watches">watches</option>
    <option value="bags">bags</option>
    <option value="electronics">electronics</option>
  </select>
  <br>
    <button type="submit"  value = "Add student" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
@endsection

