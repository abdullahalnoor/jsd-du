<div class="btn-group" role="group">
@if (auth()->user()->can($editroute))
                
<a href="{{route($editroute,$row->id)}}" class="btn btn-primary btn-sm tooltips "

 title="Edit Record"
 > <i class="bi bi-pencil "></i></a>



 @endif

 @if (auth()->user()->can($deleteroute))

 <div  class="btn btn-danger btn-sm   custom-popover" 
 title="Delete Record"
                             data-bs-container="body" 
                             data-bs-toggle="popover" 
                             data-bs-placement="left"
                             data-bs-title="Delete Record"
                             data-bs-content="<p>This action cannot be undo. The record will be delete permanently
                            from the database.</p>
                            <a class='btn btn-danger delete-record '
                            href='{{route($deleteroute,$row->id)}}' 

                            >I am sure</a> 
                            <a class='btn btn-info   custom-popover-close'>No</a>" > <i class="bi bi-trash "></i></div>
                            

 @endif
</div>