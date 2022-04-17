<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function changePassword(){
        return view('account.change-password');
    }

    public function updatePassword(Request $request){


        $user = User::find(auth()->id());

        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect('change-password')->withErrors(['msg' => 'Błędne hasło!']);
        }


        $data = $request->all();
        $validator = Validator::make($data, [
                'password' => 'required',
                'newPassword' =>  'required|min:7|max:16|confirmed',
                'RepeatNewPassword.*" => "required|same:newPassword',
            ]
        );

        if ($validator->fails()) {
            return redirect('change-password')->withErrors(['msg' => $validator->errors()->all()]);
        }

        try {
            $user->update([
                'password' => bcrypt($request->newPassword),
            ]);
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('change-password')->with('status', 'Błąd zmiany hasła!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return redirect('change-password')->with('status', 'Hasło zostało zmienione. Przy ponownym logowaniu użyj nowego hasła.');

    }
}
