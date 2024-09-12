@extends('admin.master')

@section("title")
Update Board Member
@endsection

@push('styles')
   
@endpush


@section("content")



      <div class="row">
       
        <div class="col-md-12">
          <div class="tile">
            <!-- <h3 class="tile-title">Vertical Form</h3> -->
            <form action="{{route('admin.board-member.update',$boardMember->id)}}" method="POST"  enctype="multipart/form-data">
              @csrf
              @method('PUT')
            <div class="tile-body">

                
                <div class="mb-3">
                  <label class="form-label"> <b>Name <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="name" type="text" value="{{old('name',$boardMember->name)}}" placeholder="Enter Name">
                  @error('name')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label"> <b>Designation <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="designation" type="text" value="{{old('designation',$boardMember->designation)}}" placeholder="Enter Designation">
                  @error('designation')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>


                <div class="mb-3">
                  <label class="form-label"> <b>Affiliation <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="affiliation" type="text" value="{{old('affiliation',$boardMember->affiliation)}}" placeholder="Enter Affiliation">
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
                  <input class="form-control" name="order_id" type="number" value="{{old('order_id',$boardMember->order_id)}}" placeholder="Enter Order Id">
                  @error('order_id')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>

                
                <div class="mb-3">
                    <label class="form-label" for="status"><b>Status</b></label>
                    <select class="form-control" name="status" id="status">
                    <!-- <option value="">Select One</option> -->
                      <option value="1" {{$boardMember->status == 1 ? 'selected' : ''}} >Active</option>
                      <option  value="2" {{$boardMember->status == 2 ? 'selected' : ''}}>Inactive </option>
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
   
@endpush