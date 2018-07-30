<?php

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

$router->get('admin/roles', 'Admin\RolesController@index');
$router->get('admin/roles/create', 'Admin\RolesController@create');
$router->get('admin/roles/edit/{id}', 'Admin\RolesController@edit');
$router->get('admin/roles/delete/{id}', 'Admin\RolesController@delete');

$router->post('admin/roles/create', 'Admin\RolesController@create');
$router->post('admin/roles/edit/{id}', 'Admin\RolesController@edit');
$router->post('admin/roles/delete/{id}', 'Admin\RolesController@delete');

$router->get('admin/users', 'Admin\UsersController@index');
$router->get('admin/users/create', 'Admin\UsersController@create');
$router->post('admin/users/create', 'Admin\UsersController@create');

$router->get('admin/users/edit/{id}', 'Admin\UsersController@edit');
$router->post('admin/users/edit/{id}', 'Admin\UsersController@edit');

$router->get('admin/users/delete/{id}', 'Admin\UsersController@delete');
$router->post('admin/users/delete/{id}', 'Admin\UsersController@delete');

$router->get('register', 'UsersController@signup');
$router->post('register', 'UsersController@signup');

$router->get('login', 'UsersController@login');
$router->post('login', 'UsersController@login');

$router->get('logout', 'UsersController@logout');
$router->post('logout', 'UsersController@logout');

$router->get('api/shop', 'HomeController@getProduct');
