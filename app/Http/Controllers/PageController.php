<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $sliders = Slider::all();
        return view('frontend.index')->with(['products'=>$products, 'categories' => $categories, 'sliders' => $sliders]);
    }

    public function catalogue($id)
    {
        $products = Product::all()->where('category_id', '=', $id);
        $categories = Category::all();

        return view('frontend.catalogue')->with(['products'=>$products, 'categories' => $categories]);
    }

    public function product($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('frontend.product')->with(['product'=>$product, 'categories' => $categories]);
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function tos()
    {
        return view('frontend.tos');
    }

    public function contact()
    {
        return view('frontend.contact');

    }

    public function gocheckout()
    {
        return redirect()->route('customer.payment');

    }

}
