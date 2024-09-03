@extends('admin.master')

@section("title")
Manage Categories 
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('assets/admin/plugins/DataTables/css/dataTables.bootstrap5.min.css')}}">
@endpush

@section("content")
      <div class="card">
        <div class="card-body">
        <div class="row">
        <div class="col-md-12">
                <table class="table table-hover table-bordered dataTable" id="manageManuscriptTable" >
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Subject</th>
                      <!-- <th>Contact Email</th> -->
                      <th>Action</th>
                    </tr>
                  </thead>
                    <tbody>
                    
                    </tbody>
                </table>
        </div>
      </div>
        </div>
      </div>

      <form id="deleteForm" action="" method="POST">
        @csrf
        @method("DELETE")
      </form>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{asset('assets/admin/plugins/DataTables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/plugins/DataTables/js/dataTables.bootstrap5.min.js')}}"></script>
   <script>
    $(document).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      var categoryTable = $('#manageManuscriptTable').DataTable({
        searching: true, 
        processing: true,
        serverSide: true,
        ordering: false,
        responsive: true,
        stateSave: true,
        ajax: {
          url: "{{route('admin.manage-manuscript.index')}}",
        },
        columns: [
             { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data: 'subject', name: 'subject'},
            // {data: 'contact_email', name: 'contact_email'},
            // {data: 'status', name: 'status', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     

    $(document).on('click', '.custom-popover', function(e) {
        e.preventDefault();

        $('.custom-popover').popover({container: 'body', html: true, placement: 'left', }).popover('show').not(this).popover('hide');
        return false;
    });
   
      $(document).on('click', '.custom-popover-close', function() {
        $('.custom-popover').popover('hide');
        return false;
    });

      $(document).on('click', '.delete-record', function() {
      
       var  route = $(this).attr('href');
   
       $('#deleteForm').attr('action',route);
       $('#deleteForm').trigger('submit');
       console.log(route);
        return false;
    });

    

     



    })
     
    </script>
 @endpush