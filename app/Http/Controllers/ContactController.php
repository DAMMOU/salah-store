<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(){
        return view('user.contact-us.index');
    }
    
    public function store(StoreMessageRequest $request)
    {
        // Validez les données entrées par l'utilisateur 
        $request->validated();

      
        // Créez une nouvelle instance du modèle Contact avec les données du formulaire
        $message = Message::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);

        
        // Redirigez l'utilisateur vers une page de contact-us
        return redirect('/contact-us')->with('success', 'Message envoyé avec succès');
    }

}
