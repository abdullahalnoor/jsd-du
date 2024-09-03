<?php

namespace App\Http\Controllers\Admin;

use App\Models\JournalYear;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Session;
use DataTables;

class JournalYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            if($request->ajax()) {
              
                $journalYears = JournalYear::orderBy('journal_year','desc')->select('*');

                return Datatables::of($journalYears)
                        ->addIndexColumn()
                        ->addColumn('status', function($row){
                            if($row->status == 1){
                                $status = '<span class="me-1 p-2 badge badge-pill bg-primary">Active</span>';
                            }else if($row->status == 2){
                                $status = '<span class="me-1 p-2 badge badge-pill bg-danger">Inactive</span>';
                            }
                            return $status;
                          
                        })
                        // ->addColumn('image', function($row){
                        //      $url = asset($row->image);
                        //     return '<img alt="Image" src="'.$url.'" border="0" width="60" class="img-rounded" align="center" />';
                          
                        // })
                        ->addColumn('action', function($row){
                            $btn = "";
                            $btn .= '&nbsp;';
                            $btn .= ' <a href="'.route('admin.journal-year.edit',$row->id).'" class="btn btn-primary btn-sm "><i class="bi bi-pencil "></i></a>';
                            return $btn;
                        })
                        ->rawColumns(['status','action'])
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
            $notification = ['messege'=>'Successfully password has been added',
            'alert-type'=>'error'] ;
            \Log::error('Exception caught: ' . $e->getMessage()); 
            return back()->with( $notification);
           
        }

        return view('admin.journal-year.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.journal-year.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'journal_year' => 'required|min:4|max:4'
        ]);
        DB::beginTransaction();
        try {

            $journalYear = new JournalYear();

           

            // $journalYear->user_id = auth()->user()->id;
            $journalYear->journal_year = $request->journal_year;
            $journalYear->status = $request->status;
            $journalYear->save();

          
            DB::commit();
           
        } catch (\Exception $e) {
            // return $e->getMessage();
            // Session::flash('danger', 'Please. Fill out form correctly..');

            DB::rollback();
            $notification = ['messege'=>'Successfully password has been added',
            'alert-type'=>'error'] ;
            \Log::error('Exception caught: ' . $e->getMessage()); 
            return back()->with( $notification);
        }
        
        // Session::flash('success', 'Info Saved successfully..');
        $notification = ['messege'=>'Successfully password has been added',
        'alert-type'=>'success'] ;
        return \redirect()->route('admin.journal-year.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(JournalYear $journalYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JournalYear $journalYear)
    {
        return view('admin.journal-year.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JournalYear $journalYear)
    {
        $this->validate($request,[
            'journal_year' => 'required|min:4|max:4'
        ]);
        DB::beginTransaction();
        try {

        
            // $journalYear->user_id = auth()->user()->id;
            $journalYear->journal_year = $request->journal_year;
            $journalYear->status = $request->status;
            $journalYear->save();

          
            DB::commit();
           
        } catch (\Exception $e) {
            // return $e->getMessage();
            // Session::flash('danger', 'Please. Fill out form correctly..');

            DB::rollback();
            $notification = ['messege'=>'Successfully password has been added',
            'alert-type'=>'error'] ;
            \Log::error('Exception caught: ' . $e->getMessage()); 
            return back()->with( $notification);
        }
        
        // Session::flash('success', 'Info Saved successfully..');
        $notification = ['messege'=>'Successfully password has been added',
        'alert-type'=>'success'] ;
        return \redirect()->route('admin.journal-year.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JournalYear $journalYear)
    {
        //
    }
}
