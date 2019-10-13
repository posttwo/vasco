@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.tickets.create'))

@section('breadcrumb-links')

@endsection

@section('content')

<example-component action="{{route('admin.ticket.store')}}" queue-search="{{route('admin.ticket.queue.search')}}"></example-component>

@endsection
