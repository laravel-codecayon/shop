<?php 
Route::get('service', 'HomeController@page')->where(array('id'=>'[0-9]+'));
Route::get('about-us', 'HomeController@page')->where(array('id'=>'[0-9]+'));
Route::get('contact-us', 'HomeController@page')->where(array('id'=>'[0-9]+'));
Route::get('faq', 'HomeController@page')->where(array('id'=>'[0-9]+'));
Route::get('portpolio', 'HomeController@page')->where(array('id'=>'[0-9]+'));
Route::get('pages/test-3-{id}.html', 'HomeController@page')->where(array('id'=>'[0-9]+'));
Route::get('pages/test-1-{id}.html', 'HomeController@page')->where(array('id'=>'[0-9]+'));
Route::get('pages/test-2-{id}.html', 'HomeController@page')->where(array('id'=>'[0-9]+'));
?>