<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Модель продуктов->отсортировать по дате создания
        //                  ->взять 8 штук->получить
        $products = Product::orderBy('created_at')->take(8)->get();
        //Данные во вьюху передаются как правило 2м параметром
        // в ассациотивном массиве

        return view('home.index', [
            'products' => $products
        ]);
    }
}
