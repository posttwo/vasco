@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.tickets.list'))

@section('breadcrumb-links')

@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.tickets.tickets') }} <small class="text-muted">{{ __('labels.backend.tickets.all') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                    <a href="{{ route('admin.ticket.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                </div><!--btn-toolbar-->
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created By</th>
                            <th>Status</th>
                            <th>Queue</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tts as $tt)
                            <tr>
                                <td><a href="{{route('admin.ticket.view', $tt->id)}}">{{ $tt->id }}</a></td>
                                <td><a href="{{route('admin.ticket.view', $tt->id)}}">{{ $tt->name }}</a></td>
                                <td><a href="{{ route('admin.auth.user.show', $tt->createdBy) }}">{{ $tt->createdBy->name }}</a></td>
                                <td>{{ $tt->status }}</td>
                                <td>{{ $tt->queue->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $tts->total() !!} {{ trans_choice('labels.backend.tickets.total', $tts->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $tts->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->


<div class="modal fade" id="newTicketModal" tabindex="-1" role="dialog" aria-labelledby="newTicketModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body no-padding">
                    <example-component action="{{route('admin.ticket.store')}}" queue-search="{{route('admin.ticket.queue.search')}}"></example-component>
                </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTicketModal" data-keyboard="true">
        Launch demo modal
      </button>
@endsection
