<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SitePage;


use App\Models\JournalArticle;
use App\Models\JournalIssue;
use App\Models\JournalVolume;
use App\Models\JournalYear;
use App\Models\BoardMember;


use Response;


class IndexController extends Controller
{
    public function index(){
        $journalIssue = JournalIssue::with('journalArticles')->where('status',1)->orderBy('order_id','desc')->first();
        return view('frontend.home.index',\get_defined_vars());
    }

    public function sitePage($slug){
        $sitePage = SitePage::where('slug',$slug)->firstOrFail();
        return view('frontend.pages.page',\get_defined_vars());
    }

    
    public function journalCurrentIssue(){
        // return 1;
         $journalIssue = JournalIssue::with('journalArticles')->orderBy('id','desc')->first();
        return view('frontend.journal.current-issue',\get_defined_vars());
    }

    public function journalIssue($id){
        // return 1;
         $journalIssue = JournalIssue::with('journalArticles')->find($id);
        return view('frontend.journal.issue',\get_defined_vars());
    }

    public function journalAllIssues(){
        // return 1;
         $journalIssues = JournalIssue::where('status',1)->orderBy('order_id','desc')->with('journalArticles')->get();
        return view('frontend.journal.all-issue',\get_defined_vars());
    }

    public function journalViewArticle($id){
        // return 1;
         $journalArticle = JournalArticle::with('journalIssue')->find($id);
         $journalArticle->view_count += 1;
         $journalArticle->save();
        //  $keywords = explode(" ",$journalArticle->keywords);
        //  return json_encode($keywords);
        //  return $journalArticle->keywords;
        return view('frontend.journal.article',\get_defined_vars());
    }
    public function journalKeyword($id){
        $journalArticle = JournalArticle::find($id);
        $keywords = explode(" ",$journalArticle->keywords);
        return $keywords;
    }

    public function journalDownloadFile($id){
        // return 1;
         $journalArticle = JournalArticle::find($id);
         $journalArticle->download_count += 1;
         $journalArticle->save();

         $file= public_path(). "/".$journalArticle->pdf_file;

        $headers = array(
                'Content-Type: application/pdf',
                );

        return Response::download($file, 'article.pdf', $headers);
        // return view('frontend.journal.article',\get_defined_vars());
    }

    
    public function journalViewFile($id){
        $journalArticle = JournalArticle::find($id);
        $file= public_path(). "/".$journalArticle->pdf_file;
        return response()->file($file);
    }
    
    
    public function journaEditorialTeam(){
        // return 1;
         $editor = BoardMember::orderBy('order_id','asc')->first();
         $assEditor = BoardMember::orderBy('order_id','asc')->skip(1)->first();
        $count = BoardMember::count();
        $skip = 2;
        $limit = $count - $skip; // the limit
        $boardMembers = BoardMember::orderBy('order_id','asc')->skip($skip)->take($limit)->get();

        return view('frontend.journal.editorial-team',\get_defined_vars());
    }

    
    
}
