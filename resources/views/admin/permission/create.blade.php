@extends('admin.master')

@section("title")
Add Permission
@endsection

@push('styles')
   
@endpush


@section("content")



      <div class="row">
       
        <div class="col-md-12">
          <div class="tile">
            <!-- <h3 class="tile-title">Vertical Form</h3> -->
            <form action="{{route('admin.permission.store')}}" method="POST"  enctype="multipart/form-data">
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
                  <label class="form-label"> <b>Route <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="route" type="text" placeholder="Enter Route">
                  @error('route')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
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
   
@endpush



