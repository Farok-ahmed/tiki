<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TicketController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/trip',[TripController::class,'index'])->name('trip.index');

// Define routes for TripController
Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
Route::get('/trips/create', [TripController::class, 'create'])->name('trips.create');
Route::post('/trips', [TripController::class, 'store'])->name('trips.store');
Route::get('/show/{id}', [TripController::class, 'show'])->name('trips.show');

// Define routes for TicketController
Route::get('/trips/{trip}/seats', [TicketController::class, 'showAvailableSeats'])->name('tickets.show');
Route::post('/trips/{trip}/book', [TicketController::class, 'bookTicket'])->name('tickets.book');
//Route::post('/trips/checkAvailability', [TripController::class, 'checkAvailability'])->name('trips.checkAvailability');

// Route::get('/ticket/{trip}/seats', [TicketController::class, 'showAvailableSeats'])->name('tickets.show');
// Route::post('/ticket/{trip}/book', [TicketController::class, 'bookTicket'])->name('tickets.book');
Route::get('/tickets/showAvailableSeats', [TicketController::class, 'showAvailableSeats'])->name('tickets.showAvailableSeats');
//Route::get('/tickets/checkAvailability', [TicketController::class, 'checkAvailability'])->name('tickets.checkAvailability');
Route::post('/tickets/checkAvailability', [TicketController::class, 'checkAvailability'])->name('tickets.checkAvailability');

