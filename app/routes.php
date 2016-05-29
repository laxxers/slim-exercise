<?php
// Routes
use App\Model\Product;

$app->get('/admin', function($request, $response, $args) use ($app) {
  return $response->withRedirect($request->getUri()->withPath('admin/products'));
})->setName('admin');

$app->get('/admin/products', 'App\Action\AdminAction:products')->setName('products');
$app->get('/admin/contacts', 'App\Action\AdminAction:contacts')->setName('contacts');
