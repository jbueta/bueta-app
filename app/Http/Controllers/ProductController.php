<?php

namespace App\Http\Controllers;
use App\Services\ProductService;
use App\Services\TaskService;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService) {
        $this->taskService = $taskService;
    }

    public function index(ProductService $productService) {
        $newProduct = [
            'id' => 4,
            'name' => 'Notebook',
            'category' => 'School Supplies'
        ];
        $productService->insert($newProduct);

        $this->taskService->add('Add to cart');
        $this->taskService->add('Checkout');

        $data = [
            'products' => $productService->listProducts(),
            'tasks' => $this->taskService->getAllTasks()
         ];

        return view('products.index', $data);
    }

    function show(ProductService $productService, $id) {
        $product = collect($productService->listProducts())->filter(function ($item) use ($id) {
            return $item['id'] == $id;
        })->first();
        
        return $product;
    }
}