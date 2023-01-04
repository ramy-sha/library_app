<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;



Route::get('/index',[IndexController::class , 'getIndex'])->name('index');

Route::post('book/store',[IndexController::class,'postBook'])->name('post_book');

Route::get('book/delete/{id}',[IndexController::class,'bookDelete'])->name('book_delete');

Route::get('book/edit/{id}',[IndexController::class,'getBookEdit'])->name('get_book_edit');

Route::post('book/edit',[IndexController::class,'postBookEdit'])->name('post_book_edit');
