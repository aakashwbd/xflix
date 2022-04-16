<?php

    use App\Http\Controllers\SocialAuthTwitterController;
    use Illuminate\Support\Facades\Route;
use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::view('/', 'landing.home.index');
    Route::view('/member/view', 'landing.home.view');
    Route::view('/ads', 'landing.ads.index');
    Route::view('/live', 'landing.live.index');
    Route::view('/videos', 'landing.videos.index');
    Route::view('/maps', 'landing.maps.index');
    Route::view('/blogs', 'landing.blogs.index');
    Route::view('/inscription', 'landing.inscription.index');
    Route::view('/profile', 'landing.profile.index');
    Route::view('/information', 'landing.more_menu.index');
    Route::view('/graph', 'landing.graph.index');
    Route::view('/live', 'landing.live.index');

   Route::prefix('admin')->group(function(){
       Route::view('/', 'admin.home.index');
       Route::view('/category', 'admin.category.index');
       Route::view('/verification', 'admin.verification.index');
       Route::view('/manage-admin', 'admin.manage-admin.index');
       Route::view('/manage-users', 'admin.user.index');
       Route::view('/banned-users', 'admin.user.banned');
       Route::view('/settings', 'admin.setting.index');
       Route::view('/package', 'admin.package.index');
       Route::view('/invite-code', 'admin.invitation.index');
       Route::view('/recent-payment', 'admin.payment.index');
       Route::view('/notification', 'admin.notification.index');
       Route::view('/video', 'admin.video.index');

       Route::prefix('auth')->group(function(){
           Route::view('/login', 'admin.auth.login');
       });
   });

    Route::get('/auth/twitter', [SocialAuthTwitterController::class, 'redirect']);
    Route::get('/auth/callback/twitter', [SocialAuthTwitterController::class, 'callback']);

    Route::get('/streaming', 'App\Http\Controllers\WebrtcStreamingController@index');
    Route::get('/streaming/{streamId}', 'App\Http\Controllers\WebrtcStreamingController@consumer');
//Route::get('/', function () {
//    return view('welcome');
//});

Route::post('/send-message', function (Request $request){
//    dd($request->all());
    event(
    $data = new Message(
         $request->userid,
         $request->message,
     )
   );
   return[
       'success'=>true
   ];
});
