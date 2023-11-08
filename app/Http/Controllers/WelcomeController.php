<?php

namespace App\Http\Controllers;

use App\Mail\ProfileMail;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
    /**
     * Show the welcome page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $mailData = [
            'name' => 'Youssad',
            'phone' =>  'Youssad',
            'message' =>  'Youssad',
            'email' => 'udammou@gmail.com',
            'url' => 'https://lafac.net',
        ];      
        Mail::to("lafac@lafac.net")->send(new ProfileMail($mailData));

        $categories = Category::all();
        $products = Product::all();
        
        return view('user.index', compact('categories', 'products'));
    }
}
