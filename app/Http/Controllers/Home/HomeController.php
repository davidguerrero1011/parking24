<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsersRequest;
use App\Models\Cities;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

        return redirect()->intended('/')->with('message', 'Su solicitud para crear el usuario quedo pendiente, en unos dias se le activara completamente su usuario, y se le avisara por correo las credenciales de ingreso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
