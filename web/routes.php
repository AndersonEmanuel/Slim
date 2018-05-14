<?php

$app->any('/category[/{id:[0-9]+}]', \Application\Http\Controller\CategoryController::class);
$app->any('/company[/{id:[0-9]+}]', \Application\Http\Controller\CompanyController::class);
$app->any('/customer[/{id:[0-9]+}]', \Application\Http\Controller\CustomerController::class);
$app->any('/group[/{id:[0-9]+}]', \Application\Http\Controller\GroupController::class);
$app->any('/log[/{id:[0-9]+}]', \Application\Http\Controller\LogController::class);
$app->any('/paymenttype[/{id:[0-9]+}]', \Application\Http\Controller\PaymentTypeController::class);
$app->any('/price[/{id:[0-9]+}]', \Application\Http\Controller\PriceController::class);
$app->any('/product[/{id:[0-9]+}]', \Application\Http\Controller\ProductController::class);
$app->any('/provider[/{id:[0-9]+}]', \Application\Http\Controller\ProviderController::class);
$app->any('/sale[/{id:[0-9]+}]', \Application\Http\Controller\SaleController::class);
$app->any('/stock[/{id:[0-9]+}]', \Application\Http\Controller\StockController::class);
$app->any('/user[/{id:[0-9]+}]', \Application\Http\Controller\UserController::class);

$app->post('/login', \Application\Http\Controller\LoginController::class);
$app->post('/register', \Application\Http\Controller\RegisterController::class);