<?php
 
 return [
    'contact' => 'ContactController@index',
    'about' => 'AboutController@index',
    'blog' => 'BlogController@index',
    'guest' => 'GuestbookController@index',
    
    'admin' => 'Admin\DashboardController@index',
    
    'admin/categories' => 'Admin\CategoriesController@index',
    'admin/categories/create' => 'Admin\CategoriesController@create',
    'admin/categories/edit/{id}' => 'Admin\CategoriesController@edit',
    'admin/categories/delete/{id}' => 'Admin\CategoriesController@delete',
 
 
    'admin/posts' => 'Admin\PostsController@index',
    'admin/posts/create' => 'Admin\PostsController@create',
    'admin/posts/edit/{id}' => 'Admin\PostsController@edit',
    
    'admin/posts/delete/{id}'=> 'Admin\PostsController@delete',
    'admin/posts/show/{id}'=> 'Admin\PostsController@show',
 
    'admin/products' => 'Admin\ProductsController@index',
    'admin/products/create' => 'Admin\ProductsController@create',
    'admin/products/edit/{id}' => 'Admin\ProductsController@edit',
    // 'admin/products/edit/43' => 'Admin\ProductsController@edit',
    'admin/products/delete/{id}'=> 'Admin\ProductsController@delete',
    'admin/products/show/{id}'=> 'Admin\ProductsController@show',
 
    //Главаня страница
    'index.php' => 'HomeController@index',
    '' => 'HomeController@index',
 ];
 