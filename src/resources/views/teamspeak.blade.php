@extends('web::layouts.grids.6-6')

@section('title', 'Teamspeak')
@section('page_header', 'Teamspeak')

@section('left')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Teamspeak Connection</h3>
    </div>
    <div class="panel-body">
        
        @if (!count($tssettings))
        <div class="col-sm-6">
            <a type="button" class="btn btn-default">
                <i class="fa fa-plug"></i> Connect to teamspeak automatically {{ setting('main_character_name') }}
            </a>
        </div>
        <div class="col-sm-6">
            Then <a type="button" href="/teamspeak/test" class="btn btn-default">
                <i class="fa fa-magic"></i> Set permissions
            </a>
        </div>
        @else
        <div class="col-sm-12">Teamspeak is not configured. Contact an admin.</div>
        @endif
        
    </div>
</div>

@stop

@section('right')



@stop