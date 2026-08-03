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

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:new,read,answered'
        ]);

        $contact->update([
            'status' => $request->status
        ]);

        return back()
            ->with('success', 'Status updated.');
    }
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Message deleted successfully.');
    }
}