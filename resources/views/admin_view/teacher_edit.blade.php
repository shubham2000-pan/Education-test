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
            <h1>Teacher Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Teacher Update</li>
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
                <h3 class="card-title">Teacher Update</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('teacher_update')}}"  method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $result->id }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="{{ $result->name }}">
                  </div>
              
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact</label>
                    <input type="text" name="contact" class="form-control" id="exampleInputEmail1" placeholder="Enter Contact" value="{{ $result->contact }}">
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $result->email }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter address" value="{{ $result->address }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputAbout">About</label>
                    <input type="text" name="about" class="form-control" id="exampleInputAbout" placeholder="Enter About" value="{{ $result->about }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputAcchivments">Acchivments</label>
                    <input type="text" name="acchivments" class="form-control" id="exampleInputAcchivments" placeholder="Enter Acchivments" value="{{ $result->acchivments }}">
                  </div>
                 <div class="form-group">
                    <label for="exampleInputObjective">Objective</label>
                    <input type="text" name="objective" class="form-control" id="exampleInputObjective" placeholder="Enter Objective" value="{{ $result->objective }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">position</label>
                    <input type="text" name="position" class="form-control" id="exampleInputPassword1" placeholder="position" value="{{ $result->position }}">
                  </div>
                  

                <div class="card-footer">
                  <button type="submit" id="add_teacher" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
         
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection

