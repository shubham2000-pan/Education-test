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
            <h1>Cource Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cource Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
        <div class="col-md-12">
            <div class="card card-success">
              
 
              <div class="card-header">
                <h3 class="card-title">Add Cource</h3>
              </div>
                <div class="card-body">
                  <form action="{{ url('store') }}" method="post" enctype="multipart/form-data">
                   @csrf
                   <label for="exampleInputEmail1">Name</label>
                <input class="form-control" type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                <span class="error">{{ $errors->errors->first('name') }}</span> 
              
                <br>
                <label for="exampleInputEmail1">Description</label>
                 <textarea id="summernote" name="description" placeholder="Description" value="{{ old('name') }}" >
                 
                  </textarea>
                  <span class="error">{{ $errors->errors->first('description') }}</span> 
                <br>
                <label for="exampleInputEmail1">Duration</label>
                <input class="form-control" type="text" name="duration" placeholder="Duration" value="{{ old('duration') }}" >
                <span class="error">{{ $errors->errors->first("duration") }}</span> 
              
                <br>
                <label for="exampleInputEmail1">Fees</label>
                <input class="form-control" type="text" name="fees" placeholder="fees" value="{{ old('fees') }}" >
                <span class="error">{{ $errors->errors->first('fees') }}</span> 
                <br>
              <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      
                    </div>
                  </div>
                </div>
                <br>
                <label for="exampleInputEmail1">Added by</label>
                <select class="form-control" name="added_by" value="{{ old('added_by') }}" >
                <option>--------</option>
                 @foreach($teacher as $key=>$value)
                <option value="{{$key }}">{{ $value}}</option>
                 @endforeach
                </select>
                <span class="error">{{ $errors->errors->first('added_by') }}</span> 
              
                <br>
                <label for="exampleInputEmail1">Fees type</label>
                <select class="form-control" name="fees_type" value="{{ old('fees_type') }}" >
                <option>--------</option>
                @foreach($fees_type as $key=>$value)
                <option value="{{$key }}">{{ $value}}</option>
                @endforeach
                </select>
                <span class="error">{{ $errors->errors->first('fees_type') }}</span> 
              
                <br>
                <input type="submit" name="submit" value="submit" class="btn btn-block btn-primary">
                 </form>
              </div>
              <!-- /.card-body -->
            </div>
         
            <!-- /.card -->
          </div>
        </div>
      </div>
      </div>
    </section>
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