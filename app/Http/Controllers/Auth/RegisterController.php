<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'surname' => ['string', 'max:255'],
            'name' => ['string', 'max:255'],
            'relativesname' => ['string', 'max:255'],
            'aadhar_card_no' => ['required', 'digits:12'],
            'hno' => ['string', 'max:255'],
            'village' => ['string', 'max:255'],
            'taluka' => ['string', 'max:255'],
            'pincode' => ['numeric', 'digits:6'],
            'phone' => ['numeric'],
            'mobile' => ['numeric', 'digits:10'],
            'whatsapp' => ['numeric', 'digits:10'],
            'telegram' => ['numeric', 'digits:10'],
            'email' => ['string', 'email', 'max:255']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //'password' => Hash::make($data['password']),
        $password = Str::random(8);

        return User::create([
            'surname' => $data['surname'],
            'name' => $data['name'],
            'relatives_name' => $data['relativesname'],
            'aadhar_card_no' => $data['aadhar_card_no'],
            'address_street_hno' => $data['hno'],
            'address_village' => $data['village'],
            'address_taluka' => $data['taluka'],
            'address_district' => $data['district'],
            'address_state' => $data['state'],
            'address_country' => $data['country'],
            'address_pincode' => $data['pincode'],
            'phone' => $data['phone'],
            'mob_no' => $data['mobile'],
            'whatsapp_mob_no' => $data['whatsapp'],
            'telegram_mob_no' => $data['telegram'],
            'email' => $data['email'],
            'password' => $password,
        ]);
    }
}
