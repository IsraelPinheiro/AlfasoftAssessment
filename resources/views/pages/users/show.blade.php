@extends('layouts.modal-noactions')
@section('title',__('Show User - '.$user->name))
@section('content')
	<form id="FormModal">
		@csrf
        {{-- Name and Email --}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="Name">{{__('Name')}}</label>
					<input name="Name" type="text" class="form-control" autocomplete="off" value="{{$user->name}}" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="Email">{{__('Email')}}</label>
					<input name="Email" type="email" class="form-control" autocomplete="off" value="{{$user->email}}" disabled>
				</div>
			</div>
		</div>
        {{-- Profile and Status --}}
		<div class="row">
            <div class="col-md-6">
				<div class="form-group">
					<label for="Profile">{{__('Profile')}}</label>
					<input name="Profile" type="text" class="form-control" autocomplete="off" value="{{$user->profile->name}}" disabled>
				</div>
			</div>
            <div class="col-md-6">
				<div class="form-group">
					<label for="Status">{{__('Status')}}</label>
					<input name="Status" type="text" class="form-control" autocomplete="off" value="@if($user->active) Active @else Inactive @endif" disabled>
				</div>
			</div>
		</div>
	</form>
@stop