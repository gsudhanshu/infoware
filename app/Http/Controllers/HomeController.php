<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        return view('auth.register', compact('user'));
    }

    /**
     * 
     */
    public function save(Request $request) {
        \Log::error('before validation');
        app('App\Http\Controllers\Auth\RegisterController')->validator($request->all())->validate();
        
        \Log::error('validation complete, going to save information');

        $user = User::findOrFail($request->input("id"));

        $user->surname = $request->input('surname');
        $user->name = $request->input('name');
        $user->relatives_name = $request->input('relativesname');
        $user->aadhar_card_no = $request->input('aadhar_card_no');
        $user->address_street_hno = $request->input('hno');
        $user->address_village = $request->input('village');
        $user->address_taluka = $request->input('taluka');
        $user->address_district = $request->input('district');
        $user->address_state = $request->input('state');
        $user->address_country = $request->input('country');
        $user->address_pincode = $request->input('pincode');
        $user->phone = $request->input('phone');
        $user->mob_no = $request->input('mobile');
        $user->whatsapp_mob_no = $request->input('whatsapp');
        $user->telegram_mob_no = $request->input('telegram');
        $user->email = $request->input('email');
        $user->save();

        \Log::error('user information saved');
        $message = "User information saved successfully";
        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : view('auth.register', compact('user', 'message'));
    }

    /**
     * set locale value 
     */
    public function lang($locale) {
        \App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
