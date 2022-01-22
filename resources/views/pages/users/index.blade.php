@extends('layouts.app')
@section('title-complement', ' - Users')
@section('content')
	{{-- Page Heading --}}
	<h1 class="h3 mb-4 text-gray-800">{{__('Users')}}</h1>
    @if(Auth::check())
        @if(Auth::user()->profile->users_create)
            <button class="btn btn-primary btn-circle btn-users-add float-right d-inline" title="New User" type="button">
                <i class="fas fa-plus"></i>
            </button>
        @endif
    @endif
	{{-- DataTales --}}
	<table class="table datatable table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th class="text-center">{{__('Name')}}</th>
				<th class="text-center">{{__('Profile')}}</th>
				<th class="text-center">{{__('Email')}}</th>
				<th class="text-center">{{__('Status')}}</th>
				<th class="noorder"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td class="text-center">{{ $user->name }}</td>
					<td class="text-center">{{ $user->profile->name }}</td>
					<td class="text-center">{{ $user->email }}</td>
					<td class="text-center">
						@if($user->active)
							{{__('Active')}}
						@else
							{{__('Inactive')}}
						@endif
					</td>
					<td class="toolbox text-center">
                        <i data-id={{$user->id}} class="fas fa-eye fa-lg btn-users-show pr-1" title="{{__('Show')}}"></i>
                        @if(Auth::check())
                            @if(Auth::user()->profile->users_update)
                                <i data-id={{$user->id}} class="fas fa-edit fa-lg btn-users-edit text-primary pr-1" title="{{__('Edit')}}"></i>
                            @endif
                            @if(Auth::user()->profile->users_delete)
                                <i data-id={{$user->id}} class="fas fa-trash-alt fa-lg btn-users-del text-danger" title="{{__('Delete')}}"></i>
                            @endif
                        @endif
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
