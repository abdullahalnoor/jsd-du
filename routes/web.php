<?php

// use App\Http\Controllers\ProfileController;



use  App\Http\Controllers\Frontend\IndexController;


use App\Http\Controllers\Member\AuthorizationController;
use App\Http\Controllers\Member\MemberController;

use  App\Http\Controllers\Admin\CategoryController;


use  App\Http\Controllers\Admin\SitePageController;



use  App\Http\Controllers\Admin\JournalYearController;
use  App\Http\Controllers\Admin\JournalVolumeController;
use  App\Http\Controllers\Admin\JournalIssueController;
use  App\Http\Controllers\Admin\JournalArticleController;

use  App\Http\Controllers\Admin\BoardMemberController;

use  App\Http\Controllers\Admin\ManageAuthorController;
use  App\Http\Controllers\Admin\ManageManuscriptController;




use  App\Http\Controllers\Admin\RoleController;
use  App\Http\Controllers\Admin\PermissionController;
use  App\Http\Controllers\Admin\UserController;

use   App\Http\Controllers\Admin\DashboardController;

use   App\Http\Controllers\Admin\ProfileController;




use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/clear', function() {

        //   if($_SERVER['HTTP_HOST'] === 'scl-journal.com'){
        //     return $_SERVER['HTTP_HOST']; 
        //   }
        // return 1;
        //   return $_SERVER['HTTP_HOST'];
        //   return $_SERVER['SERVER_NAME'];
        
        $exitCode = Artisan::call('config:cache');
        $exitCode = Artisan::call('config:clear');
        $exitCode = Artisan::call('cache:clear');
        $exitCode = Artisan::call('view:clear');
        $exitCode = Artisan::call('route:clear');
        // $exitCode = Artisan::call('clear-compiled');
        return 'DONE'; 
      });




Route::get('/', function () {
    // return view('admin.home.index');
    // return view('admin.home.index');
    // return view('frontend.master');
});

Route::get('/',[IndexController::class,'index'])
->name('frontend.index');
Route::get('/page/{slug}',[IndexController::class,'sitePage'])
->name('frontend.page');



// Route::get('/page/author-guidelines',[IndexController::class,'authorGuidelines'])
// ->name('frontend.author-guidelines');
// Route::get('/page/guidelines-for-reviewers',[IndexController::class,'guidelinesForReviewers'])
// ->name('frontend.guidelines-for-reviewers');

// journal route
Route::get('/current-issues',[IndexController::class,'journalCurrentIssue'])
->name('frontend.journal.current-issues');

Route::get('/issues/{id}/view',[IndexController::class,'journalIssue'])
->name('frontend.journal.issues');
Route::get('/issues/{id}/keyword',[IndexController::class,'journalKeyword'])
->name('frontend.journal.keyword');

Route::get('/view/{id}/article',[IndexController::class,'journalViewArticle'])
->name('frontend.journal.article');

Route::get('/download/{id}/file',[IndexController::class,'journalDownloadFile'])
->name('frontend.journal.download-file');
Route::get('/view/{id}/file',[IndexController::class,'journalViewFile'])
->name('frontend.journal.view-file');

Route::get('/all-issues',[IndexController::class,'journalAllIssues'])
->name('frontend.journal.all-issues');

Route::get('/editorial-team',[IndexController::class,'journaEditorialTeam'])
->name('frontend.journal.editorial-team');

