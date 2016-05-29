<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\Product;

final class AdminAction {
  private $view;
  private $logger;

  public function __construct(Twig $view, LoggerInterface $logger) {
    $this->view = $view;
    $this->logger = $logger;
  }

  public function products(Request $request, Response $response, $args) {
    $products = Product::all();
    $this->view->render($response, 'admin.twig', [
      'active' => 'products',
      'products' => $products
    ]);

    return $response;
  }

  public function contacts(Request $request, Response $response, $args) {
    $this->view->render($response, 'contacts.twig', []);

    return $response;
  }
}
