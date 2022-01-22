<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(Auth::user()->profile->profiles_read){
            $profiles = Profile::all();
            return view('pages.profiles.index',compact('profiles'));
        }
        else{
            abort(401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        if(Auth::user()->profile->profiles_create){
            return view('pages.profiles.new');
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
        if(Auth::user()->profile->profiles_create){
            $request->validate([
                'Name' => 'bail|required|min:3|string|unique:profiles',
            ]);
            $profile = new Profile;
            $profile->name = $request->Name;
            $profile->description = $request->Description;
            $profile->contacts_create = $request->contacts_create ? 1:0;
            $profile->contacts_update = $request->contacts_update ? 1:0;
            $profile->contacts_delete = $request->contacts_delete ? 1:0;
            $profile->users_create = $request->users_create ? 1:0;
            $profile->users_read = $request->users_read ? 1:0;
            $profile->users_update = $request->users_update ? 1:0;
            $profile->users_delete = $request->users_delete ? 1:0;
            $profile->profiles_create = $request->profiles_create ? 1:0;
            $profile->profiles_read = $request->profiles_read ? 1:0;
            $profile->profiles_update = $request->profiles_update ? 1:0;
            $profile->profiles_delete = $request->profiles_delete ? 1:0;
            $profile->created_by = Auth::user()->id;
            $profile->save();
            return response()->json(['message' => __('Profile Created')],200);
        }
        else{
            abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile){
        if(Auth::user()->profile->profiles_read){
            $profile = Profile::find($profile->id);
            return view('pages.profiles.show', compact('profile'));
        }
        else{
            abort(401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile){
        if(Auth::user()->profile->profiles_update){
            $profile = Profile::find($profile->id);
            return view('pages.profiles.edit', compact('profile'));
        }
        else{
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile){
        if(Auth::user()->profile->profiles_create){
            $profile = Profile::find($profile->id);
            if($profile){
                $request->validate([
                    'Name' => 'bail|required|min:3|string|unique:profiles,'.$profile->id
                ]);
                $profile = new Profile;
                $profile->name = $request->Name;
                $profile->description = $request->Description;
                $profile->contacts_create = $request->contacts_create ? 1:0;
                $profile->contacts_update = $request->contacts_update ? 1:0;
                $profile->contacts_delete = $request->contacts_delete ? 1:0;
                $profile->users_create = $request->users_create ? 1:0;
                $profile->users_read = $request->users_read ? 1:0;
                $profile->users_update = $request->users_update ? 1:0;
                $profile->users_delete = $request->users_delete ? 1:0;
                $profile->profiles_create = $request->profiles_create ? 1:0;
                $profile->profiles_read = $request->profiles_read ? 1:0;
                $profile->profiles_update = $request->profiles_update ? 1:0;
                $profile->profiles_delete = $request->profiles_delete ? 1:0;
                $profile->created_by = Auth::user()->id;
                $profile->updated_by = Auth::user()->id;
                $profile->save();
                return response()->json(['level' => 'success','message' => 'Profile Updated'],200);
            }
            else{
                return response()->json(['message' => 'Profile not Found'],404);
            }
        }
        else{
            abort(401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile){
        if(Auth::user()->profile->profiles_delete){
            $profile = Profile::find($profile->id);
            if($profile){
                $profile->delete();
                return response()->json(['level' => 'success','message' => 'Profile Deleted'],200);
            }
            else{
                return response()->json(['message' => 'Profile not found'],404);
            }
        }
        else{
            abort(401);
        }
    }
}
