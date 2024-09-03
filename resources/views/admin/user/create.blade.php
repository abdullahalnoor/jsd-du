@extends('admin.master')

@section("title")
Add User
@endsection

@push('styles')
   
@endpush


@section("content")



      <div class="row">
       
        <div class="col-md-12">
          <div class="tile">
            <!-- <h3 class="tile-title">Vertical Form</h3> -->
            <form action="{{route('admin.user.store')}}" method="POST"  enctype="multipart/form-data">
              @csrf
            <div class="tile-body">
            
              <div class="mb-3">
                    <label class="form-label" for="role"><b>Role <i class="text-danger">*</i></b></label>
                    <select class="form-control" name="role" id="role">
                    <option value="">Select One</option>
                    @foreach($roles as $roleItem)
                      <option value="{{$roleItem->id}}">{{$roleItem->name}}</option>
                    @endforeach
                    </select>
                    @error('role')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                  </div>

                <div class="mb-3">
                  <label class="form-label"> <b>Name <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="name" type="text" placeholder="Enter  name">
                  @error('name')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="status"><b>Email <i class="text-danger">*</i></b></label>
                    <input id="email" type="email" value="{{old('email')}}" class="form-control " name="email" >

                    @error('email')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>


                  <div class="mb-3">
                    <label class="form-label" for="image"> <b>Password <i class="text-danger">*</i></b></label>
                    <input id="password" type="password" class="form-control" name="password" autocomplete="on" >
                      @error('password')
                      <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                  </div>



                  <div class="mb-3">
                    <label class="form-label" for="image"> <b>Password Confirmation <i class="text-danger">*</i></b></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="on" >
                  </div>


                  <div class="mb-3">
                    <label class="form-label" for="image"> <b>Image</b></label>
                    <input class="form-control" name="image" id="image" type="file" aria-describedby="fileHelp">
                    @error('image')
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
