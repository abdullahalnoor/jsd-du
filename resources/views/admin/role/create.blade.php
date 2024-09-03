@extends('admin.master')

@section("title")
Add Role
@endsection

@push('styles')
   
@endpush


@section("content")



      <div class="row">
       
        <div class="col-md-12">
          <div class="tile">
            <!-- <h3 class="tile-title">Add  Role</h3> -->
            <form action="{{route('admin.role.store')}}" method="POST"  enctype="multipart/form-data">
              @csrf
            <div class="tile-body">
            
                <div class="mb-3">
                  <label class="form-label"> <b>Name <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="name" type="text" placeholder="Enter Name">
                  @error('name')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>



                <div class="mb-3">
                  <label class="form-label"> <b>Slug <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="slug" type="text" placeholder="Enter  Slug">
                  @error('slug')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>

                 <div class="mb-3">
                    <label class="form-label" for="status"><b>Status</b></label>
                    <select class="form-control" name="status" id="status">
                    <!-- <option value="">Select One</option> -->
                      <option value="1">Active</option>
                      <option  value="2">Inactive </option>
                    </select>
                    @error('status')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                  </div>


                 <div class="mb-3">
                  @foreach ($permissionGroups as $permissionGroupItem) 
                 
                  <!-- <label class="form-check-label btn btn-info">
                      <input class="form-check-input" type="checkbox">{{$permissionGroupItem->name}}
                    </label> -->
                    
                <b>{{$permissionGroupItem->name}}</b>
          
              <br>
              <!-- <br>              -->
           
            @foreach ($permissionGroupItem->permissions as $permissionItem)

            <label class="form-check-label   m-2" style="margin-left:5px">
               <input class="form-check-input"  name="permission_id[]" value="{{$permissionItem->id}}"  type="checkbox" >
                {{$permissionItem->name}}
            </label>
            
           
            @endforeach   
               <br><br>             
         
            @endforeach
                </div>
                
               

                 
             
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>Submit</button>
              <!-- &nbsp;&nbsp;&nbsp;
              <a class="btn btn-secondary" href="#"><i class="bi bi-x-circle-fill me-2"></i>Cancel</a> -->
            </div>

            </form>
          </div>
          
        </div>
     
       
      </div>
@endsection


@push('scripts')
<!-- $(document).on('click', '.custom-popover', function(e) {
        e.preventDefault();

        $('.custom-popover').popover({container: 'body', html: true, placement: 'left', }).popover('show').not(this).popover('hide');
        return false;
    });
   
      $(document).on('click', '.custom-popover-close', function() {
        $('.custom-popover').popover('hide');
        return false;
    }); -->
@endpush


