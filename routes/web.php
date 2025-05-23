<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/' ,[AdminController::class,'home'])->name('homee');
Route::get('/home' ,[AdminController::class,'index'])->name('home');

Route::get('/create_room' ,[AdminController::class,'create_room'])->middleware(['auth','admin']);


Route::post('/add_room' ,[AdminController::class,'add_room'])->middleware(['auth','admin']);

Route::get('/view_room' ,[AdminController::class,'view_room'])->middleware(['auth','admin']);

Route::get('/room_delete/{id}' ,[AdminController::class,'room_delete'])->middleware(['auth','admin']);

Route::get('/room_update/{id}' ,[AdminController::class,'room_update'])->middleware(['auth','admin']);

Route::post('/edit_room/{id}' ,[AdminController::class,'edit_room'])->middleware(['auth','admin']);

Route::get('/room_details/{id}' ,[HomeController::class,'room_details']);

Route::post('/add_booking/{id}' ,[HomeController::class,'add_booking']);

Route::get('/bookings' ,[AdminController::class,'bookings'])->middleware(['auth','admin']);

Route::get('/delete_booking/{id}' ,[AdminController::class,'delete_booking'])->middleware(['auth','admin']);

Route::get('/approve_book/{id}' ,[AdminController::class,'approve_book'])->middleware(['auth','admin']);

Route::get('/reject_book/{id}' ,[AdminController::class,'reject_book'])->middleware(['auth','admin']);

Route::get('/view_gallary' ,[AdminController::class,'view_gallary'])->middleware(['auth','admin']);

Route::post('/upload_gallary' ,[AdminController::class,'upload_gallary'])->middleware(['auth','admin']);

Route::get('/delete_gallary/{id}' ,[AdminController::class,'delete_gallary'])->middleware(['auth','admin']);

Route::post('/contact' ,[HomeController::class,'contact']);

Route::get('/all_messages' ,[AdminController::class,'all_messages'])->middleware(['auth','admin']);

Route::get('/send_mail/{id}' ,[AdminController::class,'send_mail'])->middleware(['auth','admin']);

Route::post('/mail/{id}' ,[AdminController::class,'mail'])->middleware(['auth','admin']);

Route::get('/our_rooms' ,[HomeController::class,'our_rooms']);

Route::get('/hotel_gallary' ,[HomeController::class,'hotel_gallary']);

Route::get('/contact_us' ,[HomeController::class,'contact_us']);
 
