<?php
use App\Http\Controllers\BrochureController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Page;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\AccessibilityController;
use App\Http\Controllers\FeedbackComplaintController;
use App\Http\Controllers\NdisController;
use App\Http\Controllers\HomecareController;
// Contact Page Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/{slug}', function ($slug) {
//     $page = Page::where('slug', $slug)->firstOrFail();
//     return view('page', ['page' => $page]);
// });


Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/aboutpage', [AboutController::class, 'index'])->name('aboutpage');

Route::get('/ndis', [NdisController::class, 'index'])->name('ndis');
Route::get('/homecareservices', [HomecareController::class, 'index'])->name('homecare');



Route::get('/resource', [ResourceController::class, 'index'])->name('resource');


Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');


// Route::get('/download-brochure', [BrochureController::class, 'showForm'])->name('brochure.form');
// Route::post('/download-brochure', [BrochureController::class, 'submitForm'])->name('brochure.submit');
// Route::post('/download-brochure', [BrochureController::class, 'download'])->name('brochure.download');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


// Booking Routes
Route::get('/support-at-home-enquiry', [BookingController::class, 'showForm'])->name('booking.form');
Route::get('/thank-you-support-at-home', function () {
    return view('booking.thank-you');
})->name('booking.thank-you');
Route::post('/submit-booking', [BookingController::class, 'submitForm'])->name('booking.submit');

Route::get('/careers', [CareerController::class, 'index'])->name('careers');
Route::get('/careers/thank-you', [CareerController::class, 'thankYou'])->name('careers.thank-you');
Route::post('/careers/submit', [CareerController::class, 'submitApplication'])->name('careers.submit');

Route::get('/privacy', [PrivacyController::class,'index'])->name('privacy');
Route::get('/terms', [TermsController::class,'index'])->name('terms');
Route::get('/accessibility', [AccessibilityController::class,'index'])->name('accessibility');

Route::post('/submit-feedback', [FeedbackComplaintController::class, 'store'])->name('feedback.store');
Route::post('/download-brochure', [BrochureController::class, 'download'])->name('brochure.download');


// Route::get('/brochure', [BrochureController::class, 'showForm'])->name('brochure.form');
// Route::post('/download-brochure', [BrochureController::class, 'download'])->name('brochure.download');


Route::post('/download-brochure', [BrochureController::class, 'download'])->name('brochure.download');
Route::get('/download-brochure', [BrochureController::class, 'showForm'])->name('brochure.form');
Route::get('/pricingform', [BrochureController::class, 'pricingForm'])->name('brochure.pricingform');

Route::get('/ndisform', [BrochureController::class, 'ndisForm'])->name('brochure.ndisform');

Route::post('/pricingform', [BrochureController::class, 'submit'])->name('brochure.pricingform');



Route::get('/test-brochure', function() {
    $path = 'brochures/allegiance-care-brochure.pdf';
    if (Storage::disk('public')->exists($path)) {
        return response()->file(storage_path('app/public/' . $path));
    }
    abort(404, 'File not found at: ' . storage_path('app/public/' . $path));
});



require __DIR__.'/auth.php';
