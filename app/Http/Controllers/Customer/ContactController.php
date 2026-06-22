<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function create()
    {
        return view('customer.contacts.index');
    }

    public function store(ContactRequest $request)
    {
        Contact::create(
            $request->validated()
        );

        return back()->with(
            'success',
            'Votre message a été envoyé.'
        );
    }
}