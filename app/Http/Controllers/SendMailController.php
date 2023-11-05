<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use Illuminate\Http\Request;
use App\Mail\SeedMail;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public $isValid = false;
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(StoreMessageRequest $request)
    {   
        // Récupérez les données du formulaire
        $formData = $request->only(['name', 'email', 'phone', 'message']);
        
        // Enregistrez le message dans la base de données
        Message::create($formData);

        // Préparez les données pour l'e-mail
        $mailData = [
            'name' => $formData['name'],
            'email' => $formData['email'],
            'phone' => $formData['phone'],
            'message' => $formData['message'],
            'url' => "https://lafac.net",
        ];

        // Envoyez l'e-mail
        Mail::to('udammou@gmail.com')->send(new SeedMail($mailData));

        return redirect('/contact-us#contact')->with('success', 'E-mail sent and saved successfully!');
    }

}
