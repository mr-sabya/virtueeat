<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

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

Route::get('/search-location', [\App\Http\Controllers\LocationController::class, 'searchLocation']);

Route::get('/login', [\App\Http\Controllers\Frontend\Auth\LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login-submit', [\App\Http\Controllers\Frontend\Auth\LoginController::class, 'login'])->name('login.submit');

Route::get('/verify', [\App\Http\Controllers\Frontend\Auth\LoginController::class, 'loginVerification'])->name('login.verify');

Route::post('/verify-otp', [\App\Http\Controllers\Frontend\Auth\LoginController::class, 'verifyOTP'])->name('login.verify.submit');

Route::get('/logout', [\App\Http\Controllers\Frontend\Auth\LoginController::class, 'logout'])->name('logout');

// Route::view('/', 'welcome')->name('home');


// get location
Route::get('/location', [\App\Http\Controllers\LocationController::class, 'getUserInfo'])->name('get.location');

Route::get('/', [\App\Http\Controllers\Frontend\HomeControlelr::class, 'index'])->name('home');

// feed
Route::get('feed', [\App\Http\Controllers\Frontend\SearchController::class, 'feed'])->name('main.feed.index');

// shop details
Route::get('shop/{id}', [\App\Http\Controllers\Frontend\ShopController::class, 'show'])->name('main.shop.show');

// show menu item
Route::get('shop/{shop}/item/{id}', [\App\Http\Controllers\Frontend\MenuItemController::class, 'show'])->name('main.item.show');


Route::middleware('auth')->group(function () {

    // account
    Route::get('/account', [\App\Http\Controllers\Frontend\Auth\AccountController::class, 'account'])->name('user.account');

    // reset password
    Route::get('/password-reset', [\App\Http\Controllers\Frontend\Auth\PasswordController::class, 'showResetForm'])->name('user.password.form');
    Route::post('/password-update', [\App\Http\Controllers\Frontend\Auth\PasswordController::class, 'updatePassword'])->name('user.password.update');

    // change name
    Route::get('/update-name', [\App\Http\Controllers\Frontend\Auth\AccountController::class, 'changeNameForm'])->name('user.name.form');
    Route::post('/update-name', [\App\Http\Controllers\Frontend\Auth\AccountController::class, 'updateName'])->name('user.name.update');
    
    Route::get('/update-address', [\App\Http\Controllers\Frontend\Auth\AccountController::class, 'changeAddress'])->name('user.address.form');
    Route::post('/update-address', [\App\Http\Controllers\Frontend\Auth\AccountController::class, 'updateAddress'])->name('user.address.update');
    // profile
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // user order
    Route::get('/order', [\App\Http\Controllers\Frontend\OrderController::class, 'index'])->name('user.order');
    Route::get('/order/{id}', [\App\Http\Controllers\Frontend\OrderController::class, 'show'])->name('user.order.show');
    Route::post('/order', [\App\Http\Controllers\Frontend\OrderController::class, 'order'])->name('user.order.store');

    // user wallet
    Route::get('/wallet', [\App\Http\Controllers\Frontend\WalletController::class, 'index'])->name('user.wallet');

    // user favorite list
    Route::get('/favorite', [\App\Http\Controllers\Frontend\FavoriteController::class, 'index'])->name('user.favorite');

    // help page
    Route::get('/help', [\App\Http\Controllers\Frontend\HelpController::class, 'index'])->name('user.help');

    //invite
    Route::get('/invite', [\App\Http\Controllers\Frontend\InviteController::class, 'index'])->name('user.invite');


    


    // cart
    // add to cart
    Route::post('add-to-cart/{id}', [\App\Http\Controllers\Frontend\CartController::class, 'addCart'])->name('main.cart.add');
    Route::get('cart', [\App\Http\Controllers\Frontend\CartController::class, 'show'])->name('main.cart.show');
    // update cart item
    Route::get('cart-item/update/{cart}/{id}', [\App\Http\Controllers\Frontend\CartController::class, 'updateCartItem'])->name('main.cart.update');

    // checkout
    Route::get('checkout', [\App\Http\Controllers\Frontend\CheckoutController::class, 'index'])->name('main.checkout.index');
});

Route::get('/404', function () {
    return view('404');
})->name('404');




// Common Routes
Route::get('/city/{id}', [HomeController::class, 'getCity'])->name('city.get');


Route::get('/merchant/register', [\App\Http\Controllers\Merchant\Auth\RegisterController::class, 'showRegistrationForm'])->name('merchantRegistration');
Route::post('/merchant/register', [\App\Http\Controllers\Merchant\Auth\RegisterController::class, 'register'])->name('merchant.register');
Route::post('/merchant/login', [\App\Http\Controllers\Merchant\Auth\LoginController::class, 'login'])->name('merchant.login');

// Merchant Routes
Route::middleware(['auth', 'merchant'])->prefix('merchant')->as('merchant.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Merchant\MerchantController::class, 'index'])->name('dashboard');

    /*
    | Schedul Routes
    |---||---||---||---||---||---||---||---||---||---||---||---||---||---||*/
    Route::resource('schedule', \App\Http\Controllers\Merchant\ScheduleController::class, ['names' => 'schedule'])->only('index', 'create', 'edit', 'destroy');
    Route::post('schedule/store/{id?}', [\App\Http\Controllers\Merchant\ScheduleController::class, 'store'])->name('schedule.store');

    /*
    | Menu Routes
    |---||---||---||---||---||---||---||---||---||---||---||---||---||---||*/
    Route::resource('menu-item', \App\Http\Controllers\Merchant\MenuItemController::class, ['names' => 'menuitem'])->only('index', 'create', 'edit', 'destroy');
    Route::post('menu-item/store/{id?}', [\App\Http\Controllers\Merchant\MenuItemController::class, 'store'])->name('menuitem.store');
    Route::post('menu-item/extra/store', [\App\Http\Controllers\Merchant\MenuItemController::class, 'extraStore'])->name('extra.store');

    // get sub category
    Route::get('get-sub-category/{id}', [\App\Http\Controllers\Merchant\CommonController::class, 'getSubCategory']);

    // account
    Route::get('account', [\App\Http\Controllers\Merchant\AccountController::class, 'account'])->name('account');
    Route::post('account/update', [\App\Http\Controllers\Merchant\AccountController::class, 'updateAccount'])->name('account.update');

    // restaurant
    Route::get('restaurant', [\App\Http\Controllers\Merchant\AccountController::class, 'restaurant'])->name('restaurant');
    Route::post('restaurant/update', [\App\Http\Controllers\Merchant\AccountController::class, 'updateRestaurantInfo'])->name('restaurant.update');

    /*
    | Shop Category Routes
    |---||---||---||---||---||---||---||---||---||---||---||---||---||---||*/
    Route::resource('item-category', \App\Http\Controllers\Merchant\ItemCategoryController::class, ['names' => 'itemcategory'])->only('index', 'create', 'edit', 'destroy');
    Route::post('item-category/store/{id?}', [\App\Http\Controllers\Merchant\ItemCategoryController::class, 'store'])->name('itemcategory.store');

    // get location
    Route::get('my-location/{id}', [\App\Http\Controllers\Merchant\AccountController::class, 'getMyLocation'])->name('location');


    // notificatons
    Route::get('notifications', [\App\Http\Controllers\Merchant\NotificationController::class, 'index'])->name('notification.index');
    Route::get('notifications/{id}', [\App\Http\Controllers\Merchant\NotificationController::class, 'show'])->name('notification.show');


    Route::get('orders', [\App\Http\Controllers\Merchant\OrderController::class, 'index'])->name('order.index');
    Route::get('orders/{id}', [\App\Http\Controllers\Merchant\OrderController::class, 'show'])->name('order.show');
    Route::get('orders/{id}/edit', [\App\Http\Controllers\Merchant\OrderController::class, 'edit'])->name('order.edit');
    Route::get('orders/confirmed/{id}', [\App\Http\Controllers\Merchant\OrderController::class, 'confirmed'])->name('order.confirmed');
});


// riders
    Route::get('/rider/become-rider', [\App\Http\Controllers\Rider\HomeController::class, 'index'])->name('rider.home');
    Route::post('/rider/register', [\App\Http\Controllers\Rider\Auth\RegisterController::class, 'register'])->name('rider.register');
    Route::post('/rider/login', [\App\Http\Controllers\Rider\Auth\LoginController::class, 'login'])->name('rider.login');

// Rider Routes
Route::middleware(['auth', 'isrider'])->prefix('rider')->as('rider.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Rider\RiderController::class, 'index'])->name('dashboard');

    /*
    | Vehicle Routes
    |---||---||---||---||---||---||---||---||---||---||---||---||---||---||*/
    Route::resource('vehicle', \App\Http\Controllers\Rider\VehicleController::class, ['names' => 'vehicle'])->only('index', 'create', 'edit', 'destroy');
    Route::post('vehicle/store/{id?}', [\App\Http\Controllers\Rider\VehicleController::class, 'store'])->name('vehicle.store');



    // notificatons
    Route::get('notifications', [\App\Http\Controllers\Rider\NotificationController::class, 'index'])->name('notification.index');
    Route::get('notifications/{id}', [\App\Http\Controllers\Rider\NotificationController::class, 'show'])->name('notification.show');

    // 
    Route::get('orders', [\App\Http\Controllers\Rider\OrderControlelr::class, 'index'])->name('order.index');
    Route::get('orders/{id}', [\App\Http\Controllers\Rider\OrderControlelr::class, 'show'])->name('order.show');
    Route::get('orders/take/{id}', [\App\Http\Controllers\Rider\OrderControlelr::class, 'takeOrder'])->name('order.take');
    Route::get('orders/update-sattus/{id}', [\App\Http\Controllers\Rider\OrderControlelr::class, 'updateStatus'])->name('order.update');
});


