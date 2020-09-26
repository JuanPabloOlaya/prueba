<?php

namespace Kumasagati\Prueba\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kumasagati\Prueba\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('kumasagati.prueba.view', compact('products'));
    }
}
