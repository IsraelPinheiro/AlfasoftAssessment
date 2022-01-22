@extends('layouts.app')
@section('title-complement', ' - Profiles')
@section('content')
	{{-- Page Heading --}}
	<h1 class="h3 mb-4 text-gray-800">{{__('Profiles')}}</h1>
    @if(Auth::check())
        @if(Auth::user()->profile->profiles_create)
            <button class="btn btn-primary btn-circle btn-profiles-add float-right d-inline" title="New User" type="button">
                <i class="fas fa-plus"></i>
            </button>
        @endif
    @endif
	{{-- DataTales --}}
	<table class="table datatable table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th class="text-center">{{__('Name')}}</th>
				<th class="text-center">{{__('Description')}}</th>
				<th class="text-center">{{__('Users')}}</th>
				<th class="noorder"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($profiles as $profile)
				<tr>
					<td class="text-center">{{ $profile->name }}</td>
					<td class="text-center">{{ $profile->description }}</td>
					<td class="text-center">{{ $profile->users->count() }}</td>
					<td class="toolbox text-center">
                        <i data-id={{$profile->id}} class="fas fa-eye fa-lg btn-profiles-show pr-1" title="{{__('Show')}}"></i>
                        @if(Auth::check())
                            @if(Auth::user()->profile->profiles_update)
                                <i data-id={{$profile->id}} class="fas fa-edit fa-lg btn-profiles-edit text-primary pr-1" title="{{__('Edit')}}"></i>
                            @endif
                            @if(Auth::user()->profile->profiles_delete)
                                <i data-id={{$profile->id}} class="fas fa-trash-alt fa-lg btn-profiles-del text-danger" title="{{__('Delete')}}"></i>
                            @endif
                        @endif
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
