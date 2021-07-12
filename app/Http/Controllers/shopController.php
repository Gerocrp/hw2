<?php


use Illuminate\Routing\Controller as BaseController;

class shopController extends BaseController
{
    public function shop(){
        $user = User::find(session('user_id'));
        
        if($user){
            return view('shopPage')->with('user', $user)->with('csrf_token', csrf_token());
        }else{
            return view('shopPage');
        }
    }

    public function makeShopping(){
        $user = User::find(session('user_id'));

        if($user){
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
            
            
            $totalPrice = 0;

            foreach($cartProducts as $cartProduct){
                $array = DB::select("SELECT json_extract(product, '$.price') AS price FROM products WHERE id LIKE $cartProduct->productId");
                $totalPrice +=  ($array[0]->price * $cartProduct->quantity);
            }

            $shopping = new Shopping;
                    $shopping->userID = session('user_id');
                    $shopping->itemList = json_encode($cartProducts);
                    $shopping->totalPrice = $totalPrice;
            $shopping->save();

            return json_encode($shopping);
        }else return null;
    }

    public function shoppings(){

        $shoppings = Shopping::where('userID', session('user_id'))->get();
        print_r(json_encode($shoppings));
        return json_encode($shoppings);
    }
}
