<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(Auth::user()->profile->users_read){
            $users = User::all();
            return view('pages.users.index',compact('users'));
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
        if(Auth::user()->profile->users_create){
            $profiles = Profile::all();
            return view('pages.users.new', compact('profiles'));
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
        if(Auth::user()->profile->users_create){
            $request->validate([
                'Name' => 'bail|required|min:3|string',
                'Email' => 'bail|required|email|unique:users,email',
                'Profile' => 'bail|required',
                'Password' => 'bail|required|min:6|confirmed'
            ]);
            $user = new User;
            $user->name = $request->Name;
            $user->email = $request->Email;
            $user->profile_id = $request->Profile;
            $user->password = Hash::make($request->Password);
            $user->created_by = Auth::user()->id;
            $user->save();
            return response()->json(['message' => __('User Created')],200);
        }
        else{
            abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        if(Auth::user()->profile->users_read){
            $user = User::find($id);
            return view('pages.users.show', compact('user'));
        }
        else{
            abort(401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        if(Auth::user()->profile->users_update){
            $user = User::find($id);
            $profiles = Profile::all();
            return view('pages.users.edit', compact('user','profiles'));
        }
        else{
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        if(Auth::user()->profile->users_update){
            $user = User::find($id);
            if($user){
                $request->validate([
                    'Name' => 'bail|required|min:3|string',
                    'Email' => 'bail|required|email|unique:users,email,'.$user->id,
                    'Password' => 'sometimes|nullable|min:6|confirmed'
                ]);
                $user->name = $request->Name;
                $user->email = $request->Email;
                $user->profile_id = $request->Profile;
                $user->active = $request->Status;
                if($request->Password!=''){
                    $user->password = Hash::make($request->Password);
                }
                $user->updated_by = Auth::user()->id;
                $user->save();
                return response()->json(['level' => 'success','message' => 'User Updated'],200);
            }
            else{
                return response()->json(['message' => 'User not Found'],404);
            }
        }
        else{
            abort(401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if(Auth::user()->profile->users_update){
            $user = User::find($id);
            if($user){
                if(Auth::user()->id!=$user->id){
                    $user->delete();
                    return response()->json(['level' => 'success','message' => 'User Deleted'],200);
                }
                else{
                    return response()->json(['message' => "The currently logged in User can't be deleted"],403);
                }
            }
            else{
                return response()->json(['message' => 'User not found'],404);
            }
        }
        else{
            abort(401);
        }
    }
}
