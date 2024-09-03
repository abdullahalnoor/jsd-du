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
            <h3 class="tile-title">Update Role & Email </h3>
            <p>Admin (as per as user role) can manually reset any user account's profile information , role & email address.</p>

            <form action="{{route('admin.user.update',$user->id)}}" method="POST"  enctype="multipart/form-data">
              @csrf
              @method("PUT")
            <div class="tile-body">


            <div class="mb-3">
                    <label class="form-label" for="role"><b>Role <i class="text-danger">*</i></b></label>
                    <select class="form-control" name="role" id="role">
                    <option value="">Select One</option>
                    @foreach($roles as $roleItem)
                      <option value="{{$roleItem->id}}"
                       @foreach ($user->roles as $userRole)
                          {{$roleItem->id == $userRole->id ? 'selected' : '' }}
                      @endforeach
                      >{{$roleItem->name}}</option>
                    @endforeach
                    </select>
                    @error('role')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                  </div>
            
                <div class="mb-3">
                  <label class="form-label"> <b>Name <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="name" value="{{old('name',$user->name)}}" type="text" placeholder="Enter  name">
                  @error('name')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="email"><b>Email <i class="text-danger">*</i></b></label>
                    <input id="email" type="email" value="{{old('email',$user->email)}}" class="form-control " name="email" >

                    @error('email')
                    <strong class="text-danger">{{ $message }}</strong>
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


      
      <div class="row">
       
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Reset Password </h3>
            <p>Admin (as per as user role) can manually reset any user password if needed .</p>

            <p>
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.


            </p>
            <form action="{{route('admin.user.reset.password',$user->id)}}" method="POST"  enctype="multipart/form-data">
              @csrf
              @method("PUT")

            <div class="tile-body">


      

                  <div class="mb-3">
                    <label class="form-label" for="password"> <b>Password </b></label>
                    <input id="password" type="password" class="form-control" name="password" autocomplete="on">
                      @error('password')
                      <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                  </div>



                  <div class="mb-3">
                    <label class="form-label" for="password-confirm"> <b>Password Confirmation </b></label>
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


      @if($user->account_status == 1)


      <div class="row">
       
       <div class="col-md-12">
         <div class="tile">
           <h3 class="tile-title">Deactivate Account  </h3>
            <b>Account Created at : {{ date('Y-m-d',strtotime($user->created_at)) }}</b> 
            <br>
            <b> Role  : @foreach($user->roles as $activeUserRoleItem){{$activeUserRoleItem->name}} @endforeach</b>
           <p> Once account is deactivated, all of this user resources
             and data will be remain but user can not access and can 
             not perform any action in this application . </p>

           <form action="{{route('admin.user.deactivate.account',$user->id)}}" method="POST"  enctype="multipart/form-data">
             @csrf
            @method("PUT")
           <div class="tile-body">


            
           </div>
           <div class="tile-footer">
             <button class="btn btn-danger" type="submit"><i class="bi bi-check-circle-fill me-2"></i>Deactivate Account</button>
             <!-- &nbsp;&nbsp;&nbsp;
             <a class="btn btn-secondary" href="#"><i class="bi bi-x-circle-fill me-2"></i>Cancel</a> -->
           </div>

           </form>
         </div>
         
       </div>
    
      
     </div>

     @elseif($user->account_status == 2)
     <div class="row">
       
       <div class="col-md-12">
         <div class="tile">
           <h3 class="tile-title">Activate Account  </h3>
            <b>Account Created at : {{ date('Y-m-d',strtotime($user->created_at)) }}</b> 
            <br>
            <b> Role  : @foreach($user->roles as $activeUserRoleItem){{$activeUserRoleItem->name}} @endforeach</b>
           <p> Once account is activated, user can access and can perform all of action in this application according to the role 
            also user can see his previous all resources and data . </p>

           <form action="{{route('admin.user.activate.account',$user->id)}}" method="POST"  enctype="multipart/form-data">
             @csrf
             @method("PUT")
        
           <div class="tile-body">


            
           </div>
           <div class="tile-footer">
             <button class="btn btn-success" type="submit"><i class="bi bi-check-circle-fill me-2"></i>Aactivate Account</button>
                </div>

           </form>
         </div>
         
       </div>
    
      
     </div>
     @endif
@endsection
