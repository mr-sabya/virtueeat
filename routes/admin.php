<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->as('admin.')->group(function () {

    Route::get('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');
    
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
        
        Route::post('logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');


        Route::resource('role', App\Http\Controllers\Admin\RoleController::class, ['names' => 'role']);
        Route::resource('permission', App\Http\Controllers\Admin\PermissionController::class, ['names' => 'permission']);
        Route::resource('user', App\Http\Controllers\Admin\UserController::class, ['names' => 'user']);
        /*
    | Country Routes
    |---||---||---||---||---||---||---||---||---||---||---||---||---||---||*/
        Route::resource('country', App\Http\Controllers\Admin\CountryController::class, ['names' => 'country'])->only('index', 'create', 'edit', 'destroy');
        Route::post('country/store/{id?}', [App\Http\Controllers\Admin\CountryController::class, 'store'])->name('country.store');

        /*
    | City Routes
    |---||---||---||---||---||---||---||---||---||---||---||---||---||---||*/
        Route::resource('city', App\Http\Controllers\Admin\CityController::class, ['names' => 'city'])->only('index', 'create', 'edit', 'destroy');
        Route::post('city/store/{id?}', [App\Http\Controllers\Admin\CityController::class, 'store'])->name('city.store');

        /*
    | Category Routes
    |---||---||---||---||---||---||---||---||---||---||---||---||---||---||*/
        Route::resource('category', App\Http\Controllers\Admin\CategoryController::class, ['names' => 'category'])->only('index', 'create', 'edit', 'destroy');
        Route::post('category/store/{id?}', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');

        /*
    | Sub Category Routes
    |---||---||---||---||---||---||---||---||---||---||---||---||---||---||*/
        Route::resource('sub-category', App\Http\Controllers\Admin\SubCategoryController::class, ['names' => 'subcategory'])->only('index', 'create', 'edit', 'destroy');
        Route::post('sub-category/store/{id?}', [App\Http\Controllers\Admin\SubCategoryController::class, 'store'])->name('subcategory.store');


        /*
    | Shop Category Routes
    |---||---||---||---||---||---||---||---||---||---||---||---||---||---||*/
        Route::resource('shop-category', App\Http\Controllers\Admin\ShopCategoryController::class, ['names' => 'shopcategory'])->only('index', 'create', 'edit', 'destroy');
        Route::post('shop-category/store/{id?}', [App\Http\Controllers\Admin\ShopCategoryController::class, 'store'])->name('shopcategory.store');

        /*
    | Item Category Routes
    |---||---||---||---||---||---||---||---||---||---||---||---||---||---||*/
        Route::resource('item-category', App\Http\Controllers\Admin\ItemCategoryController::class, ['names' => 'itemcategory'])->only('index', 'create', 'edit', 'destroy');
        Route::post('item-category/store/{id?}', [App\Http\Controllers\Admin\ItemCategoryController::class, 'store'])->name('itemcategory.store');

        /*
    | Dietry Routes
    |---||---||---||---||---||---||---||---||---||---||---||---||---||---||*/
        Route::resource('dietary', App\Http\Controllers\Admin\DietaryController::class, ['names' => 'dietary'])->only('index', 'create', 'edit', 'destroy');
        Route::post('dietary/store/{id?}', [App\Http\Controllers\Admin\DietaryController::class, 'store'])->name('dietary.store');

        /*
    | Pages Routes
    |---||---||---||---||---||---||---||---||---||---||---||---||---||---||*/
        Route::get('page/{page}', [App\Http\Controllers\Admin\PageController::class, 'index'])->name('page.index');
        Route::post('page/{page}/store/{id?}', [App\Http\Controllers\Admin\PageController::class, 'store'])->name('page.store');



        // user
        Route::get('customers', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('customer.index');
        Route::get('customers/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('customer.show');
        Route::get('customers/{id}/approve', [App\Http\Controllers\Admin\CustomerController::class, 'approve'])->name('customer.approve');


        // merchant
        Route::get('merchants', [App\Http\Controllers\Admin\MerchantController::class, 'index'])->name('merchant.index');
        Route::get('merchants/{id}', [App\Http\Controllers\Admin\MerchantController::class, 'show'])->name('merchant.show');
        Route::get('merchants/{id}/approve', [App\Http\Controllers\Admin\MerchantController::class, 'approve'])->name('merchant.approve');


        // rider
        Route::get('riders', [App\Http\Controllers\Admin\RiderController::class, 'index'])->name('rider.index');
        Route::get('riders/{id}', [App\Http\Controllers\Admin\RiderController::class, 'show'])->name('rider.show');
        Route::get('riders/{id}/approve', [App\Http\Controllers\Admin\RiderController::class, 'approve'])->name('rider.approve');



        // orders
        Route::get('orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('main.order.index');
        Route::get('pending-orders', [App\Http\Controllers\Admin\OrderController::class, 'PendingOrder'])->name('main.pendingorder.index');
        Route::get('orders/{id}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('main.order.show');


        // notifications
        Route::get('notifications', [App\Http\Controllers\Admin\NotificationController::class, 'index'])->name('notification.index');
        Route::get('notifications/{id}', [App\Http\Controllers\Admin\NotificationController::class, 'show'])->name('notification.show');






        // shop 2
        // category

        Route::prefix('shop2')->group(function () {

            // product category
            Route::resource('category', App\Http\Controllers\Admin\Shop2\CategoryController::class, ['names' => 'productcategory'])->only('index', 'create', 'edit', 'destroy');
            Route::post('category/store/{id?}', [App\Http\Controllers\Admin\Shop2\CategoryController::class, 'store'])->name('productcategory.store');

            // product color
            Route::resource('product-color', App\Http\Controllers\Admin\Shop2\ProductColorController::class, ['names' => 'productcolor'])->only('index', 'create', 'edit', 'destroy');
            Route::post('product-color/store/{id?}', [App\Http\Controllers\Admin\Shop2\ProductColorController::class, 'store'])->name('productcolor.store');

            // product
            Route::resource('product', App\Http\Controllers\Admin\Shop2\ProductController::class, ['names' => 'product'])->only('index', 'create', 'edit', 'destroy');
            Route::post('product/store/{id?}', [App\Http\Controllers\Admin\Shop2\ProductController::class, 'store'])->name('product.store');


            // product image
            Route::prefix('product-image')->group(function () {
                Route::get('/{id}', [App\Http\Controllers\Admin\Shop2\ProductImageController::class, 'index'])->name('productimage.index');
                Route::get('/create/{id}', [App\Http\Controllers\Admin\Shop2\ProductImageController::class, 'create'])->name('productimage.create');
                Route::post('/store/{id?}', [App\Http\Controllers\Admin\Shop2\ProductImageController::class, 'store'])->name('productimage.store');
                Route::get('/edit/{id}', [App\Http\Controllers\Admin\Shop2\ProductImageController::class, 'edit'])->name('productimage.edit');
                Route::delete('/edit/{id}', [App\Http\Controllers\Admin\Shop2\ProductImageController::class, 'destroy'])->name('productimage.destroy');
            });


            Route::get('orders', [App\Http\Controllers\Admin\Shop2\OrderController::class, 'index'])->name('order.index');
            Route::get('orders/{id}', [App\Http\Controllers\Admin\Shop2\OrderController::class, 'show'])->name('order.show');
            Route::get('orders/{id}/edit', [App\Http\Controllers\Admin\Shop2\OrderController::class, 'edit'])->name('order.edit');
            Route::put('orders/update/{id}', [App\Http\Controllers\Admin\Shop2\OrderController::class, 'update'])->name('order.update');
        });
    });
});

