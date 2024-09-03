<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\LogEvent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

use App\Interfaces\CategoryInterface;

use DB;
use Session;
use DataTables;


class CategoryController extends Controller
{
    private $imagePath = 'uploads/images/category';

    private $errorTrace = 'app\Http\Controllers\Admin\CategoryController';
    private function errorTrace(){
        return public_path().'\app\Http\Controllers\Admin\CategoryController';
    } 

    protected $category;
    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
      //    Repositories
        // try
        // {
        //     if($request->ajax()) {
        //         return $this->category->fetch($request);
        //     }
        //     // return view('categories.index'); 
        // }catch(Exception $e){
        //      \Log::error('Exception caught: ' . $e->getMessage()); 
        //      return false;
        // }
   // End of   Repositories





        try
        {
            if($request->ajax()) {
              
                $categories = Category::orderBy('id','desc')->select('*');

                return Datatables::of($categories)
                        ->addIndexColumn()
                        ->addColumn('status', function($row){
                            if($row->status == 1){
                                $status = '<span class="me-1 p-2 badge badge-pill bg-primary">Active</span>';
                            }else if($row->status == 2){
                                $status = '<span class="me-1 p-2 badge badge-pill bg-danger">Inactive</span>';
                            }
                            return $status;
                          
                        })
                        ->addColumn('image', function($row){
                             $url = asset($row->image);
                            return '<img alt="Image" src="'.$url.'" border="0" width="60" class="img-rounded" align="center" />';
                          
                        })
                        ->addColumn('action',function($row){
                            return view('admin.includes.button',[ 
                                'row'=>$row ,
                                'editroute'=>'admin.category.edit',
                                'showroute'=>'admin.category.show',
                                'deleteroute'=>'admin.category.destroy',
                                'withswitch'=>true
                            ]);
                            
                        })
                        ->rawColumns(['status','image','action'])
                        // ->buttons([
                        //     Button::make('add'),
                        //     Button::make('excel'),
                        //     Button::make('csv'),
                        //     Button::make('pdf'),
                        //     Button::make('print'),
                        //     Button::make('reset'),
                        //     Button::make('reload'),
                        // ])
                        ->make(true); 
            }
            // return view('categories.index'); 
        }catch(Exception $e){
             \Log::error('Exception caught: ' . $e->getMessage()); 
             return false;
        }

        return view('admin.category.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
       
        DB::beginTransaction();
        try {

            $category = new Category();

            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
                if (! file_exists(public_path($this->imagePath))) {
                    mkdir(public_path($this->imagePath), 0777, true);
                }  
                $image->move(public_path().'/'.$this->imagePath,$imageName);
                $category->image = $this->imagePath.'/'.$imageName;
            }else{
                $category->image = \AppHelper::$defaultImage;
            }

            $category->user_id = auth()->user()->id;
            $category->name = $request->name;
            $category->status = $request->status;
            $category->save();

            $logEvent = LogEvent::where('slug','create')->first();
            \AppLog::addToLog($logEvent,"Category Created",'App\Models\Category',$category);

            DB::commit();
           
        } catch (\Exception $e) {
            // return $e->getMessage();
            // Session::flash('danger', 'Please. Fill out form correctly..');

            DB::rollback();
            $notification = ['messege'=>'Successfully password has been added',
            'alert-type'=>'error'] ;
            \Log::error($this->errorTrace().'@store & Exception caught : ' . $e->getMessage());
            return back()->with( $notification);
        }
        
        // Session::flash('success', 'Info Saved successfully..');
        $notification = ['messege'=>'Successfully password has been added',
        'alert-type'=>'success'] ;
        return \redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Category $category)
    {
        // return $category;
        DB::beginTransaction();
        try {
            if($request->hasFile('image')){
                @unlink(public_path().'/'.$category->image);
                $image = $request->file('image');
                $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
                if (! file_exists(public_path($this->imagePath))) {
                    mkdir(public_path($this->imagePath), 0777, true);
                }  
                $image->move(public_path().'/'.$this->imagePath,$imageName);
                $category->image = $this->imagePath.'/'.$imageName;
            }
            $category->user_id = auth()->user()->id;
            $category->name = $request->name;
            $category->status = $request->status;
            $category->save();

            DB::commit();

            // Session::flash('success', 'Info Saved successfully..');
            $notification = ['messege'=>'Successfully password has been added',
                                'alert-type'=>'success'] ;
            return \redirect()->route('admin.category.index')->with($notification);
        } catch (\Exception $e) {
            // return $e->getMessage();
            // Session::flash('error', 'Please. Fill out form correctly..');
            $notification = ['messege'=>'Successfully password has been added',
            'alert-type'=>'danger'] ;
            // return $e->getMessage();
            DB::rollback();
            return back();
        }
        // return 'ok';
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        DB::beginTransaction();
        try {
            @unlink(public_path().'/'.$category->image);
           $category->delete();

            DB::commit();

            // Session::flash('success', 'Info Saved successfully..');
            $notification = ['messege'=>'Successfully record has been updated',
                                'alert-type'=>'success'] ;
            return \redirect()->route('admin.category.index')->with($notification);
        } catch (\Exception $e) {
            // return $e->getMessage();
            // Session::flash('error', 'Please. Fill out form correctly..');
            $notification = ['messege'=>'Successfully password has been added',
            'alert-type'=>'danger'] ;
            // return $e->getMessage();
            DB::rollback();
            return back();
        }
      
        
    }
}
