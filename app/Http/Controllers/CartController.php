<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Http\View\Composers\CartComposer;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

use App\Models\Customer;

class CartController extends Controller
{
   protected $cartService;
   
   public  function __construct (CartService $cartService)
   {
    $this->cartService=$cartService;
   }
   public function index(Request $request)
   {

    $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }

        return redirect('/carts');
    }
    public function show()
    {
        $products = $this->cartService->getProduct();

        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function update(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/carts');
    }
    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }
   public function addCart(Request $request){
    
     $this->cartService->addCart($request);


     return redirect()->back();

   }

   

}
