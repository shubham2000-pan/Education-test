@extends('layout.admin.app')

@section('internal_css')    
  <style type="text/css">
  .error{
    color:red;
  }
</style>

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cource Package Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cource Package</li>
              <li class="breadcrumb-item active">Update</li>
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
                <h3 class="card-title">Package</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('package_update') }}" method="post">
                   @csrf
                   <input type="hidden" name="id" value="{{ $result->id }}">
                <div class="card-body">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Cource id</label>
                    <input type="text" class="form-control" name="cource_id" id="exampleInputEmail1"placeholder="Enter Package Name" value="{{ $result->cource_id }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1"placeholder="Enter Package Name" value="{{ $result->name }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea id="summernote" name="description" placeholder="Description">
                     {{ $result->description }}
                  </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="name" class="form-control" name="price" id="exampleInputPassword1" placeholder="Name" value="{{ $result->price }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price Type</label>
                    <input type="name" class="form-control" name="price_type" id="exampleInputPassword1" placeholder="Name" value="{{ $result->price_type }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-block btn-success btn-sm" name="submit" value="Update" >
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>
  
 @endsection

  @section('footer_script')
 <script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
 @endsection