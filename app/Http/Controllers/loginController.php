<?php


use Illuminate\Routing\Controller as BaseController;
use Tests\TestCase;

class loginController extends BaseController
{
    public function loginGet(){
        
        if ((session('user_id')) !== null || (Cookie::get('woothiery_user_id') && Cookie::get('woothiery_token'))){ 
            if((Cookie::get('woothiery_user_id') && Cookie::get('woothiery_token'))){
                Session::put('user_id', Cookie::get('woothiery_user_id'));
            }
            return redirect ('shop');
        }
        else{
            $old_username = Request::old('username');
            return view('loginPage')
                ->with('csrf_token', csrf_token())
                ->with('old_username', $old_username); 
        }
    }

    public function loginPost(){
        $user = User::where('username', request('username'))->first();
        if(isset($user) && Hash::check(request('password'), $user->password)){
            Session::put('user_id', $user->id);
            
            if(!empty(request('remember'))){
                
                $hash = Hash::make(random_bytes(12));
                $userId = $user->id;
                $expires = 1440;

                Cookie::queue('woothiery_user_id', $userId, $expires);
                Cookie::queue('woothiery_token', $hash, $expires);
            }
            return redirect ('shop')
                ->with('user', $user);
        }else {
            return redirect ('login')
                ->withInput();
        }
    }
}
