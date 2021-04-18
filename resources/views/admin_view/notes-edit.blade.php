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
            <h1>Cource Notes Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cource Notes</li>
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
                <h3 class="card-title">Notes Update</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('notes_update') }}" method="post">
                   @csrf
                   <input type="hidden" name="id" value="{{$result->id}}">
                <div class="card-body">
                  <div class="form-group">
                   <select class="form-control" id="cource" name="cource_id" >
                      <option>-------</option>
                      @foreach($cource as $key=>$value)
                      <option value="{{ $value->id }}">{{ $value->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Syllabus Id</label>
                    <select class="form-control" id="syllabus-dd" name="syllabus_id" >
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="name" class="form-control" name="name" id="exampleInputPassword1" placeholder="Name" value="{{$result->name}}">
                  
                  <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                <textarea id="summernote" name="description" placeholder="Description" value="{{ $result->description }}" >
                 
                  </textarea>
                  </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">Added by</label>
                <select class="form-control" name="added_by">
                <option>------</option>
                @foreach($teacher as $key=>$value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
                
                </select>
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
<script type="text/javascript">
  
        $(document).ready(function () {
            $('#cource').on('change', function () {
                var idcource = this.value;

                $("#syllabus-dd").html('');
                $.ajax({
                    url: "{{url('courceselect')}}",
                    type: "POST",
                    data: {
                        cource_id: idcource,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#syllabus-dd').html('<option value="">-------</option>');
                        $.each(result.syllabus, function (key, value) {
                            $("#syllabus-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                       
                    }
                });
            });
         });

</script>
 @endsection