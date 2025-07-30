<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Controllers\FaqController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WorkCategoryController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FaviconController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontViewController;
use App\Http\Controllers\CoverImageController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\VisitorBookController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\VideoGalleryController;
use App\Http\Controllers\StudentDetailController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ClientMessageController;
use App\Http\Controllers\BlogPostsCategoryController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CeoMessageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WhyUsController;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Language switching
Route::get('/lang/{lang}', function ($lang) {
    $supportedLocales = config('app.available_locales');
    if (!in_array($lang, array_keys($supportedLocales))) {
        return redirect()->route('fronted.index');
    }
    app()->setLocale($lang);
    session()->put('locale', $lang);
    return redirect()->route('fronted.index');
});

// Frontend Routes
Route::get('/', [FrontViewController::class, 'index'])->name('index');
Route::get('/singleposts/{slug}', [FrontViewController::class, 'singlePost'])->name('SinglePost');
Route::post('/contactpage', [ContactController::class, 'store'])->name('Contact.store');

Route::prefix('/')->group(function () {
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/contactpage', [SingleController::class, 'render_contact'])->name('Contact');
    Route::get('/aboutus', [SingleController::class, 'render_about'])->name('About');
    Route::get('/whyus', [SingleController::class, 'render_whyus'])->name('whyus');
    Route::get('/testimonial', [SingleController::class, 'render_testimonial'])->name('Testimonial');
    Route::get('/blogpostcategories', [SingleController::class, 'render_blogpostcategory'])->name('Blogpostcategory');
    Route::get('/blog-category/{slug}', [SingleController::class, 'render_singleBlogpostcategory'])->name('SingleBlogpostcategory');
    Route::get('/team', [SingleController::class, 'render_team'])->name('Team');
    Route::get('/services', [SingleController::class, 'render_service'])->name('Service');
    Route::get('/singleservice/{slug}', [SingleController::class, 'render_singleService'])->name('SingleService');
    Route::get('/demands', [SingleController::class, 'render_demands'])->name('Demand');
    Route::get('/singledemand/{id}', [SingleController::class, 'render_singledemand'])->name('SingleDemand');
    Route::get('/apply/{id}', [SingleController::class, 'showApplicationForm'])->name('apply');
    Route::post('/apply/{id}', [SingleController::class, 'submitApplication'])->name('submitApplication');
    Route::get('/gallery', [SingleController::class, 'render_gallery'])->name('Gallery');
    Route::get('/events', [SingleController::class, 'render_events'])->name('events');
    Route::get('/singleevent/{slug}', [SingleController::class, 'render_singleEvent'])->name('singleEvent');
    Route::get('/faqs', [SingleController::class, 'render_faqs'])->name('faqs');
    Route::get('/countries', [SingleController::class, 'render_Countries'])->name('Countries');
    Route::get('/singlecountry/{slug}', [SingleController::class, 'render_singleCountry'])->name('singleCountry');
    Route::get('/singlecompany/{slug}', [SingleController::class, 'singleCompany'])->name('singleCompany');
    Route::get('/singleworkcategory/{slug}', [SingleController::class, 'render_singleworkCategory'])->name('singleworkCategory');
    Route::get('/singlecategory/{slug}', [SingleController::class, 'render_singleCategory'])->name('singleCategory');
    Route::get('/singlepost/{slug}', [SingleController::class, 'render_singlePost'])->name('singlePost');
    Route::get('/gallerys/{slug}', [SingleController::class, 'render_singleImage'])->name('singleImage');
    Route::get('/blogcategory/{slug}', [SingleController::class, 'render_singleBlogpostcategory'])->name('SingleBlogCategory');
    Route::get('/career', [SingleController::class, 'render_career'])->name('career');
    Route::get('/volunteer', [SingleController::class, 'render_volunteer'])->name('volunteer');
    Route::get('/applycareer', [SingleController::class, 'render_applycareer'])->name('applycareer');
});

// Authentication
Auth::routes();
Route::post('/change-password', [ResetPasswordController::class, 'updatePassword'])->name('changePassword')->middleware('auth');

// Admin Backend Routes
Route::prefix('/admin')->name('admin.')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('site-settings', SiteSettingController::class);
    Route::resource('cover-images', CoverImageController::class);
    Route::resource('about-us', AboutController::class);
    Route::resource('ceomessage', CeoMessageController::class);
    Route::resource('client', ClientController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('photo-galleries', PhotoGalleryController::class);
    Route::resource('video-galleries', VideoGalleryController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('visitors-book', VisitorBookController::class);
    Route::resource('blog-posts-categories', BlogPostsCategoryController::class);
    Route::resource('work_categories', WorkCategoryController::class);
    Route::resource('teams', TeamController::class);

    // ✅ FAQ CRUD
    Route::resource('faqs', FaqController::class);

    // ✅ EVENT CRUD
    Route::resource('events', EventController::class);



    Route::resource('countries', CountryController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('student-details', StudentDetailController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('favicons', FaviconController::class);
    Route::resource('client_messages', ClientMessageController::class);
    Route::resource('demands', DemandController::class);

    // AJAX for Demands
    Route::post('demands/fetch-related', [DemandController::class, 'fetchRelated'])->name('demands.fetchRelated');

    // Applications
    Route::get('/applications', [ApplicationController::class, 'adminIndex'])->name('applications.index');
    Route::post('/applications/{application}/accept', [ApplicationController::class, 'accept'])->name('applications.accept');
    Route::post('/applications/{application}/reject', [ApplicationController::class, 'reject'])->name('applications.reject');
});

// Additional Frontend
Route::get('/blogs', [FrontViewController::class, 'blogs'])->name('blogs.index');
Route::get('/news', [FrontViewController::class, 'news'])->name('news.index');

// Courses (legacy)
Route::get('/courses/{slug}', [FrontViewController::class, 'viewCourse']);

// Application submission (frontend)
Route::post('/apply/{id}', [ApplicationController::class, 'store'])->name('apply.store');

/*whyus section start here */
Route::get('/create/whyus', [WhyUsController::class, 'create'])->name('backend.whyus.create');
Route::get('/index/whyus', [WhyUsController::class, 'index'])->name('backend.whyus.index');
Route::post('/store/whyus', [WhyUsController::class, 'store'])->name('backend.whyus.store');
Route::get('item/{id}/edit', [App\Http\Controllers\WhyUsController::class, 'edit'])->name('item.edit');
Route::put('item/{id}', [App\Http\Controllers\WhyUsController::class, 'update'])->name('item.update');
Route::delete('item/{id}', [App\Http\Controllers\WhyUsController::class, 'destroy'])->name('item.destroy');


/* Event section starts here */
Route::get('/create/event', [EventController::class, 'create'])->name('backend.event.create');
Route::get('/index/event', [EventController::class, 'index'])->name('backend.event.index');
Route::post('/store/event', [EventController::class, 'store'])->name('backend.event.store');
Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('backend.event.edit');
Route::put('/event/{id}', [EventController::class, 'update'])->name('backend.event.update');
Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('backend.event.destroy');