Route::group(['as' => 'member.','prefix'=>'member'], function(){
    

   Route::get('/forget-password',[AuthorizationController::class, 'forgetPassword'])->name('forget.password');
   
   Route::post('/forget-password',[AuthorizationController::class, 'sendResetPasswordMail']);

   Route::get('/reset-password/{url}',[AuthorizationController::class, 'resetPasswordForm'])->name('reset.password');
   
    Route::post('/reset-password',[AuthorizationController::class, 'resetPassword'])->name('update.reset.password');
    
    

    Route::get('/login',[AuthorizationController::class, 'memberLoginForm'])->name('login.form');


    Route::get('/register',[AuthorizationController::class, 'memberRegisterForm'])->name('register.form');
    Route::post('/register',[AuthorizationController::class, 'memberRegister']);



});


    
Route::group(['as' => 'member.', 'prefix' => 'member','middleware'=>['auth']], function () {
    Route::get('/verify-mail',[MemberController::class, 'verifyMailForm'])->name('verify.mail');
    Route::post('/verify-mail',[MemberController::class, 'verifyMail']);
    Route::get('/send/verification-code',[MemberController::class, 'sendMailVerificationCode'])
              ->name('send.verification-code');

}); 
Route::group(['as' => 'member.', 'prefix' => 'member','middleware'=>['auth','member']], function () {
    
    Route::get('/',[MemberController::class, 'index'])->name('index');

    Route::get('/update-profile',[MemberController::class, 'updateProfileForm'])->name('update.profile');
    Route::post('/update-profile',[MemberController::class, 'updateProfile']);

    
    Route::get('/update-password',[MemberController::class, 'updatePasswordForm'])->name('update.password');
    Route::post('/update-password',[MemberController::class, 'updatePassword']);

    Route::get('/submit-manuscript',[MemberController::class, 'submitManuscriptForm'])->name('submit.manuscript');
    Route::post('/submit-manuscript',[MemberController::class, 'submitManuscript']);
    
    Route::get('/my-manuscript',[MemberController::class, 'myManuscript'])->name('my.manuscript');
    Route::get('/{id}/view-manuscript',[MemberController::class, 'viewManuscript'])->name('view.manuscript');
    
    Route::post('/send/mail',[MemberController::class, 'sendMail'])
    ->name('send.mail');
  

   

    Route::get('/update/primary/mail',[MemberController::class, 'updatePrimaryEmailForm'])
             ->name('update.primary.mail');
    Route::post('/update/primary/mail',[MemberController::class, 'updatePrimaryEmail']);
   
  });


Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth','admin']], function(){

    // Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('profile.edit');
    // Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
   
    Route::get('/profile/update/password', [ProfileController::class, 'editPassword'])->name('profile.update.password');
    Route::post('/profile/update/password', [ProfileController::class, 'updatePassword']);
   
});

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth','admin']], function(){
  
    Route::get('/dashboard', function () {
        return view('admin.home.index');
    })->name('dashboard');
  
    
    Route::resource('/category',CategoryController::class);

    Route::resource('/site-page',SitePageController::class);

    Route::resource('/journal-year',JournalYearController::class);
    Route::resource('/journal-volume',JournalVolumeController::class);
    Route::resource('/journal-issue',JournalIssueController::class);
    Route::resource('/journal-article',JournalArticleController::class);
    Route::get('/journal-article/{id}/index',[JournalArticleController::class,'index'])
            ->name('journal-article.index');
    Route::get('/journal-article/{id}/show',[JournalArticleController::class,'show'])
    ->name('journal-article.show');
    Route::get('/journal-article/{id}/create',[JournalArticleController::class,'create'])
            ->name('journal-article.create');
    Route::put('/journal-article/{id}/store',[JournalArticleController::class,'store'])
            ->name('journal-article.store');   
    Route::get('/journal-article/{id}/edit',[JournalArticleController::class,'edit'])
            ->name('journal-article.edit');   
    Route::put('/journal-article/{id}/update',[JournalArticleController::class,'update'])
            ->name('journal-article.update'); 


    Route::resource('/board-member',BoardMemberController::class);

    Route::get('/manage-author',[ManageAuthorController::class,'index'])
                                ->name('manage-author.index');

    Route::get('/manage-manuscript',[ManageManuscriptController::class,'index'])
                                ->name('manage-manuscript.index');
    Route::get('/manage-manuscript/{id}/view',[ManageManuscriptController::class,'viewManuscript'])
                                ->name('manage-manuscript.view');
    Route::post('/manage-manuscript/send-mail',[ManageManuscriptController::class,'sendMail'])
                                ->name('manage-manuscript.send-mail');
        // ManageManuscriptController;


    Route::resource('/role',RoleController::class);
    Route::resource('/permission',PermissionController::class);

    Route::resource('/user',UserController::class);
    Route::put('/user/reset-password/{user}',[UserController::class,'resetPassword'])->name('user.reset.password');
    Route::put('/user/deactivate-account/{user}',[UserController::class,'deactivateAccount'])->name('user.deactivate.account');
    Route::put('/user/activate-account/{user}',[UserController::class,'activateAccount'])->name('user.activate.account');
    
    
    
    
    
        
    // Route::get(
    //     '/manage/order',
    //     [AdminManageOrderController::class, 'manageOrder']
    // )->name('manage.order');
    // Route::get('/', ['as' => 'index', 'uses' => 'AccountController@index']);
    // Route::get('connect', ['as' => 'connect', 'uses' = > 'AccountController@connect']);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });




require __DIR__.'/auth.php';
