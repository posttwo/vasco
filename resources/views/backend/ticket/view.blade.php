@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.tickets.view'))

@section('breadcrumb-links')

@endsection

@push('aside')
    <pre>
        @json($ticket, JSON_PRETTY_PRINT)
    </pre>
@endpush

@section('content')

<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="card-title mb-0">
                       {{$ticket->name}} <small class="text-muted">#{{$ticket->id}}</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-4">
                    <div class="float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <span class="badge badge-success">{{$ticket->status}}</span>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col-md-8 mb-4">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab" aria-controls="description">
                                <i class="fas fa-align-justify"></i> Description
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="description" role="tabpanel">
                            {{$ticket->description}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <queue-select-component queue-search="{{route('admin.ticket.queue.search')}}" :currentQueue="{{$ticket->queue}}" ></queue-select-component>
                </div><!--col-->
            </div><!--row-->

        </div><!--card-body-->
    </div><!--card-->

@endsection
