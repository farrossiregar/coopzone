<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;

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

Route::get('/', Home::class)->name('home')->middleware('auth');
Route::get('privacy', App\Http\Livewire\Privacy::class)->name('privacy');
Route::get('login', App\Http\Livewire\Login::class)->name('login');
Route::get('register', App\Http\Livewire\Register::class)->name('register');


Route::get('testemail',function(){

    \Mail::to('doni.enginer@gmail.com')->send(new \App\Mail\GeneralEmail("[YS SANTA MARIA] - Pendaftaran Anggota",'Test2'));   

});


Route::get('linksakti',function(){
    \Auth::loginUsingId(4);

    return 'test';
});

Route::get('generate',function(){
    $user_member = \App\Models\UserMember::whereNull('no_anggota_platinum')->get();
    $num = 1;
    foreach($user_member as $item){
        $no_anggota = "NA".str_pad($num,5, '0', STR_PAD_LEFT);
        $item->no_anggota_platinum = $no_anggota;
        $item->save();

        $user = \App\Models\User::find($item->user_id);
        $user->username = $no_anggota;
        $user->save();
        $num++;
    }
});

// All login
Route::group(['middleware' => ['auth']], function(){    
    Route::get('profile',App\Http\Livewire\Profile::class)->name('profile');
    Route::get('back-to-admin',[App\Http\Controllers\IndexController::class,'backtoadmin'])->name('back-to-admin');
});
Route::get('user-member/print-member/{id}',[\App\Http\Controllers\UserMemberController::class,'printMember'])->name('user-member.print-member');
Route::get('user-member/print-iuran/{id}/{tahun}',[\App\Http\Controllers\UserMemberController::class,'printIuran'])->name('user-member.print-iuran');
Route::post('ajax/get-member', [\App\Http\Controllers\AjaxController::class,'getMember'])->name('ajax.get-member');   

// Administrator
Route::group(['middleware' => ['auth','access:1,5']], function(){    
    Route::get('setting',App\Http\Livewire\Setting::class)->name('setting');
    Route::get('users/insert',App\Http\Livewire\User\Insert::class)->name('users.insert');
    Route::get('user-access', App\Http\Livewire\UserAccess\Index::class)->name('user-access.index');
    Route::get('user-access/insert', App\Http\Livewire\UserAccess\Insert::class)->name('user-access.insert');
    Route::get('users',App\Http\Livewire\User\Index::class)->name('users.index');
    Route::get('users/edit/{id}',App\Http\Livewire\User\Edit::class)->name('users.edit');
    Route::post('users/autologin/{id}',[App\Http\Livewire\User\Index::class,'autologin'])->name('users.autologin');
    Route::get('module',App\Http\Livewire\Module\Index::class)->name('module.index');
    Route::get('module/insert',App\Http\Livewire\Module\Insert::class)->name('module.insert');
    Route::get('module/edit/{id}',App\Http\Livewire\Module\Edit::class)->name('module.edit');
    Route::get('user-member', App\Http\Livewire\UserMember\Index::class)->name('user-member.index');
    Route::get('user-member/insert', App\Http\Livewire\UserMember\Insert::class)->name('user-member.insert');
    Route::get('user-member/edit/{id}',App\Http\Livewire\UserMember\Edit::class)->name('user-member.edit');
    Route::get('user-member/approval/{id}',App\Http\Livewire\UserMember\Approval::class)->name('user-member.approval');
    Route::get('user-member/proses/{id}',App\Http\Livewire\UserMember\Proses::class)->name('user-member.proses');
    Route::get('user-member/klaim/{id}',App\Http\Livewire\UserMember\Klaim::class)->name('user-member.klaim');
 
    Route::get('migration',App\Http\Livewire\Migration\Index::class)->name('migration.index');

    Route::get('sapphire/iuran/index',App\Http\Livewire\Sapphire\Iuran\Index::class)->name('sapphire.iuran.index');


    Route::get('stock-photo', App\Http\Livewire\StockPhoto\Index::class)->name('stock-photo.index');
    Route::get('stock-photo/insert', App\Http\Livewire\StockPhoto\Insert::class)->name('stock-photo.insert');

    Route::get('category-subcategory', App\Http\Livewire\CategorySubcategory\Index::class)->name('category-subcategory.index');
    Route::get('category/insert', App\Http\Livewire\CategorySubcategory\InsertCategory::class)->name('category.insert');
    Route::get('subcategory/insert', App\Http\Livewire\CategorySubcategory\InsertSubcategory::class)->name('subcategory.insert');

    Route::get('work-order', App\Http\Livewire\WorkOrder\Index::class)->name('work-order.index');
});
