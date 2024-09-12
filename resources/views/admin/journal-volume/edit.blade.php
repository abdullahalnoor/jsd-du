@extends('admin.master')

@section("title")
Update Volume
@endsection

@push('styles')
   
@endpush


@section("content")



      <div class="row">
       
        <div class="col-md-12">
          <div class="tile">
            <!-- <h3 class="tile-title">Vertical Form</h3> -->
            <form action="{{route('admin.journal-volume.update',$journalVolume->id)}}" method="POST"  enctype="multipart/form-data">
              @csrf
              @method('PUT')
            <div class="tile-body">

            <div class="mb-3">
                    <label class="form-label" for="journal_year"><b>Journal Year  <i class="text-danger">*</i> </b></label>
                    <select  class="form-control" name="journal_year" id="journal_year">
                    <option value="">Select One</option>
                    @foreach($journalYears as $journalYearItem )
                      <option value="{{$journalYearItem->id}}"
                      {{$journalVolume->journal_year_id == $journalYearItem->id ? 'selected' : ''}}
                      >{{$journalYearItem->journal_year}}</option>
                    @endforeach
                    </select>
                    @error('journal_year')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                  </div>
            
                <div class="mb-3">
                  <label class="form-label"> <b>Volume No <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="volume_no" type="text" value="{{old('volume_no',$journalVolume->volume_no)}}">
                  @error('volume_no')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="status"><b>Status</b></label>
                    <select class="form-control" name="status" id="status">
                    <!-- <option value="">Select One</option> -->
                      <option value="1" {{$journalVolume->status == 1 ? 'selected' : ''}} >Active</option>
                      <option  value="2" {{$journalVolume->status == 2 ? 'selected' : ''}}>Inactive </option>
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