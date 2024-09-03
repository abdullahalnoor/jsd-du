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
                <table class="table table-hover table-bordered dataTable" id="permission-table" >
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Name</th>
                      <th>Route/Url</th>
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
      var permissionTable = $('#permission-table').DataTable({
        searching: true, 
        processing: true,
        serverSide: true,
        ordering: false,
        responsive: true,
        stateSave: true,
        ajax: {
          url: "{{route('admin.permission.index')}}",
        },
        columns: [
             { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data: 'name', name: 'name'},
            {data: 'route', name: 'route'},
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


   

    })
     
    </script>
 @endpush