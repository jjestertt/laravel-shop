<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    //Функция вывода вьюхи товара
    public function show($category, $product_id)
    {
        $product = Product::where('id', $product_id)->first();

        return view('product.show', [
            'product' => $product
        ]);
    }

    //Функция выввода вьюхи категории
    public function showCategory(Request $request, $category_alias)
    {
        //Получаем нужную нам категорию из обязательного параметра в адрессной строке
        $category = ProductCategory::where('alias', $category_alias)->first();

        //Количество символов пагинации
        $paginate = 3;

        $products = Product::where('product_categories_id', $category->id)->paginate($paginate);

        //Проверяем есть ли в запросе данные о сортировке
        if (isset($request->orderBy)) {
            if ($request->orderBy == 'price-low-high') {
                $products = Product::where('product_categories_id', $category->id)
                    ->orderBy('price')->paginate($paginate);
            }
            if ($request->orderBy == 'price-high-low') {
                $products = Product::where('product_categories_id', $category->id)
                    ->orderBy('price', 'DESC')->paginate($paginate);
            }
            if ($request->orderBy == 'name-a-z') {
                $products = Product::where('product_categories_id', $category->id)
                    ->orderBy('title')->paginate($paginate);
            }
            if ($request->orderBy == 'name-z-a') {
                $products = Product::where('product_categories_id', $category->id)
                    ->orderBy('title', 'DESC')->paginate($paginate);
            }
        }

        //Если есть аякс запрос тогда мы можем отправить готовую разметку на фронтенд
        if ($request->ajax()) {
            return (view('ajax.order-by', ['products' => $products, 'params' => $request->all()])->render());
        }
//        dd($request->all());
        return (view('categories.index', ['req' => $request, 'category' => $category, 'products' => $products]));
    }
}
