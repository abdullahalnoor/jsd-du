@extends('admin.master')

@section('title','Update Profile')

@push('styles')


@endpush

@section('content')

<div class="app-title">
  <div>
    <h1><i class="fa fa-user"></i> Update Profile</h1>
    
  </div>
</div>

@include('backend.includes.error')

<div class="row">
  <div class="col-md-12">

          <div class="card">
            <div class="card-header">
             <div class="d-flex">
              <div class="text-left">
                <i class="fa fa-user"></i> Update Profile
              </div>
              
             </div>
            </div>

      


            <div class="card-body">
                  <form class="form-horizontal" method="POST" action="{{route('admin.update.profile')}}"
                    enctype="multipart/form-data">
                    @csrf
                
                 


                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-10">
                            <input id="name" type="name" value="{{auth()->user()->name}}" class="form-control " name="name" >

                            @error('name')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>

                        <div class="col-md-10">
                            <input id="email" type="email" value="{{auth()->user()->email}}" class="form-control " name="email" >

                            @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                








                
                    <div class="form-group row">
                      <label class="control-label col-md-2"></label>
                      <div class="col-md-10">
                        <button type="submit" class="btn btn-info"> <i class="fa fa-plus"></i> SAVE</button>
                      </div>
                    </div>
                
                
                  </form>
                </div>

 

          </div>


  </div>
</div>

@endsection

@push('script')

@endpush