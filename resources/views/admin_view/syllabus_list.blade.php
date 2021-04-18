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
            <h1>Cources Syllabus List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cources Syllabus List</li>
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
                <h3 class="card-title">Cources Syllabus List</h3>
              <div>
                <button class="btn btn-primary btn-sm float-sm-right" style="background:white; border-radius:22px;">
                  <a href=" {{ url('add_syllabus')}} ">
                   <i class="fas fa-plus"></i> Add Syllabus
                  </a>
                </button>
                 </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="syllabustable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>Id</th>
                     <th>Cource Name</th>
                    <th>Name</th>
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

     activeProjectDatatable = $('#syllabustable').DataTable({
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
            "url": 'syllabus_list',
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
        "columns": [null, null,{className: "td-actions"}, null,],        
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
            url: "{{ url('/syllabus-delete') }}/"+id,
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