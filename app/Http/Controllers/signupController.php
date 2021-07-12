<?php


use Illuminate\Routing\Controller as BaseController;

class signupController extends BaseController
{
    public function signup(){
        return view('signUpPage')
            ->with('csrf_token', csrf_token());
    }

    public function signupPost(){
        
        $user = new User;

            $user->username = request('username');
            $user->password = Hash::make(request('password')); 
            $user->email = request('email');
            $user->name = request('name');
            $user->surname = request('surname');
            $user->district = request('district');
            $user->city =  request('city');
            $user->CAPcode = request('CAPcode');
            $user->street1 = request('street1');
            $user->street2 = request('street2');

        $user->save();

        if(isset($user)){
            Session::put('user_id', $user->id);
            return redirect ('shop')
                ->with('user', $user);
        }else {
            return redirect ('login')
                ->withInput();
        }
    }

    public function checkUsername($toCheck){
        
        $username = User::select('username')->where('username', trim($toCheck,'{}'))->count();

        if($username != 0){

        $response = array(
                'exists' => true
        );   
        }else{
            $response = array(
                'exists' => false
            );
        }
        return json_encode($response);
    }

    public function checkEmail($toCheck){
        
        $email = User::select('email')->where('email', trim($toCheck,'{}'))->count();

        if($email != 0){

        $response = array(
                'exists' => true
        );   
        }else{
            $response = array(
                'exists' => false
            );
        }
        return json_encode($response);
    }
}
