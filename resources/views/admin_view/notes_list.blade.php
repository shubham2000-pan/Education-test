@extends('layout.admin.app')

@section('internal_css')    
  
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cources Notes List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cources Notes List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="card">
              <div class="card-header">
                <h3 class="card-title">Cources Notes List</h3>
              <div>
                <button class="btn btn-primary btn-sm float-sm-right" style="background:white; border-radius:22px;">
                  <a href=" {{ url('notes_create')}} ">
                   <i class="fas fa-plus"></i> Add Notes
                  </a>
                </button>
                 </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="notestable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>Id</th>
                     <th>cource Name</th>
                     <th>syllabus Name</th>
                    <th>Name</th>
                    <th>Descripation</th>
                    <th>Added_by</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  
                  <tbody>   
                  
                   
                  
                  </tbody>
                 

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection

@section('footer_script')
<script type="text/javascript">

     activeProjectDatatable = $('#notestable').DataTable({
        "language": {
            "processing": ''
        },
        "pagingType": "full_numbers",
          "searching": true,
        "ordering": true,//disable sorting
        "dom": "Blfrtip",//hide pagination
        "bLengthChange": false,//length info
        "bFilter": true,//hide search filter
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": 'notes-list',
            "type": "POST",
            'beforeSend': function (request) {
                //Set csrf token
                request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
            },
            "error": function (xhr, error, thrown) {
                //#### common function for handling error #####
            }
        },
        "initComplete": function (settings, json) {
            //##### Set Filter Date on first time initialization #####
        },
        //Set Class name to td
        "columns": [null, null,null, null, null,null,null],        
    });
     

     $(document).on('click','.delete-data',function(){
        //$(this).attr('data-id');
        var id = $(this).data('id');
       swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Yes, delete it!',
                buttonsStyling: false
            }).then(function() {



         $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/notes-delete') }}/"+id,
            type: 'get',
            success: function (response) {
                if (response.status == true) {
                    activeProjectDatatable.ajax.reload();
                    swal({
                        title: 'Deleted!',
                        text: 'Your file has been debtn btn-dangerleted.',
                        type: 'success',
                        confirmButtonClass: "btn btn-success",
                        buttonsStyling: false
                    });
                    
                
                } else {
                    
                    swal({
                        title: 'Deleted!',
                        text: 'Your file has been debtn btn-dangerleted.',
                        type: 'success',
                        confirmButtonClass: "btn btn-danger",
                        buttonsStyling: false
                    });

                }
            },
            error: function (e) {
                console.log(e);
            },
            processData: false,
            contentType: false
        });
    })
})
    
</script>
@endsection