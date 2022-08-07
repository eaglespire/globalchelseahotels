<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\BulkEmailController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GuestController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\InboxMessageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Models\Gallery;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('theme:admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/global', 'auth.login')->name('login');
        Route::post('/login', [AuthController::class, 'store'])->name('login');
        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
            ->middleware('guest')
            ->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
            ->middleware('guest')
            ->name('password.email');
        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
            ->middleware('guest')
            ->name('password.reset');

        Route::post('/reset-password', [NewPasswordController::class, 'store'])
            ->middleware('guest')
            ->name('password.update');
        Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->middleware('auth')
            ->name('verification.notice');

        Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['auth', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware(['auth', 'throttle:6,1'])
            ->name('verification.send');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/guests', [GuestController::class, 'index'])->name('guest');
        Route::get('/guests/{guest}', [GuestController::class, 'show'])->name('guest.show');
        Route::get('/bookings', [BookingController::class, 'index'])->name('booking');
        Route::get('/bookings/create', [BookingController::class, 'create'])->name('booking.create');
        Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('booking.show');
        Route::post('/bookings', [BookingController::class, 'store'])->name('booking.store');
        Route::get('/rooms', [RoomController::class, 'index'])->name('room');
        Route::get('/rooms/create', [RoomController::class, 'create'])->name('room.create');
        Route::post('/rooms', [RoomController::class, 'store'])->name('room.store');
        Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('room.show');
        Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('room.edit');
        Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('room.update');
        Route::get('/posts', [PostController::class, 'index'])->name('posts');
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::post('/posts/', [PostController::class, 'store'])->name('posts.store');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::get('/about-us', 'App\Http\Livewire\Admin\AboutPage')->name('about-us');
        Route::get('/about-us/edit', 'App\Http\Livewire\Admin\EditAboutUs')->name('edit-about-us');
        Route::post('/about-us', [AboutUsController::class, 'store'])->name('about.store');
        Route::get('/bulk-email', [BulkEmailController::class, 'index'])->name('bulk-email');
        Route::post('/bulk-email', [BulkEmailController::class, 'store'])->name('bulk-email.store');
        Route::get('/newsletter', [NewsletterController::class, 'index'])->name('newsletter');
        Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
        Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonial.create');
        Route::get('/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
        Route::get('/testimonials/{testimonial}', [TestimonialController::class, 'show'])->name('testimonial.show');
        Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonial.store');
        Route::put('/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('testimonial.update');
        Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
        Route::get('/inbox-message', [InboxMessageController::class, 'index'])->name('inbox');
        Route::get('/inbox-message/{inbox}', [InboxMessageController::class, 'show'])->name('inbox.show');
        Route::get('/inbox-message/send/{inbox}', [InboxMessageController::class, 'create'])->name('inbox.create');
        Route::post('/inbox-message', [InboxMessageController::class, 'store'])->name('inbox.store');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    });
});