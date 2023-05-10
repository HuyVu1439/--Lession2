<?php

require 'Controllers/CategoryController.php';
require 'Controllers/ProductController.php';

$action = $_GET['action'] ?? 'index';

switch($action) {
    case 'index':
    case 'store':
    case 'edit':
    case 'update':
    case 'delete':
        (new CategoryController())->$action();
        break;
    case 'productIndex':
        (new ProductController())->productIndex();
        break;
    case 'productStore':
        (new ProductController())->productStore();
        break;
    case 'productEdit':
        (new ProductController())->productEdit();
        break;
    case 'productUpdate':
        (new ProductController())->productUpdate();
        break;
    case 'productDelete':
        (new ProductController())->productDelete();
        break;
    default:
        echo "Action not found";
        break;
}
