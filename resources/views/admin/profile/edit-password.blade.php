@extends('admin.master')

@section("title")
Edit User
@endsection

@push('styles')
   
@endpush


@section("content")



     

      
      <div class="row">
       
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Update Password </h3>
           
          
            <form action="{{route('admin.profile.update.password')}}" method="POST"  enctype="multipart/form-data">
              @csrf
           

            <div class="tile-body">


            <div class="mb-3">
                    <label class="form-label" for="current_password"> <b>Current Password <i class="text-danger">*</i> </b></label>
                    <input id="current_password" type="password" class="form-control" name="current_password" autocomplete="on">
                      @error('current_password')
                      <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="password"> <b>Password <i class="text-danger">*</i> </b></label>
                    <input id="password" type="password" class="form-control" name="password" autocomplete="on">
                      @error('password')
                      <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                  </div>



                  <div class="mb-3">
                    <label class="form-label" for="password-confirm"> <b>Password Confirmation <i class="text-danger">*</i> </b></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="on">

                  </div>
             
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>Submit</button>
                 </div>

            </form>
          </div>
          
        </div>
     
       
      </div>


    
@endsection