// Shop Routes
Route::middleware(['auth', 'verifyShopUser'])->prefix('shop')->as('shop.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Shop2\HomeController::class, 'index'])->name('index');

    Route::get('product/{slug}', [\App\Http\Controllers\Shop2\ProductController::class, 'show'])->name('product.show');
    Route::get('search/product/', [\App\Http\Controllers\Shop2\ProductController::class, 'search'])->name('product.search');

    // add to cart
    Route::get('add-to-cart/{id}', [\App\Http\Controllers\Shop2\CartController::class, 'addCart'])->name('cart.add');

    // update cart item
    Route::get('cart-item/update/{id}', [\App\Http\Controllers\Shop2\CartController::class, 'updateCartItem'])->name('cart.increment');

    // delete cart item
    Route::get('delete-cart-item/{id}', [\App\Http\Controllers\Shop2\CartController::class, 'deleteCartItem'])->name('cart.delete');

    // cart
    Route::get('cart', [\App\Http\Controllers\Shop2\CartController::class, 'index'])->name('cart.index');
    Route::get('checkout', [\App\Http\Controllers\Shop2\OrderController::class, 'checkout'])->name('checkout.index');
    Route::post('order/confirm', [\App\Http\Controllers\Shop2\OrderController::class, 'store'])->name('order.store');
    Route::get('order/success', [\App\Http\Controllers\Shop2\OrderController::class, 'successPage'])->name('order.success');
});
