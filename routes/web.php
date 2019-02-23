<?php






Route::get('/', function (){
    return redirect('home');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/about', function () {
    return view('workspace.about');})->name('about');

Route::get('/gallery', function () {
    return view('workspace.gallery');})->name('gallery');

Route::get('/service', function () {
    return view('workspace.service');})->name('service');

Route::get('/contact', function () {
    return view('workspace.contact');})->name('contact');


//=============================
//   CRUDS
//=============================


//=============================
//   Space CRUDS
//=============================
Route::get('/spaceCrud','SpaceController@index')->name('spaceCrud');

Route::post('/space/insert','SpaceController@create')->name('insertSpace');

Route::get('/editSpace{spaceId}','SpaceController@edit')->name('editSpace');

Route::post('/updateSpace','SpaceController@update')->name('updateSpace');

Route::get('/space/{spaceId}/delete','SpaceController@destroy')->name('deleteSpace');




//=============================
//   User CRUDS
//=============================
Route::get('/userCrud','UserController@index')->name('userCrud');

Route::post('/user/insert','UserController@create')->name('insertUser');

Route::get('/editUser{userId}','UserController@edit')->name('editUser');

Route::post('/updateUser','UserController@update')->name('updateUser');

Route::get('/user/{userId}/delete','UserController@destroy')->name('deleteUser');


//=============================
//   Reservation CRUDS
//=============================
Route::get('/reservationCrud','ReservationController@index')->name('reservationCrud');

Route::post('/reservation/insert','ReservationController@create')->name('insertReservation');

Route::get('/editReservation{reservationId}','ReservationController@edit')->name('editReservation');

Route::post('/updateReservation','ReservationController@update')->name('updateReservation');

Route::get('/reservation/{reservationId}/delete','ReservationController@destroy')->name('deleteReservation');



//=============================
//   Room CRUDS
//=============================
Route::get('/roomCrud','RoomController@index')->name('roomCrud');

Route::post('/room/insert','RoomController@create')->name('insertRoom');

Route::get('/editRoom{roomId}','RoomController@edit')->name('editRoom');

Route::post('/updateRoom','RoomController@update')->name('updateRoom');

Route::get('/room/{roomId}/delete','RoomController@destroy')->name('deleteRoom');



Route::get('/reserveSpace{spaceId}','RoomController@showSpaceRooms')->name('reserveSpace');


//=============================
//    select drop down menu
//=============================


Route::get('governorateSpaces','SpaceController@governorateSpaces')->name('governorateSpaces');


//=============================
//    User Profile
//=============================

Route::get('userProfile','UserController@userProfile')->name('userProfile');

Route::get('showOwnerHisClientsReservations','UserController@showOwnerHisClientsReservations')->name('showOwnerHisClientsReservations');

//=============================
//    TESTS
//=============================
//


//
Route::get('searchTest2',function (){
    return view('workspace.pages.liveSearchTest2');
});


Route::get('/live_search', 'LiveSearchController@index');
Route::get('/live_search/action', 'LiveSearchController@action')->name('live_search.action');
//

Route::get('starsTest',function (){
    return view('workspace.pages.starsRatingTest');

})->name('starsTest');



//Route::get('searchTest','TestController@searchTest')->name('searchTest');

Route::get('searchTest',function (){
    return view('workspace.pages.liveSearchTest');
})->name('searchTest');





Route::get('river',function (){
    return view('workspace.pages.requestRiverData');
});






//      momen@gmail.com
//      ramy33@gmail.com






//Route::post('searchSpace','SpaceController@searchSpace')->name('searchSpace');
//
//
//
//Route::get('/test', 'TestController@testOneToOne');
//
//Route::get('/testdb', function () {});
//
//Route::get('/testSearch/{spaceName}', 'HomeController@testSearch');
//Route::get('/SearchByName/{spaceName}', 'HomeController@SearchByName');

