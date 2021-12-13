<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>DoctorGram - Register User</title>
  </head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
        DoctorGram - Enter Your Details
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ route('doctors.store') }}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">First Name</label>
          <input type="text" name="firstName" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text"  name="lastName" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="text" name="phoneNumber" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Hospital Name</label>
            <input type="text" name="hospital_name" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Hospital Address</label>
            <input type="text" name="hospital_address" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Employment Title</label>
            <input type="text" name="field" class="form-control">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>