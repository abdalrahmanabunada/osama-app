<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\ExportExcelController;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\ClientHomeController;

use App\Http\Controllers\AuthClient\AuthClientController;

use App\Http\Controllers\Client\ProfileController;

use App\Http\Controllers\Client\ApplicationController;

use App\Http\Controllers\Client\BeneficiaryController;

use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Admin\ArticleController;
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

Route::get('/', [AuthClientController::class, 'index'])->name('client.login');


Auth::routes();

Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');


Route::get('/user/create', [UserController::class, 'create'])->name('user-create');

Route::post('/user/create', [UserController::class, 'store'])->name('user-store');

Route::get('/user/view', [UserController::class, 'view'])->name('user-view');

Route::get('/user/get-data', [UserController::class, 'user_get_data'])->name('user-get-data');

Route::get('/user/permission/{id?}', [UserController::class, 'user_permission'])->name('user-permission');

Route::post('/user/permission', [UserController::class, 'user_permission_store'])->name('user-permission-store');

Route::post('/user/active', [UserController::class, 'user_active'])->name('user-active');

Route::get('/user/update/{id?}', [UserController::class, 'user_update'])->name('user-update');

Route::post('/user/update', [UserController::class, 'user_update_store'])->name('user-update-store');

Route::get('/user/role/{id?}', [UserController::class, 'user_role_view'])->name('user_role_view');

Route::post('/user/role', [UserController::class, 'user_role_store'])->name('user-role-store');




Route::get('/role/view', [RoleController::class, 'view'])->name('role-view');

Route::get('/role/get-data', [RoleController::class, 'role_get_data'])->name('role-get-data');

Route::get('/role/permission/{id?}', [RoleController::class, 'role_permission'])->name('role-permission');

