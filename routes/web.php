<?php
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogcatController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\ContantController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GcatController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ResizeImageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeProjectController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
});	

Route::get('/',[IndexController::class,'index'])->name('index');
Route::get('/contact-us',[ContactController::class,'contactus'])->name('contact-us');
Route::post('/sendcontact',[ContactController::class,'sendcontact'])->name('contact.send'); 
Route::post('/careersend',[IndexController::class,'careersend'])->name('career.send'); 

Route::get('/customer-corner',[IndexController::class,'customercorner'])->name('customer-corner');
Route::get('/projects',[HomeProjectController::class,'projectcategories'])->name('projects');
Route::get('/projects/{id}',[HomeProjectController::class,'projectbycategories']); 
Route::get('/project/{id}',[HomeProjectController::class,'projectdetails']); 
Route::post('/sendprojects',[HomeProjectController::class,'sendprojects'])->name('project.send'); 
Route::get('/blog',[BlogsController::class,'blogs'])->name('blog');
Route::get('/blog/{id}',[BlogsController::class,'blogdetail']);
Route::get('/blogs/{id}',[BlogsController::class,'blogbycates']);
Route::get('/page/{id}',[AboutController::class,'aboutus']);
Route::get('/events',[EventsController::class,'events'])->name('events');
Route::get('/event/{id}',[EventsController::class,'eventdetail']);
Route::get('/nri',[IndexController::class,'nri'])->name('nri');

Route::post('/sendcommon',[IndexController::class,'sendcommon'])->name('common.send'); 
Route::get('/photos',[PhotoController::class,'photos'])->name('photos');
Route::get('/photo/{id}',[PhotoController::class,'photobycates']);
Route::get('/videos',[PhotoController::class,'videos'])->name('videos');
Route::get('/faq',[IndexController::class,'faqs'])->name('faq'); 
Route::get('/csr',[IndexController::class,'csr'])->name('csr'); 
Route::get('/csr/{id}',[IndexController::class,'csrdetail']);
Route::get('/career',[IndexController::class,'career'])->name('career'); 
Route::get('/banking',[IndexController::class,'banking'])->name('banking'); 
Route::get('/search',[IndexController::class,'search'])->name('search'); 
Route::get('/life-chordia',[IndexController::class,'lifechordia'])->name('life-chordia'); 



