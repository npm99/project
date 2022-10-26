<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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

/* Route::get('/', function () {
  return view('welcome');
  }); */
// Auth::routes();
Route::get('get_test', 'PageController@get_test');

Route::group(['middleware' => 'usersession'], function () {

  Route::get('showfile/{id}', function ($id) {
    return Storage::response('fileTQF/' . $id);
  });

  Route::get('get_table_user3/{id}', 'PageController@get_table_user3');
  Route::get('get_table_user5/{id}', 'PageController@get_table_user5');

  Route::get('delete_fac/{id}', 'BlogController@delete_fac');
  Route::get('delete_ban/{id}', 'BlogController@delete_ban');
  Route::get('delete_year/{id}', 'BlogController@delete_year');
  Route::get('delete_sub/{id}', 'BlogController@delete_sub');
  Route::get('delete_course/{id}', 'BlogController@delete_course');
  Route::get('delete_group_sub/{id}', 'BlogController@delete_group_sub');
  Route::get('delete_news/{id}', 'BlogController@delete_news');
  Route::get('delete_user/{id}', 'BlogController@delete_user');
  Route::post('upload_photo', 'BlogController@upload_pic');

  Route::post('addcourse_tqf3', 'TQF3Controller@addcourse');
  Route::post('addcourse_tqf5', 'TQF5Controller@addcourse');
  Route::post('get_data_tqf3', 'TQF3Controller@get_tqf3');
  Route::post('get_data_tqf5', 'TQF5Controller@get_tqf5');
  Route::post('upfile_tqf3', 'TQF3Controller@upfile');
  Route::post('upfile_tqf5', 'TQF5Controller@upfile');
  Route::get('check_copytqf3/{id?}', 'TQF3Controller@check_copy_tqf3');
  Route::get('check_copytqf5/{id?}', 'TQF5Controller@check_copy_tqf5');
  Route::get('copy_tqf3/{from?}/{to?}', 'TQF3Controller@copy_tqf3');
  Route::get('copy_tqf5/{from?}/{to?}', 'TQF5Controller@copy_tqf5');
  Route::post('add_document', 'BlogController@add_document')->name('add_document');

  Route::post('add_groupcourse', 'BlogController@add_group_course');
  Route::post('del_groupcourse', 'BlogController@del_group_course');
  Route::post('addcourse', 'BlogController@addcourse');
  Route::post('addfac', 'BlogController@addfac');
  Route::post('addgroup', 'BlogController@addgroup');
  Route::post('addterm', 'BlogController@addterm');
  Route::post('addbench', 'BlogController@addbench');
  Route::post('addnews', 'BlogController@addnews');
  Route::post('/edit', 'BlogController@editdata');
  Route::post('tqf/addtqf3', 'TQF3Controller@addtqf3');
  Route::post('tqf/addtqf5', 'TQF5Controller@addtqf5');
  Route::post('tqf/addtqf3_new', 'TQF3Controller@addtqf3_new');
  Route::post('tqf/addtqf5_new', 'TQF5Controller@addtqf5_new');
  Route::post('tqf/edittqf3_new', 'TQF3Controller@edittqf3_new');
  Route::post('tqf/edittqf5_new', 'TQF5Controller@edittqf5_new');
  Route::post('tqf3/addtqf3', 'TQF3Controller@addtqf3');
  Route::post('tqf5/addtqf5', 'TQF5Controller@addtqf5');
  Route::post('addfasttqf3', 'TQF3Controller@add_fast_tqf3');
  Route::post('addfasttqf5', 'TQF5Controller@add_fast_tqf5');
  Route::post('deletetqf3', 'TQF3Controller@deletetqf3');
  Route::post('deletetqf5', 'TQF5Controller@deletetqf5');
  Route::post('addsub', 'BlogController@addsub');
  Route::post('tqf3', 'PageController@tqf3');
  Route::post('tqf5', 'PageController@tqf5');
  Route::post('add/filetqf', 'PageController@addfiletqf');
  Route::post('import', 'BlogController@import');
  Route::get('export/tqf3/{year?}/{sub?}', 'BlogController@export_tqf3');
  Route::get('export/tqf5/{year?}/{sub?}', 'BlogController@export_tqf5');

  Route::post('/addtqf3_1', 'TQF3Controller@addtqf3_1');
  Route::post('/addtqf3_2', 'TQF3Controller@addtqf3_2');
  Route::post('/addtqf3_3', 'TQF3Controller@addtqf3_3');
  Route::post('/addtqf3_4', 'TQF3Controller@addtqf3_4');
  Route::post('/addtqf3_5', 'TQF3Controller@addtqf3_5');
  // Route::post('/addtqf3_4', 'TQF3Controller@addtqf3_4');
  Route::post('/addtqf3_6', 'TQF3Controller@addtqf3_6');
  Route::post('/addtqf3_7', 'TQF3Controller@addtqf3_7');

  Route::post('/addtqf5_1', 'TQF5Controller@addtqf5_1');
  Route::post('/addtqf5_2', 'TQF5Controller@addtqf5_2');
  Route::post('/addtqf5_2_1', 'TQF5Controller@addtqf5_2_1');
  Route::post('/addtqf5_2_2', 'TQF5Controller@addtqf5_2_2');
  Route::post('/addtqf5_3', 'TQF5Controller@addtqf5_3');
  Route::post('/addtqf5_3_1', 'TQF5Controller@addtqf5_3_1');
  Route::post('/addtqf5_4', 'TQF5Controller@addtqf5_4');
  Route::post('/addtqf5_5', 'TQF5Controller@addtqf5_5');
  Route::post('/addtqf5_6', 'TQF5Controller@addtqf5_6');

  Route::post('tqf/addtqf3/check_save/{id}', 'TQF3Controller@check_save');
  Route::post('tqf/addtqf5/check_save/{id}', 'TQF5Controller@check_save');

  // Route::get('officer', 'PageController@officer');
  // Route::get('teacher', 'PageController@teacher');
  Route::get('tqf', 'PageController@tqf');
  Route::get('report', 'PageController@report');
  Route::post('report', 'PageController@report');

  Route::get('tqf/course3', "PageController@course3");
  Route::get('tqf/course5', "PageController@course5");
  Route::post('tqf/course3', "PageController@course3");
  Route::post('tqf/course5', "PageController@course5");

  Route::get('users/comfirm', 'LoginController@formLogin');;
  Route::get('downloadtqf', 'PageController@downloadtqf');
  Route::get('add/filetqf', 'PageController@addfiletqf');
  Route::get('tqf3', 'PageController@tqf3');
  Route::get('tqf5', 'PageController@tqf5');
  Route::get('user', 'PageController@user');
  Route::get('term', 'PageController@addterm');
  Route::get('faculty', 'PageController@addfac');
  Route::get('branch', 'PageController@addben');
  Route::get('subject', 'PageController@addsub');
  Route::get('group_subject', 'PageController@addgroup');
  Route::get('course', 'PageController@addcourse');
  Route::get('tqf/addfastqf3', 'PageController@add_many_tqf3');
  Route::get('tqf/addfastqf5', 'PageController@add_many_tqf5');
  Route::get('tqf/addtqf3', 'PageController@addtqf3');
  Route::get('tqf/addtqf5', 'PageController@addtqf5');
  Route::get('tqf/addtqf3/{id}', 'PageController@showtqf3')->name('tqf3.show');
  Route::get('tqf/addtqf5/{id}', 'PageController@showtqf5')->name('tqf5.show');
  Route::post('tqf/addtqf3/{id}', 'PageController@copytqf3');
  Route::post('tqf/addtqf5/{id}', 'PageController@copytqf5');
  Route::get('filetqf3/{id}', 'PageController@check_form_tqf3');
  Route::get('filetqf5/{id}', 'PageController@check_form_tqf5');
  Route::get('checktqf3', 'PageController@checktqf3');
  Route::get('checktqf5', 'PageController@checktqf5');
  Route::get('edittqf3', 'PageController@edittqf3');
  Route::post('edittqf3', 'PageController@edittqf3');
  Route::get('edittqf5', 'PageController@edittqf5');
  Route::get('news', 'PageController@news');
  Route::get('tqf/downloadtqf3', 'PageController@download_tqf3');
  Route::get('tqf/downloadtqf5', 'PageController@download_tqf5');
  Route::post('tqf/downloadtqf3', 'PageController@download_tqf3');
  Route::post('tqf/downloadtqf5', 'PageController@download_tqf5');

  Route::post('update_status3', 'TQF3Controller@status');
  Route::post('update_status5', 'TQF5Controller@status');
  Route::post('check_update_status3', 'TQF3Controller@check_status');
  Route::post('check_update_status5', 'TQF5Controller@check_status');

  Route::get('get_all_term', 'PageController@get_all_term');
  Route::get('get_table_tqf3', 'PageController@get_table_tqf3');
  Route::get('get_table_tqf5', 'PageController@get_table_tqf5');
});

Route::post('fetch_branch', 'BlogController@fetchben');

Route::post('/adduser', 'BlogController@addUser');
Route::get('/', 'PageController@index')->name('index');
Route::get('document', 'PageController@document')->name('document');
Route::get('downloadtqf3', 'PageController@downloadtqf3');
Route::get('downloadtqf5', 'PageController@downloadtqf5');
// Route::get('create', 'DocumentController@create');
// Route::post('store', 'DocumentController@store');
Route::get('download/{fileID}', 'DocumentController@downloadfile');

Route::get('/login', function () {
  $url = env('SSO_Login');
  return redirect()->to($url);
  // Redirect::to($url);
})->name('login');
Route::get('/logout', function () {
  $url =  env('SSO_Logout');
  return redirect()->to($url);
  // Redirect::to($url); 
});

Route::get('eng-login/login', 'LoginController@login');
Route::get('eng-login/logout', 'LoginController@logout');