Route::post('/role/permission', [RoleController::class, 'role_permission_store'])->name('role-permission-store');



Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('/admin/post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('/admin/no-access', [HomeController::class, 'no_access'])->name('admin-no-access');




Route::get('/client/home2', [ProfileController::class, 'index2'])->name('client.home2');

Route::get('/client/home', [ClientHomeController::class, 'index'])->name('client.home');

Route::get('/client/profile', [ProfileController::class, 'index'])->name('client.profile');
Route::post('/client/profile', [ProfileController::class, 'store'])->name('client.profile');


Route::get('/client/application/add', [ApplicationController::class, 'index'])->name('client.application.add');
Route::post('/client/application/add', [ApplicationController::class, 'store'])->name('client.application.add');

Route::get('/client/application/view', [ApplicationController::class, 'view'])->name('application.view');
Route::get('/client/application/view/ajax', [ApplicationController::class, 'ajax'])->name('application.view.ajax');

Route::get('/client/application/pdf/page4/{id?}', [ApplicationController::class, 'page4'])->name('application.pdf.page4');



Route::get('clientlogin', [AuthClientController::class, 'index'])->name('client.login');
Route::post('clientpostlogin', [AuthClientController::class, 'postLogin'])->name('client.login.post'); 
Route::get('/client/logout', [AuthClientController::class, 'logout'])->name('client.logout');
Route::get('clientsignup', [AuthClientController::class, 'signup'])->name('client.signup');
Route::post('client-post-signup', [AuthClientController::class, 'postSignup'])->name('client.signup.post');
Route::get('/client/no-access', [ClientHomeController::class, 'no_access'])->name('client-no-access');

Route::get('account/verify/{token}', [AuthClientController::class, 'verifyAccount'])->name('client.verify'); 




Route::get('/excel', [ExportExcelController::class, 'excel'])->name('excel');


Route::get('/client/beneficiary', [BeneficiaryController::class, 'upload'])->name('client.beneficiary');
Route::post('/beneficiary/upload', [BeneficiaryController::class, 'postUploadCsv'])->name('client.beneficiary.upload');

Route::get('/client/beneficiary/upload/edit', [BeneficiaryController::class, 'uploadEdit'])->name('client.beneficiary.upload.edit');
Route::post('/client/beneficiary/upload/edit', [BeneficiaryController::class, 'postUploadEditCsv'])->name('client.beneficiary.upload.edit');

Route::get('/client/beneficiary/upload/download', [BeneficiaryController::class, 'getDownload'])->name('client.beneficiary.upload.download');
Route::get('/client/beneficiary/upload/download2', [BeneficiaryController::class, 'getDownload2'])->name('client.beneficiary.upload.download2');
Route::get('/client/beneficiary/upload/download3', [BeneficiaryController::class, 'getDownload3'])->name('client.beneficiary.upload.download3');

Route::get('/client/beneficiary/export', [BeneficiaryController::class, 'export'])->name('client.beneficiary.export');

Route::get('/client/beneficiary/view', [BeneficiaryController::class, 'view'])->name('beneficiary.view');
Route::get('/client/beneficiary/view/ajax', [BeneficiaryController::class, 'ajax'])->name('beneficiary.view.ajax');

Route::get('/client/beneficiary/create', [BeneficiaryController::class, 'create'])->name('client.beneficiary.create');
Route::post('/client/beneficiary/create', [BeneficiaryController::class, 'createPost'])->name('client.beneficiary.create');

Route::get('/client/beneficiary/edit/{id?}', [BeneficiaryController::class, 'edit'])->name('client.beneficiary.edit');
Route::post('/client/beneficiary/edit/{id?}', [BeneficiaryController::class, 'editPost'])->name('client.beneficiary.edit');

Route::get('/client/beneficiary/postCheckViewCsv', [BeneficiaryController::class, 'postCheckViewCsv'])->name('client.beneficiary.postCheckViewCsv');
Route::post('/client/beneficiary/postCheckCsv', [BeneficiaryController::class, 'postCheckCsv'])->name('client.beneficiary.postCheckCsv');


Route::get('/client/beneficiary/view/typeahead', [BeneficiaryController::class, 'typeahead'])->name('client.beneficiary.view.typeahead');

Route::get('/report', [ClientHomeController::class, 'report'])->name('report');

Route::get('/pdf', [ClientHomeController::class, 'pdf'])->name('pdf');

Route::get('/pdf2', [ClientHomeController::class, 'pdf2'])->name('pdf');

Route::get('/user/testpdf', [UserController::class, 'test_pdf'])->name('user-test-pdf');

Route::get('/pdf/{id}', [ClientHomeController::class, 'pdf4'])->name('pdf4');




Route::get('/admin/category/add', [CategoryController::class, 'add'])->name('admin.category.add');
Route::post('/admin/category/add', [CategoryController::class, 'addpost'])->name('admin.category.add');

Route::get('/admin/category/edit/{id?}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('/admin/category/edit/{id?}', [CategoryController::class, 'editpost'])->name('admin.category.edit');

Route::get('/admin/category/index', [CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/category/index/ajax', [CategoryController::class, 'ajax'])->name('admin.category.index.ajax');

Route::post('/admin/category/active', [CategoryController::class, 'cat_active'])->name('cat-active');




Route::get('/admin/article/add', [ArticleController::class, 'add'])->name('admin.article.add');
Route::post('/admin/article/add', [ArticleController::class, 'addpost'])->name('admin.article.add');

Route::get('/admin/article/edit/{id?}', [ArticleController::class, 'edit'])->name('admin.article.edit');
Route::post('/admin/article/edit/{id?}', [ArticleController::class, 'editpost'])->name('admin.article.edit');

Route::get('/admin/article/index', [ArticleController::class, 'index'])->name('admin.article.index');
Route::get('/admin/article/index/ajax', [ArticleController::class, 'ajax'])->name('admin.article.index.ajax');

Route::post('/admin/article/active', [ArticleController::class, 'tbl_active'])->name('art-active');
Route::get('/admin/article/getimg/{id?}', [ArticleController::class, 'getimg'])->name('admin.article.getimg');








