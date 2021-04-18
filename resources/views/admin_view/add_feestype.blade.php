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
            <h1>Fees Type</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Fees Type</li>
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
                <h3 class="card-title">Fees Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('feestype_store') }}" method="post" enctype="multipart/form-data">
                   @csrf
                <div class="card-body">
                   
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1"placeholder="Enter Fees Type">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Amount</label>
                    <input type="name" class="form-control" name="amount" id="exampleInputPassword1" placeholder="Enter Amount">
                  </div>
                  

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