<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Controllers\Controller;

class AdminContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()
            ->paginate(10);

        return view(
            'admin.contacts.index',
            compact('contacts')
        );
    }

    public function show(Contact $contact)
    {
        return view(
            'admin.contacts.show',
            compact('contact')
        );
    }

    public function update(Contact $contact)
{
    // toggle simple de statut
    if ($contact->status === 'new') {
        $contact->status = 'read';
    } elseif ($contact->status === 'read') {
        $contact->status = 'answered';
    }

    $contact->save();

    return redirect()
        ->route('admin.contacts.index')
        ->with('success', 'Status updated successfully.');
}
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Message deleted successfully.');
    }
}