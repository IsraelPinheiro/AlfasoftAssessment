<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        if(Auth::user()->profile->contacts_create){
            return view('pages.contacts.new');
        }
        else{
            abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if(Auth::user()->profile->contacts_create){
            $request->validate([
                'Name' => 'bail|required|min:5|string',
                'Contact' => 'bail|required|numeric|digits:9|unique:contacts,contact',
                'Email' => 'bail|required|email|unique:contacts,email',
                
            ]);
            $contact = new Contact;
            $contact->name = $request->Name;
            $contact->contact = $request->Contact;
            $contact->email = $request->Email;
            $contact->created_by = Auth::user()->id;
            $contact->save();
            return response()->json(['message' => __('Contact Created')],200);
        }
        else{
            abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact){
        $contact = Contact::find($contact->id);
        return view('pages.contacts.show', compact('contact')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact){
        if(Auth::user()->profile->contacts_update){
            $contact = Contact::find($contact->id);
            return view('pages.contacts.edit', compact('contact'));
        }
        else{
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact){
        if(Auth::user()->profile->contacts_update){
            $contact = Contact::find($contact->id);
            if($contact){
                $request->validate([
                    'Name' => 'bail|required|min:5|string',
                    'Contact' => 'bail|required|numeric|digits:9|unique:contacts,contact,'.$contact->id,
                    'Email' => 'bail|required|email|unique:contacts,email,'.$contact->id,
                ]);
                $contact->name = $request->Name;
                $contact->contact = $request->Contact;
                $contact->email = $request->Email;
                $contact->updated_by = Auth::user()->id;
                $contact->save();
                return response()->json(['level' => 'success','message' => 'Contact Updated'],200);
            }
            else{
                return response()->json(['message' => 'Contact not Found'],404);
            }
        }
        else{
            abort(401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact){
        if(Auth::user()->profile->contacts_delete){
            $contact = Contact::find($contact->id);
            if($contact){
                $contact->delete();
                return response()->json(['level' => 'success','message' => 'Contact Deleted'],200);
            }
            else{
                return response()->json(['message' => 'Contact not found'],404);
            }
        }
        else{
            abort(401);
        }
    }
}
