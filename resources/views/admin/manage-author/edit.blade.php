@extends('admin.master')

@section("title")
Update Author
@endsection

@push('styles')
   
@endpush


@section("content")



      <div class="row">
       
        <div class="col-md-12">
          <div class="tile">
            <!-- <h3 class="tile-title">Vertical Form</h3> -->
            <form action="{{route('admin.journal-year.update',$journalYear->id)}}" method="POST"  enctype="multipart/form-data">
              @csrf
              @method('PUT')
            <div class="tile-body">
            
                <div class="mb-3">
                  <label class="form-label"> <b>Journal Year <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="journal_year" type="text" value="{{old('journal_year',$journalYear->journal_year)}}">
                  @error('journal_year')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="status"><b>Status</b></label>
                    <select class="form-control" name="status" id="status">
                    <!-- <option value="">Select One</option> -->
                      <option value="1" {{$journalYear->status == 1 ? 'selected' : ''}} >Active</option>
                      <option  value="2" {{$journalYear->status == 2 ? 'selected' : ''}}>Inactive </option>
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