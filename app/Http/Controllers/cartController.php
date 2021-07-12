<?php


use Illuminate\Routing\Controller as BaseController;

class cartController extends BaseController
{
    public function cartProducts(){
        
       $cartProducts = Cartitem::select('productId', DB::raw('COUNT(productId) AS quantity'))
                                    ->where('cartID', function($query){
                                        $query->select('id')
                                                ->from('shoppingCarts')
                                                ->where('userID', function($query2){
                                                    $query2->select('id')
                                                    ->from('users')
                                                    ->where('id', session('user_id'));
                                                });
                                    })
                        ->groupBy('productId')
                            ->get();
        
        return json_encode($cartProducts);
    }

    public function addToCart(){

        $productId = request('productId');
        $cartId = Shoppingcart::select('id')->where('userID', session('user_id'))->first();

        $addProduct = new Cartitem;
            $addProduct->productId = $productId;
            $addProduct->cartId = $cartId->id;
        $addProduct->save();

        $availability = DB::select("SELECT json_extract(product, '$.availability') AS quantity FROM products WHERE id = $productId");

        $returndata = array('ok' => true, 'availability' => $availability[0]->quantity, 'productid' => $productId);

        return json_encode($returndata);
    }

    public function removeFromCart(){

        $productId = request('cartProductId');
        $cartId = Shoppingcart::select('id')->where('userID', session('user_id'))->first();

        $removeProduct = Cartitem::find((Cartitem::select('id')->where('cartID', $cartId->id)->where('productId', $productId)->first())->id);
        $removeProduct->delete();

        $availability = DB::select("SELECT json_extract(product, '$.availability') AS quantity FROM products WHERE id = $productId");

        $returndata = array('ok' => true, 'availability' => $availability[0]->quantity, 'productid' => $productId);

        return json_encode($returndata);

    }
}
