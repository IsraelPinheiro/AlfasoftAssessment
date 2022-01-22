@extends('layouts.modal')
@section('title',__('New Contact'))
@section('content')
	<form id="FormModal">
		@csrf
        {{-- Name --}}
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="Name">Name</label>
					<input name="Name" type="text" class="form-control" required>
				</div>
			</div>
		</div>
        {{-- Contact and Email --}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="Contact">Contact</label>
					<input name="Contact" type="phone" class="form-control" required>
				</div>
			</div>
            <div class="col-md-6">
				<div class="form-group">
					<label for="Email">Email</label>
					<input name="Email" type="email" class="form-control" required>
				</div>
			</div>
		</div>
	</form>
@stop
@section('actions')
	<button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
	<button type="submit" class="btn btn-primary btn-contacts-store">{{__('Save')}}</button>
@stop