@extends('admin.master')

@section("title")
Add Board Member
@endsection

@push('styles')
   
@endpush


@section("content")



      <div class="row">
       
        <div class="col-md-12">
          <div class="tile">
            <!-- <h3 class="tile-title">Vertical Form</h3> -->
            <form action="{{route('admin.board-member.store')}}" method="POST"  enctype="multipart/form-data">
    
            @csrf
            <div class="tile-body">

                
                
                <div class="mb-3">
                  <label class="form-label"> <b>Name <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="name" type="text" value="{{old('name')}}" placeholder="Enter Name">
                  @error('name')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>

                

                <div class="mb-3">
                  <label class="form-label"> <b>Designation <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="designation" type="text" value="{{old('designation')}}" placeholder="Enter Designation">
                  @error('designation')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label"> <b>Affiliation <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="affiliation" type="text" value="{{old('affiliation')}}" placeholder="Enter Affiliation">
                  @error('affiliation')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>



              


                <div class="mb-3">
                  <label class="form-label"> <b>Image<i class="text-danger">*</i></b></label>
                  <input class="form-control" name="image" type="file" >
                  @error('image')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label"> <b>Order Id <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="order_id" type="number" value="{{old('order_id')}}" placeholder="Enter Order Id">
                  @error('order_id')
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