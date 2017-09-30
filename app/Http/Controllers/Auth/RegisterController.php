<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = 'todolists';

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
    protected function validator(array $data)
    {
        $messages = [
            'email.required'=>'آدرس ایمیل باید وارد شود',
            'email.string'=>'آدرس ایمیل باید رشته از حروف و اعداد باشد.',
            'email.max'=>'آدرس ایمیل حداکثر باید 255 کاراکتر باشد.',
            'email.unique'=>'آدرس ایمیل قبلا در سیستم ثبت شده است!',
            'name.required'=>'نام باید وارد شود',
            'name.string'=>'نام باید رشته از حروف و اعداد باشد.',
            'name.max'=>'نام حداکثر باید 255 کاراکتر باشد.',
            'password.required'=>'کلمه عبور باید وارد شود',
            'password.string'=>'کلمه عبور باید رشته از حروف و اعداد باشد.',
            'password.min'=>'کلمه عبور حداقل باید 6 کاراکتر باشد.',
            'password.confirmed'=>'کلمه عبور با تایید آن برابر نمی باشد!',
        ];
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
