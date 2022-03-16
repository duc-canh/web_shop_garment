<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function list(){
        $contacts = Contact::paginate(10);
        return view('admin.contact.index',\compact('contacts'));
    }
}
