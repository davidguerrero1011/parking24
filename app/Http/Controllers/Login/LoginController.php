<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\ValidateLoginRequest;
use App\Models\Cities;
use App\Models\Roles;
use App\Models\Sesions;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    public function __construct() {}

    public function index()
    {
        return view('Login.login');
    }

    public function validateLogin(ValidateLoginRequest $request)
    {

        $validated = $request->validated();
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $session = new Sesions();
            $session->user_id    = Auth::user()->id;
            $session->start_date = date('Y-m-d H:i:s');
            $session->end_date   = null;
            $session->token      = Str::uuid();
            $session->state      = '1';
            $session->save();

            return redirect()->intended('home')->with('message', 'Usted acaba de ingresar de manera exitosa, bienvenido!!');
        }

        return redirect()->intended('/')->with('message', 'Algo fallo con sus credenciales de ingreso, por favor verifique e intentelo nuevamente');
    }


    public function store(StoreUsersRequest $request)
    {

        $validate = $request->validated();
        $city = Cities::where('city', 'Bogota')->first();
        $role = Roles::where('role', 'Cliente')->first();

        $newUser = new User();
        $newUser->name            = $validate["userName"];
        $newUser->last_name       = $validate["userLastName"];
        $newUser->address         = null;
        $newUser->neightboardhood = null;
        $newUser->city_id         = $city->id;
        $newUser->cellphone       = null;
        $newUser->email           = $validate["userEmail"];
        $newUser->password        = bcrypt('1234567890');
        $newUser->role_id         = $role->id;
        $newUser->state           = '2';
        $newUser->save();

        // Mail::to($request->userEmail)->send(new CreationUserMailable($request->userName. ' '. $request->userLastName, $request->userEmail));
        return redirect()->intended('/')->with('message', 'Su solicitud para crear el usuario quedo pendiente, en unos dias se le activara completamente su usuario, y se le avisara por correo las credenciales de ingreso');
    }


    public function validatePassword(Request $request)
    {

        // $validated = $request->validated();
        try {
            $updatePassword = User::where('email', $request->email)->get();
            if (count($updatePassword) > 0) {
                $response = ["success", $updatePassword[0]->id];
            } else {
                $response = ["warning"];
            }
        } catch (Exception $e) {
            Log::info("error" . $e);
            $response = ["error"];
        }

        return response()->json($response);
    }


    public function updatePassword(Request $request)
    {
        $password = bcrypt($request->newPassword);
        $changePassword = User::find($request->userId);
        $changePassword->password = $password;
        $changePassword->save();
    }
}