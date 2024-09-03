@extends('admin.master')

@section('title','Change Password')

@push('styles')


@endpush

@section('content')

<div class="app-title">
  <div>
    <h1><i class="fa fa-key"></i> Change Password</h1>
    
  </div>
</div>

@include('backend.includes.error')

<div class="row">
  <div class="col-md-12">

          <div class="card">
            <div class="card-header">
             <div class="d-flex">
              <div class="text-left">
                <i class="fa fa-key"></i> Change Password
              </div>
              
             </div>
            </div>

      


            <div class="card-body">
                  <form class="form-horizontal" method="POST" action="{{route('admin.change.password')}}"
                    enctype="multipart/form-data">
                    @csrf
                
                 


                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-10">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-10">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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