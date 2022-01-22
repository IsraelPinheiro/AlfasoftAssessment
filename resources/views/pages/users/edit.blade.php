@extends('layouts.modal')
@section('title',__('Edit User - '.$user->name))
@section('content')
	<form id="FormModal">
		@csrf
        {{-- Name and Email --}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="Name">{{__('Name')}}</label>
					<input name="Name" type="text" class="form-control" autocomplete="off" value="{{$user->name}}" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="Email">{{__('Email')}}</label>
					<input name="Email" type="email" class="form-control" autocomplete="off" value="{{$user->email}}" required>
				</div>
			</div>
		</div>
        {{-- Profile and Status --}}
		<div class="row">
			<div class="col-md-6">
                <div class="form-group">
                    <label for="Profile">{{__('Profile')}}</label>
                    <select name="Profile" class="form-control">
                        <option selected disabled>{{__('Select a Profile')}}</option>
                        @foreach ($profiles as $profile)
                            <option value="{{$profile->id}}" @if($profile->id == $user->profile->id) selected @endif>{{$profile->name}}</option>
                        @endforeach
                    </select>
                </div>
			</div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Status">{{__('User Status')}}</label>
                    <select name="Status" class="form-control">
                        <option value="1" @if($user->active) selected @endif>Active</option>
                        <option value="0" @if($user->active) @else selected @endif>Inactive</option>
                    </select>
                </div>
			</div>
		</div>
        {{-- Password and Confirmation  --}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="Password">{{__('Password')}}</label>
					<input name="Password" id="Password" type="password" class="form-control" minlength="6" autocomplete="off"required >
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="Password_confirmation">{{__('Confirm Password')}}</label>
					<input name="Password_confirmation" id="Password_confirmation" type="password" class="form-control" autocomplete="off" required>
				</div>
			</div>
		</div>
	</form>
@stop
@section('actions')
	<button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
	<button type="submit" class="btn btn-primary btn-users-update" data-id={{$user->id}}>{{__('Save')}}</button>
@stop