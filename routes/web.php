<?php

use App\Http\Controllers\Frontend\BookController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\InvoiceController;
use App\Http\Controllers\Frontend\NewsLetterController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RoomController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;



// Route::get('/', [ReportController::class, 'show']);
Route::get('/', [PageController::class, 'home'])->name('home');

Route::get( '/about-us', [PageController::class, 'about'])->name('about');
Route::get( '/contact-us', [PageController::class, 'contact'])->name('contact');
Route::post('/contact-us', [ PageController::class, 'contactStore'])->name('contact-us.store');
Route::get( '/services', [PageController::class, 'services'])->name('services');
Route::get('/gallery', [PageController::class, 'gallery'])->name( 'gallery');
Route::get('/feedback', [PageController::class, 'feedback'])->name( 'feedback');
Route::post('/feedback', [PageController::class, 'feedbackStore'])->name( 'feedback.store');
Route::get( '/frequently-asked-question', [PageController::class, 'faq'])->name('faq');
Route::get('/our-rooms', [PageController::class, 'roomIndex'])->name('rooms');
Route::get('/our-rooms/{room}', [PageController::class, 'roomShow'])->name('rooms.show');
Route::get('/posts', [PageController::class, 'postIndex'])->name('posts');
Route::get('/posts/{post}', [PageController::class, 'postShow'])->name('posts.show');
Route::get('/invoice/{bookingId}', [InvoiceController::class, 'index'])->name('invoice');
Route::post('/book', [BookController::class, 'store'])->name('book.store');
Route::post('/newsletter', [NewsLetterController::class, 'store'])->name('newsletter.store');
Route::group(['middleware' => 'session.exist'],  function() {
    
    Route::get('/book', [BookController::class, 'index'])->name('book');
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.book');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    // The page that displays the payment form

    // The route that the button calls to initialize payment
    Route::post('/pay', [PaymentController::class, 'initialize'])->name('pay');
    // The callback url after a payment
    Route::get('/rave/callback', [PaymentController::class, 'callback'])->name('callback');
});

Route::get('/artisan', function(){
    \Artisan::call("storage:link");
    return "success";
});


// require __DIR__.'/auth.php';
require __DIR__ . '/admin.php';