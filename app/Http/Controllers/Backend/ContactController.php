<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function Contact() {
        $contact = Contact::latest()->get();
        return view('backend.contact.all_contacts', compact('contact'));
    }

    // Contact API
    public function ApiContact(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'email' => 'required|email|max:255',           
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Contact::create($request->all());
        return response()->json(['message' => 'Contact sent successfully'], 201);
    }

}
