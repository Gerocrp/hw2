<?php

use Illuminate\Database\Eloquent\Model;

class Shoppingcart extends Model{
   public $timestamps = false;

   public function owned(){
       return $this->belongsTo("User", "userID");
   }

   public function contains(){
       return $this->hasMany("Cartitems". "cartID");
   }
}

?>