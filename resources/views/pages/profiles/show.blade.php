@extends('layouts.modal-noactions')
@section('title',__('Show Profile '.$profile->name))
@section('content')
	<form id="FormModal">
		@csrf
        {{-- Name --}}
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="Name">Name</label>
					<input name="Name" type="text" class="form-control" value="{{$profile->name}}" disabled>
				</div>
			</div>
		</div>
		{{-- Description --}}
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="Description">Description</label>
					<textarea name="Description" class="form-control" rows="4" disabled>{{$profile->description}}</textarea>
				</div>
			</div>
		</div>
        
        {{-- Contacts --}}
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<h5 data-toggle="collapse" href="#Contacts"><i class="fas fa-angle-right pr-2"></i>Contacts</h5>
				</div>
			</div>
		</div>
		<div class="collapse" id="Contacts">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group form-inline">
						<div class="checkbox checkbox-primary pr-2">
							<input name="contacts_create" id="contacts_create" type="checkbox" hidden @if($profile->contacts_create) checked @endif disabled>
							<label for="contacts_create">Create</label>
						</div>
						<div class="checkbox checkbox-primary pr-2">
							<input name="contacts_update" id="contacts_update" type="checkbox" hidden @if($profile->contacts_update) checked @endif disabled>
							<label for="contacts_update">Update</label>
						</div>
                        <div class="checkbox checkbox-primary pr-2">
							<input name="contacts_delete" id="contacts_delete" type="checkbox" hidden @if($profile->contacts_delete) checked @endif disabled>
							<label for="contacts_delete">Delete</label>
						</div>
					</div>
				</div>
			</div>
		</div>

        {{-- Users --}}
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<h5 data-toggle="collapse" href="#Users"><i class="fas fa-angle-right pr-2"></i>Users</h5>
				</div>
			</div>
		</div>
		<div class="collapse" id="Users">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group form-inline">
                        <div class="checkbox checkbox-primary pr-2">
							<input name="users_read" id="users_read" type="checkbox" hidden @if($profile->users_read) checked @endif disabled>
							<label for="users_read">Access</label>
						</div>
						<div class="checkbox checkbox-primary pr-2">
							<input name="users_create" id="users_create" type="checkbox" hidden @if($profile->users_create) checked @endif disabled>
							<label for="users_create">Create</label>
						</div>
						<div class="checkbox checkbox-primary pr-2">
							<input name="users_update" id="users_update" type="checkbox" hidden @if($profile->users_update) checked @endif disabled>
							<label for="users_update">Update</label>
						</div>
                        <div class="checkbox checkbox-primary pr-2">
							<input name="users_delete" id="users_delete" type="checkbox" hidden @if($profile->users_delete) checked @endif disabled>
							<label for="users_delete">Delete</label>
						</div>
					</div>
				</div>
			</div>
		</div>

        {{-- Profiles --}}
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<h5 data-toggle="collapse" href="#Profiles"><i class="fas fa-angle-right pr-2"></i>Profiles</h5>
				</div>
			</div>
		</div>
		<div class="collapse" id="Profiles">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group form-inline">
                        <div class="checkbox checkbox-primary pr-2">
							<input name="profiles_read" id="profiles_read" type="checkbox" hidden @if($profile->profiles_read) checked @endif disabled>
							<label for="profiles_read">Access</label>
						</div>
						<div class="checkbox checkbox-primary pr-2">
							<input name="profiles_create" id="profiles_create" type="checkbox" hidden @if($profile->profiles_create) checked @endif disabled>
							<label for="profiles_create">Create</label>
						</div>
						<div class="checkbox checkbox-primary pr-2">
							<input name="profiles_update" id="profiles_update" type="checkbox" hidden @if($profile->profiles_update) checked @endif disabled>
							<label for="profiles_update">Update</label>
						</div>
                        <div class="checkbox checkbox-primary pr-2">
							<input name="profiles_delete" id="profiles_delete" type="checkbox" hidden @if($profile->profiles_delete) checked @endif disabled>
							<label for="profiles_delete">Delete</label>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</form>
@stop