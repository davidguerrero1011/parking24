<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsersRequest;
use App\Models\Cities;
use App\Models\Roles;
use App\Models\Sesions;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.Home.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function logOut(Request $request)
    {

        Sesions::where([['user_id', Auth::user()->id], ['state', '1']])->update(['end_date' => date('Y-m-d H:i:s'), 'token' => null, 'state' => '0']);
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Gracias por haber estado en nuestro sitio, por favor vuelva pronto.');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreUsersRequest $request)
    // {

    //     $validate = $request->validated();
    //     $city = Cities::where('city', 'Bogota')->first();
    //     $role = Roles::where('role', 'Cliente')->first();

    //     $newUser = new User(); 
    //     $newUser->name            = $validate["userName"]; 
    //     $newUser->last_name       = $validate["userLastName"]; 
    //     $newUser->address         = null; 
    //     $newUser->neightboardhood = null; 
    //     $newUser->city_id         = $city->id; 
    //     $newUser->cellphone       = null; 
    //     $newUser->email           = $validate["userEmail"]; 
    //     $newUser->password        = bcrypt('1234567890'); 
    //     $newUser->role_id         = $role->id; 
    //     $newUser->state           = '2'; 
    //     $newUser->save();

    //     // Mail::to($request->userEmail)->send(new CreationUserMailable($request->userName. ' '. $request->userLastName, $request->userEmail));
    //     return redirect()->intended('/')->with('message', 'Su solicitud para crear el usuario quedo pendiente, en unos dias se le activara completamente su usuario, y se le avisara por correo las credenciales de ingreso');
    // }

    /**
     * Display the specified resource.
     */
    public function changePassword() {}

    /**
     * Show the form for editing the specified resource.
     */
    // public function validatePassword(Request $request)
    // {  

    //     // $validated = $request->validated();
    //     try {
    //         $updatePassword = User::where('email', $request->email)->get();
    //         if(count($updatePassword) > 0) {
    //             $response = ["success", $updatePassword[0]->id];
    //         } else {
    //             $response = ["warning"];
    //         }
    //     } catch (Exception $e) {
    //         Log::info("error". $e);
    //         $response = ["error"];
    //     }

    //     return response()->json($response);
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function updatePassword(Request $request)
    // {
    //     $password = bcrypt($request->newPassword);
    //     $changePassword = User::find($request->userId);
    //     $changePassword->password = $password;
    //     $changePassword->save(); 
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}