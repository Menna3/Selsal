<?php

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
use App\Customer;
use App\Order;
use App\Notification;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function () {
    $customer = Customer::findOrFail(1);
    
    
    
    $customer->orders()->save(new Order(['orderNumber'=>'12', 'orderDate'=>'2018-03-03', 'status'=>'shipped', 'paymentMethod'=>'cash', 'tax'=>'0', 'shippingCost'=>'20', 'shippingDate'=>'2018-03-20','totalPrice'=>'200', 'notes'=>'sdfff']));
    
    //$customer->order()->attach(1);
});

Route::get('/notify', function () {
    
    $customer = Customer::find(1);
    
    $notification = new Notification(['type'=>'shit', 'about'=>'asd', 'content'=>'lsdkfjsj']);
    
    $customer->notifications()->save($notification);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post("products/create", "ProductController@addProduct");
Route::get("products/get", "ProductController@getAllProducts");
Route::get("products/get/{id}", "ProductController@getProductById");
Route::get("Product/delete/{id}", "ProductController@deleteProduct");

Route::post("category/create", "CategoryController@addCategory");
Route::get("category/get", "CategoryController@getAllCategories");
Route::get("category/get/{id}", "CategoryController@getCategoryById");
Route::get("category/delete/{id}", "CategoryController@deleteCategory");

Route::post("notification/create", "NotificationController@addNotification");
Route::get("notification/get", "NotificationController@getAllNotifications");
Route::get("notification/get/{id}", "NotificationController@getNotificationById");
Route::get("notification/delete/{id}", "NotificationController@deleteNotification");

Route::post("country/create", "CountryController@addCountry");
Route::get("country/get", "CountryController@getAllCountries");
Route::get("country/get/{id}", "CountryController@getCountryById");
Route::get("country/delete/{id}", "CountryController@deleteCountry");

Route::post("user/create", "UserController@addUser");
Route::get("user/get", "UserController@getAllUsers");
Route::get("user/get/{id}", "UserController@getUserById");
Route::get("user/delete/{id}", "UserController@deleteUser");

Route::post("city/create", "CityController@addCity");
Route::get("city/get", "CityController@getAllCities");
Route::get("city/get/{id}", "CityController@getCityById");
Route::get("city/delete/{id}", "CityController@deleteCity");

Route::post("customer/create", "CustomerController@addCustomer");
Route::get("customer/get", "CustomerController@getAllCustomers");
Route::get("customer/get/{id}", "CustomerController@getCustomerById");
Route::get("customer/delete/{id}", "CustomerController@deleteCustomer");

