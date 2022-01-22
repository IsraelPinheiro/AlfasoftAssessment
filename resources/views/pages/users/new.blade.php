@extends('layouts.modal')
@section('title',__('New User'))
@section('content')
	<form id="FormModal">
		@csrf
        {{-- Name and Email --}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="Name">{{__('Name')}}</label>
					<input name="Name" type="text" class="form-control" autocomplete="off" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="Email">{{__('Email')}}</label>
					<input name="Email" type="email" class="form-control" autocomplete="off" required>
				</div>
			</div>
		</div>
        {{-- Profile and Default Role --}}
		<div class="row">
			<div class="col-md-6">
                <div class="form-group">
                    <label for="Profile">{{__('Perfil')}}</label>
                    <select name="Profile" class="form-control">
                        <option selected disabled>{{__('Select a Profile')}}</option>
                        @foreach ($profiles as $profile)
                            <option value="{{$profile->id}}">{{$profile->name}}</option>
                        @endforeach
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
	<button type="submit" class="btn btn-primary btn-users-store">{{__('Save')}}</button>
@stop