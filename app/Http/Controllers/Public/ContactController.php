<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('public.contact');
    }

    public function sendContact(ContactRequest $request)
    {
        $validated = $request->validated();

        Mail::to('megamax3737@gmail.com', 'Etrain')->send(new Contact($validated));
    }
}
