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
            <h1>Cource Package</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cource Package</li>
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
              <form action="{{ url('package_store') }}" method="post" enctype="multipart/form-data">
                   @csrf
                <div class="card-body">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Cource id</label>
                    <select class="form-control" name="cource_id" >
                      <option>-------</option>
                      @foreach($result as $key=>$value)
                      <option value="{{ $value->id }}">{{ $value->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1"placeholder="Enter Package Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea id="summernote" name="description" placeholder="Description" value="{{ old('name') }}" >
                 
                  </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="name" class="form-control" name="price" id="exampleInputPassword1" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price Type</label>
                    <select class="form-control" name="price_type" >
                      <option>-------</option>
                      @foreach($fees_type as $key=>$value)
                      <option value="{{ $value->id }}">{{ $value->name }}</option>
                      @endforeach
                    </select>
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
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-block btn-success btn-sm" name="submit" value="Submit" >
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