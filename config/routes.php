<?php

// $router->define(
//     [
//         'contact' => 'ContactController@index',
//         'about' => 'AboutController@index',
//         'blog' => 'BlogController@index',
//         'guest' => 'GuestbookController@index',
        
//         'admin' => 'Admin\DashboardController@index',
        
//         'admin/categories' => 'Admin\CategoriesController@index',
//         'admin/categories/create' => 'Admin\CategoriesController@create',
//         'admin/categories/edit/{id}' => 'Admin\CategoriesController@edit',
//         'admin/categories/delete/{id}' => 'Admin\CategoriesController@delete',
    
//         'admin/posts' => 'Admin\PostsController@index',
//         'admin/posts/create' => 'Admin\PostsController@create',
//         'admin/posts/edit/{id}' => 'Admin\PostsController@edit',
        
//         'admin/posts/delete/{id}'=> 'Admin\PostsController@delete',
//         'admin/posts/show/{id}'=> 'Admin\PostsController@show',
    
//         'admin/products' => 'Admin\ProductsController@index',
//         'admin/products/create' => 'Admin\ProductsController@create',
//         'admin/products/edit/{id}' => 'Admin\ProductsController@edit',
//         'admin/products/delete/{id}'=> 'Admin\ProductsController@delete',
//         'admin/products/show/{id}'=> 'Admin\ProductsController@show',
    
//         //Главаня страница
//         'index.php' => 'HomeController@index',
//         '' => 'HomeController@index',
//     ]
// );

//  return [
//     'contact' => 'ContactController@index',
//     'about' => 'AboutController@index',
//     'blog' => 'BlogController@index',
//     'guest' => 'GuestbookController@index',
    
//     'admin' => 'Admin\DashboardController@index',
    
//     'admin/categories' => 'Admin\CategoriesController@index',
//     'admin/categories/create' => 'Admin\CategoriesController@create',
//     'admin/categories/edit/{id}' => 'Admin\CategoriesController@edit',
//     'admin/categories/delete/{id}' => 'Admin\CategoriesController@delete',
  
//     'admin/posts' => 'Admin\PostsController@index',
//     'admin/posts/create' => 'Admin\PostsController@create',
//     'admin/posts/edit/{id}' => 'Admin\PostsController@edit',
    
//     'admin/posts/delete/{id}'=> 'Admin\PostsController@delete',
//     'admin/posts/show/{id}'=> 'Admin\PostsController@show',
 
//     'admin/products' => 'Admin\ProductsController@index',
//     'admin/products/create' => 'Admin\ProductsController@create',
//     'admin/products/edit/{id}' => 'Admin\ProductsController@edit',
//     'admin/products/delete/{id}'=> 'Admin\ProductsController@delete',
//     'admin/products/show/{id}'=> 'Admin\ProductsController@show',
 
//     //Главаня страница
//     'index.php' => 'HomeController@index',
//     '' => 'HomeController@index',
//  ];
 



$router->get('', 'HomeController@index');

$router->get('about', 'AboutController@index');
$router->get('contact', 'ContactController@index');

$router->get('guestbook', 'GuestbookController@index');

$router->get('blog', 'BlogController@index');

$router->get('blog/{slug}', 'BlogController@show');

$router->get('blog/{id}', 'BlogController@view');

$router->get('404', 'PagesController@notFound');

$router->get('admin', 'Admin\DashboardController@index');

$router->get('admin/products', 'Admin\ProductsController@index');
$router->get('admin/products/create', 'Admin\ProductsController@create');
$router->post('admin/products/store', 'Admin\ProductsController@store');
$router->get('admin/products/edit/{id}', 'Admin\ProductsController@edit');
$router->post('admin/products/edit/{id}', 'Admin\ProductsController@edit');

$router->get('admin/products/delete/{id}', 'Admin\ProductsController@delete');
$router->post('admin/products/delete/{id}', 'Admin\ProductsController@delete');

$router->get('admin/products/show/{id}', 'Admin\ProductsController@show');

$router->get('admin/categories', 'Admin\CategoriesController@index');
$router->get('admin/categories/create', 'Admin\CategoriesController@create');
$router->post('admin/categories/create', 'Admin\CategoriesController@create');
$router->get('admin/categories/edit/{id}', 'Admin\CategoriesController@edit');
$router->post('admin/categories/edit/{id}', 'Admin\CategoriesController@edit');
$router->get('admin/categories/delete/{id}', 'Admin\CategoriesController@delete');
$router->post('admin/categories/delete/{id}', 'Admin\CategoriesController@delete');

$router->get('admin/posts', 'Admin\PostsController@index');
$router->get('admin/posts/create', 'Admin\PostsController@create');
$router->get('admin/posts/edit/{id}', 'Admin\PostsController@edit');
$router->get('admin/posts/delete/{id}', 'Admin\PostsController@delete');
$router->post('admin/posts/store', 'Admin\PostsController@store');
$router->post('admin/posts/update/{id}', 'Admin\PostsController@update');
$router->post('admin/posts/delete/{id}', 'Admin\PostsController@delete');

$router->get('api/shop', 'HomeController@getProduct');
