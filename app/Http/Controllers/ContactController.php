<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function store(Request $request)
    {
        // Validez les données entrées par l'utilisateur 
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numbre',
            'message' => 'required',
            // Autres règles de validation...
        ]);

        // Créez une nouvelle instance du modèle Contact avec les données du formulaire
        $contact = new Message([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);

        // Sauvegardez le message dans la base de données
        $contact->save();

        // Redirigez l'utilisateur vers une page de contact-us
        return redirect('/contact-us')->with('success', 'Message envoyé avec succès');
    }

}
