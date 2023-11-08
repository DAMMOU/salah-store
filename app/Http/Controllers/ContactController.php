<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Mail\ContactFormEmail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index(){
        return view('user.contact-us.index');
    }
    

    public function saveAndSendMail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|max:255',
            'message' => 'required',
        ]);
    
        // Créez un nouveau message dans la base de données
        $mailData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
            'url' => 'ddddddd',
        ];
    
        try {
            // Envoyez l'e-mail
            Mail::to(config('mail.from.address'))->send(new ContactFormEmail($mailData));
    
            // Vérifiez si l'envoi de l'e-mail a réussi
            if (Mail::failures()) {
                return redirect('contact-us')->with('error', 'L\'envoi de l\'e-mail a échoué, veuillez réessayer.');
            }
        } catch (\Exception $e) {
            return redirect('contact-us')->with('error', "Les paramètres SMTP n'ont pas encore été configurés, veuillez contacter l'équipe de support. " . $e->getMessage());
        }
    
        return redirect('contact-us')->with('success', 'L\'e-mail a été enregistré et envoyé avec succès');
    }
    
}
