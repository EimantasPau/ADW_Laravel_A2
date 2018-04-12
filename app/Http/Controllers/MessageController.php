<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::all();
        return view('contact.index', compact('messages'));
    }

    public function create() {
        return view('contact.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'body' => 'required'
        ]);

        Message::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'body' => $request->input('body'),
        ]);

        Session::flash('successMessage', 'Your message has been successfully sent!');
        return redirect()->route('contact.create');
    }

    public function destroy($id) {
        Message::destroy($id);
        Session::flash('successMessage', 'Message has been deleted.');
        return redirect()->route('contact.index');
    }

    public function show($id) {
        $message = Message::find($id);
        return view('contact.show', compact('message'));
    }
}
