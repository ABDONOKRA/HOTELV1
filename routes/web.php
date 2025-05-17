<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// Admin routes
Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index')->middleware(['auth','admin']);

Route::get('/create_room' ,[AdminController::class,'create_room'])->middleware(['auth','admin']);
Route::post('/add_room' ,[AdminController::class,'add_room'])->middleware(['auth','admin']);
Route::get('/view_room' ,[AdminController::class,'view_room'])->middleware(['auth','admin']);
Route::get('/room_delete/{id}' ,[AdminController::class,'room_delete'])->middleware(['auth','admin']);
Route::get('/room_update/{id}' ,[AdminController::class,'room_update'])->middleware(['auth','admin']);
Route::post('/edit_room/{id}' ,[AdminController::class,'edit_room'])->middleware(['auth','admin']);

// Activities and Spa Management Routes
Route::get('/create_activity', [AdminController::class, 'create_activity'])->middleware(['auth','admin']);
Route::post('/store_activity', [AdminController::class, 'store_activity'])->middleware(['auth','admin']);
Route::get('/view_activities', [AdminController::class, 'view_activities'])->middleware(['auth','admin']);
Route::get('/edit_activity/{id}', [AdminController::class, 'edit_activity'])->middleware(['auth','admin']);
Route::post('/update_activity/{id}', [AdminController::class, 'update_activity'])->middleware(['auth','admin']);
Route::get('/delete_activity/{id}', [AdminController::class, 'delete_activity'])->middleware(['auth','admin']);

// Activity and Spa Bookings
Route::get('/activity_bookings', [AdminController::class, 'view_activity_bookings'])->middleware(['auth','admin']);
Route::get('/spa_bookings', [AdminController::class, 'view_spa_bookings'])->middleware(['auth','admin']);
Route::get('/confirm_activity_booking/{id}', [AdminController::class, 'confirm_activity_booking'])->middleware(['auth','admin']);
Route::get('/cancel_activity_booking/{id}', [AdminController::class, 'cancel_activity_booking'])->middleware(['auth','admin']);
Route::get('/confirm_spa_booking/{id}', [AdminController::class, 'confirm_spa_booking'])->middleware(['auth','admin']);
Route::get('/cancel_spa_booking/{id}', [AdminController::class, 'cancel_spa_booking'])->middleware(['auth','admin']);

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
Route::get('/my_reservations' ,[HomeController::class,'my_reservations'])->name('home.my_reservations');
Route::get('/hotels_services', [HomeController::class, 'hotels_services'])->name('home.hotels_services');

// Public Activity and Spa routes
Route::get('/activity/{id}', [HomeController::class, 'activity_details'])->name('activity.details');
Route::get('/spa/{id}', [HomeController::class, 'spa_details'])->name('spa.details');
Route::post('/activity/book/{id}', [HomeController::class, 'book_activity'])->name('activity.book');
Route::post('/spa/book/{id}', [HomeController::class, 'book_spa'])->name('spa.book');
