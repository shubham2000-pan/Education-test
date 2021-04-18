@extends('layout.admin.app')

@section('internal_css')    
  <style type="text/css">
  .error{
    color:red;
  }

</style>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Event</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Event</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Event</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="event-store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Name">
                  </div>
                 <div class="form-group">
                    <label for="exampleInputAbout">About</label>
                    <input type="text" name="about" class="form-control" id="exampleInputAbout" placeholder="Enter About">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputAbout">Heading About</label>
                    <input type="text" name="heading" class="form-control" id="exampleInputAbout" placeholder="Enter About">
                  </div>
                  

                  <div class="form-group">
                    <label for="exampleInputposition">Date</label>
                    <input type="Date" name="date" class="form-control" id="exampleInputposition" placeholder="position">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputContact">Start Time</label>
                    <input type="time" name="start_time" class="form-control" id="exampleInputContact" placeholder="Enter Contact">
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Finish Time</label>
                    <input type="time" name="finish_time" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputAddress">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputAddress" placeholder="Enter address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputAddress">Place</label>
                    <input type="text" name="place" class="form-control" id="exampleInputAddress" placeholder="Enter address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      
                    </div>
                  </div>
            
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Banner Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="banner_image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      
                    </div>
                  </div>
            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
         
        </div>
      </div>
    </div>
  </div>
</section>


@endsection

@section('footer_script')

@endsection
