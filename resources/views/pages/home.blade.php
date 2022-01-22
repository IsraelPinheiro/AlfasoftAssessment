@extends('layouts.app')
@section('title-complement', '- Home')
@section('content')
	{{-- Page Heading --}}
	<h1 class="h3 mb-4 text-gray-800">{{__('Contacts')}}</h1>
    @if(Auth::check())
        @if(Auth::user()->profile->contacts_create)
            <button class="btn btn-primary btn-circle btn-contacts-add float-right d-inline" title="New Contact" type="button">
                <i class="fas fa-plus"></i>
            </button>
        @endif
    @endif
	{{-- DataTales - Concacts --}}
	<table class="table datatable table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th class="text-center">{{__('Name')}}</th>
				<th class="text-center">{{__('Contact')}}</th>
				<th class="text-center">{{__('Email')}}</th>
				<th class="noorder"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($contacts as $contact)
				<tr>
					<td class="text-center">{{ $contact->name }}</td>
					<td class="text-center">{{ $contact->contact }}</td>
					<td class="text-center">{{ $contact->email }}</td>
                    <td class="toolbox text-center">
                        <i data-id={{$contact->id}} class="fas fa-eye fa-lg btn-contacts-show pr-1" title="{{__('Show')}}"></i>
                        @if(Auth::check())
                            @if(Auth::user()->profile->contacts_update)
                                <i data-id={{$contact->id}} class="fas fa-edit fa-lg btn-contacts-edit text-primary pr-1" title="{{__('Edit')}}"></i>
                            @endif
                            @if(Auth::user()->profile->contacts_delete)
                                <i data-id={{$contact->id}} class="fas fa-trash-alt fa-lg btn-contacts-del text-danger" title="{{__('Delete')}}"></i>
                            @endif
                        @endif
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