Route::get('/dashboard', function () {
return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
 
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
Route::namespace('Auth')->middleware('guest:admin')->group(function(){
Route::get('login',[AuthenticatedSessionController::class,'create'])->name('login');
Route::post('login',[AuthenticatedSessionController::class,'store'])->name('adminlogin');
});
Route::middleware('admin')->group(function(){
Route::get('dashboard',[HomeController::class,'index'])->name('dashboard');
Route::get('/', [HomeController::class,'index'])->name('admin.home');
Route::get('/banner',[BannerController::class,'banner'])->name('banner'); 
Route::get('/banner/create',[BannerController::class,'create'])->name('banner.create'); 
Route::post('/banner/store',[BannerController::class,'store'])->name('banner.store');
Route::get('/banner/changeStatus',[BannerController::class,'changeStatus']);
Route::get('/banner/edit/{id}',[BannerController::class,'edit'])->name('banner.edit');
Route::patch('/banner/update',[BannerController::class,'update'])->name('banner.update');
Route::get('/banner/delete/{id}',[BannerController::class,'delete'])->name('banner.delete');
 
Route::get('/contant',[ContantController::class,'contant'])->name('contant'); 
Route::get('/contant/create',[ContantController::class,'create'])->name('contant.create'); 
Route::post('/contant/store',[ContantController::class,'store'])->name('contant.store');
Route::get('/contant/changeStatus',[ContantController::class,'changeStatus']);
Route::get('/contant/edit/{id}',[ContantController::class,'edit'])->name('contant.edit');
Route::patch('/contant/update',[ContantController::class,'update'])->name('contant.update');
Route::get('/contant/delete/{id}',[ContantController::class,'delete'])->name('contant.delete');

Route::get('/cms',[CmsController::class,'cms'])->name('cms'); 
Route::get('/cms/create',[CmsController::class,'create'])->name('cms.create'); 
Route::post('/cms/store',[CmsController::class,'store'])->name('cms.store');
Route::get('/cms/changeStatus',[CmsController::class,'changeStatus']);
Route::get('/cms/edit/{id}',[CmsController::class,'edit'])->name('cms.edit');
Route::patch('/cms/update',[CmsController::class,'update'])->name('cms.update');
Route::get('/cms/delete/{id}',[CmsController::class,'delete'])->name('cms.delete');

Route::get('/category',[ProjectCategoryController::class,'category'])->name('category'); 
Route::get('/category/create',[ProjectCategoryController::class,'create'])->name('category.create'); 
Route::post('/category/store',[ProjectCategoryController::class,'store'])->name('category.store');
Route::get('/category/changeStatus',[ProjectCategoryController::class,'changeStatus']);
Route::get('/category/edit/{id}',[ProjectCategoryController::class,'edit'])->name('category.edit');
Route::patch('/category/update',[ProjectCategoryController::class,'update'])->name('category.update');
Route::get('/category/delete/{id}',[ProjectCategoryController::class,'delete'])->name('category.delete');

Route::get('/project',[ProjectController::class,'project'])->name('project'); 
Route::get('/project/create',[ProjectController::class,'create'])->name('project.create'); 
Route::post('/project/store',[ProjectController::class,'store'])->name('project.store');
Route::get('/project/changeStatus',[ProjectController::class,'changeStatus']);
Route::get('/project/edit/{id}',[ProjectController::class,'edit'])->name('project.edit');
Route::patch('/project/update',[ProjectController::class,'update'])->name('project.update');
Route::get('/project/delete/{id}',[ProjectController::class,'delete'])->name('project.delete');
Route::get('/project/getimages/{id}',[ProjectController::class,'getimages'])->name('project.getimages');
Route::post('/project/addimages', [ProjectController::class,'addimages'])->name('project.addimages');
Route::get('/project/imgdelete/{id}',[ProjectController::class,'imgdelete'])->name('project.imgdelete');
Route::get('/project/getitinerary/{id}',[ProjectController::class,'getitinerary'])->name('project.getitinerary');
Route::post('/project/additinerary',[ProjectController::class,'additinerary'])->name('project.additinerary');
Route::get('/project/itinerarydelete/{id}',[ProjectController::class,'itinerarydelete'])->name('project.itinerarydelete');
Route::get('/project/edititinerary/{id}',[ProjectController::class,'edititinerary'])->name('itinerary.edit');
Route::patch('/project/updateitinerary',[ProjectController::class,'updateitinerary'])->name('project.updatetitinerary');
Route::get('/project/search',[ProjectController::class,'search'])->name('project.search');
Route::get('/project/amenities/{id}',[ProjectController::class,'getamenities'])->name('project.getamenities');
Route::post('/project/addamenities', [ProjectController::class,'addamenities'])->name('project.addamenities');
Route::get('/project/amenitiesdelete/{id}',[ProjectController::class,'amenitiesdelete']);

 
 
Route::get('/project/getnearlocation/{id}',[ProjectController::class,'getnearlocation'])->name('project.getnearlocation');
Route::post('/project/addnearlocation',[ProjectController::class,'addnearlocation'])->name('project.addnearlocation');
Route::get('/project/nearlocationdelete/{id}',[ProjectController::class,'nearlocationdelete'])->name('project.nearlocationdelete');
Route::get('/project/editnearlocation/{id}',[ProjectController::class,'editnearlocation'])->name('nearlocation.edit');
Route::patch('/project/updatenearlocation',[ProjectController::class,'updatenearlocation'])->name('project.updatenearlocation');

Route::get('/service',[ServiceController::class,'service'])->name('service'); 
Route::get('/service/create',[ServiceController::class,'create'])->name('service.create'); 
Route::post('/service/store',[ServiceController::class,'store'])->name('service.store');
Route::get('/service/changeStatus',[ServiceController::class,'changeStatus']);
Route::get('/service/edit/{id}',[ServiceController::class,'edit'])->name('service.edit');
Route::patch('/service/update',[ServiceController::class,'update'])->name('service.update');
Route::get('/service/delete/{id}',[ServiceController::class,'delete'])->name('service.delete');
Route::get('/service/getimages/{id}',[ServiceController::class,'getimages'])->name('service.getimages');
Route::post('/service/addimages',[ServiceController::class,'addimages'])->name('image.addimages');
Route::get('/service/imgdelete/{id}',[ServiceController::class,'imgdelete'])->name('service.imgdelete');

Route::get('/gcat',[GcatController::class,'gcat'])->name('gcat'); 
Route::get('/gcat/create',[GcatController::class,'create'])->name('gcat.create'); 
Route::post('/gcat/store',[GcatController::class,'store'])->name('gcat.store');
Route::get('/gcat/changeStatus',[GcatController::class,'changeStatus']);
Route::get('/gcat/edit/{id}',[GcatController::class,'edit'])->name('gcat.edit');
Route::patch('/gcat/update',[GcatController::class,'update'])->name('gcat.update');
Route::get('/gcat/delete/{id}',[GcatController::class,'delete'])->name('gcat.delete');

Route::get('/gallery',[GalleryController::class,'gallery'])->name('gallery'); 
Route::get('/gallery/create',[GalleryController::class,'create'])->name('gallery.create'); 
Route::post('/gallery/store',[GalleryController::class,'store'])->name('gallery.store');
Route::get('/gallery/changeStatus',[GalleryController::class,'changeStatus']);
Route::get('/gallery/edit/{id}',[GalleryController::class,'edit'])->name('gallery.edit');
Route::patch('/gallery/update',[GalleryController::class,'update'])->name('gallery.update');
Route::get('/gallery/delete/{id}',[GalleryController::class,'delete'])->name('gallery.delete');

Route::get('/testimonial',[TestimonialController::class,'testimonial'])->name('testimonial'); 
Route::get('/testimonial/create',[TestimonialController::class,'create'])->name('testimonial.create'); 
Route::post('/testimonial/store',[TestimonialController::class,'store'])->name('testimonial.store');
Route::get('/testimonial/changeStatus',[TestimonialController::class,'changeStatus']);
Route::get('/testimonial/edit/{id}',[TestimonialController::class,'edit'])->name('testimonial.edit');
Route::patch('/testimonial/update',[TestimonialController::class,'update'])->name('testimonial.update');
Route::get('/testimonial/delete/{id}',[TestimonialController::class,'delete'])->name('testimonial.delete');

Route::get('/video',[VideoController::class,'video'])->name('video'); 
Route::get('/video/create',[VideoController::class,'create'])->name('video.create'); 
Route::post('/video/store',[VideoController::class,'store'])->name('video.store');
Route::get('/video/changeStatus',[VideoController::class,'changeStatus']);
Route::get('/video/edit/{id}',[VideoController::class,'edit'])->name('video.edit');
Route::patch('/video/update',[VideoController::class,'update'])->name('video.update');
Route::get('/video/delete/{id}',[VideoController::class,'delete'])->name('video.delete');

Route::get('/blogcat',[BlogcatController::class,'blogcat'])->name('blogcat'); 
Route::get('/blogcat/create',[BlogcatController::class,'create'])->name('blogcat.create'); 
Route::post('/blogcat/store',[BlogcatController::class,'store'])->name('blogcat.store');
Route::get('/blogcat/changeStatus',[BlogcatController::class,'changeStatus']);
Route::get('/blogcat/edit/{id}',[BlogcatController::class,'edit'])->name('blogcat.edit');
Route::patch('/blogcat/update',[BlogcatController::class,'update'])->name('blogcat.update');
Route::get('/blogcat/delete/{id}',[BlogcatController::class,'delete'])->name('blogcat.delete');
Route::post('/ckeditor/upload',"CkeditorController@upload")->name('ckeditor.upload'); 

Route::get('/blog',[BlogController::class,'blog'])->name('blog'); 
Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create'); 
Route::post('/blog/store',[BlogController::class,'store'])->name('blog.store');
Route::get('/blog/changeStatus',[BlogController::class,'changeStatus']);
Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
Route::patch('/blog/update',[BlogController::class,'update'])->name('blog.update');
Route::get('/blog/delete/{id}',[BlogController::class,'delete'])->name('blog.delete');


Route::get('/bank',[BankController::class,'bank'])->name('bank'); 
Route::get('/bank/create',[BankController::class,'create'])->name('bank.create'); 
Route::post('/bank/store',[BankController::class,'store'])->name('bank.store');
Route::get('/bank/changeStatus',[BankController::class,'changeStatus']);
Route::get('/bank/edit/{id}',[BankController::class,'edit'])->name('bank.edit');
Route::patch('/bank/update',[BankController::class,'update'])->name('bank.update');
Route::get('/bank/delete/{id}',[BankController::class,'delete'])->name('bank.delete');

Route::get('/faq',[FaqController::class,'faq'])->name('faq'); 
Route::get('/faq/create',[FaqController::class,'create'])->name('faq.create'); 
Route::post('/faq/store',[FaqController::class,'store'])->name('faq.store');
Route::get('/faq/changeStatus',[FaqController::class,'changeStatus']);
Route::get('/faq/edit/{id}',[FaqController::class,'edit'])->name('faq.edit');
Route::patch('/faq/update',[FaqController::class,'update'])->name('faq.update');
Route::get('/faq/delete/{id}',[FaqController::class,'delete'])->name('faq.delete');

Route::get('/event',[EventController::class,'event'])->name('event'); 
Route::get('/event/create',[EventController::class,'create'])->name('event.create'); 
Route::post('/event/store',[EventController::class,'store'])->name('event.store');
Route::get('/event/changeStatus',[EventController::class,'changeStatus']);
Route::get('/event/edit/{id}',[EventController::class,'edit'])->name('event.edit');
Route::patch('/event/update',[EventController::class,'update'])->name('event.update');
Route::get('/event/delete/{id}',[EventController::class,'delete'])->name('event.delete');
Route::get('/event/getimages/{id}',[EventController::class,'getimages'])->name('event.getimages');
Route::post('/event/addimages',[EventController::class,'addimages'])->name('event.addimages');
Route::get('/event/imgdelete/{id}',[EventController::class,'imgdelete'])->name('event.imgdelete');
 

Route::get('/resize/createsize',[ResizeImageController::class,'createsize'])->name('resize.createsize');
Route::post('/resize/storesize',[ResizeImageController::class,'storesize'])->name('resize.storesize');
Route::patch('/resize/updatesize',[ResizeImageController::class,'updatesize']);
Route::get('/resize/editsize/{id}',[ResizeImageController::class,'editsize'])->name('resize.editsize');
Route::get('/resize/deletesize/{id}',[ResizeImageController::class,'deletesize'])->name('resize.deletesize');
 
Route::get('/general',[GeneralController::class,'general'])->name('general');
Route::get('/general/create',[GeneralController::class,'create'])->name('general.create');
Route::post('/general/store',[GeneralController::class,'store'])->name('general.store');
Route::get('/general/changeStatus',[GeneralController::class,'changeStatus']);
Route::get('/general/edit/{id}',[GeneralController::class,'edit'])->name('general.edit');
Route::patch('/general/update',[GeneralController::class,'update'])->name('general.update');
Route::get('/general/delete/{id}',[GeneralController::class,'delete'])->name('general.delete');
Route::get('/enquiry/quick',[GeneralController::class,'quickenquiry'])->name('enquiry.quick');
Route::get('/enquiry/delete/{id}',[GeneralController::class,'quickdelete'])->name('enquiry.delete');
Route::get('/enquiry/contact',[GeneralController::class,'contactenquiry'])->name('enquiry.contact');
Route::get('/contact/delete/{id}',[GeneralController::class,'contactdelete'])->name('contact.delete');
Route::get('/enquiry/project',[ProjectController::class,'projectenquiry'])->name('enquiry.project');
Route::get('/projectenquiry/delete/{id}',[ProjectController::class,'projectdelete'])->name('projectenquiry.delete');
Route::get('/enquiry/detail/{id}',[ProjectController::class,'getprojectenqiry'])->name('enquiry.detail');
Route::get('/enquiry/customize',[ProjectController::class,'customizeenquiry'])->name('enquiry.customize');
Route::get('/customize/delete/{id}',[ProjectController::class,'customizedelete'])->name('customize.delete');
Route::get('/customize/detail/{id}',[ProjectController::class,'getcustomized'])->name('customize.detail');

Route::get('/enquiry/car',[CarController::class,'carenquiry'])->name('enquiry.car');
Route::get('/carenquiry/delete/{id}',[CarController::class,'cardelete'])->name('carenquiry.delete');
Route::get('/car/detail/{id}',[CarController::class,'getcar'])->name('car.detail');
Route::get('/enquiry/common',[GeneralController::class,'commonenquiry'])->name('enquiry.common');
Route::get('/enquiry/carrer',[GeneralController::class,'carrerenquiry'])->name('enquiry.carrer');
Route::get('/carrer/delete/{id}',[GeneralController::class,'carrerdelete'])->name('carrer.delete');

Route::get('/common/delete/{id}',[GeneralController::class,'commondelete'])->name('common.delete');
Route::get('/common/detail/{id}',[GeneralController::class,'getcommon'])->name('common.detail');
Route::get('/changepassword/create',[ChangePasswordController::class,'create'])->name('changepassword.create');
Route::post('/changepassword/store',[ChangePasswordController::class,'store'])->name('changepassword.store');
});
Route::post('logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');
});
use App\Models\Project; // or your actual model name

Route::get('/buy-flats-in-jaipur', function () {
    $general = \App\Helpers\GeneralHelper::Generals();
   $recommended = \App\Models\Project::whereIn('id', [15, 14, 13])->get();


    return view('buy-flats-in-jaipur', compact('general', 'recommended'));
});


