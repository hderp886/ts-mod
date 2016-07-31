@extends('web::layouts.grids.6-6')

@section('title', 'Teamspeak')
@section('page_header', 'Teamspeak')

@section('left')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Teamspeak Connection</h3>
    </div>
    <div class="panel-body">
        
        @if (count($tssettings))
        <form action="{{ url('teamspeak') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Teamspeak control buttons-->
            <div class="form-group">
            <div class="col-sm-6">
                <a type="button" class="btn btn-default" href="ts3server://{{ $tssettings->tshost }}?port={{ $tssettings->tscport }}&nickname={{ rawurlencode(setting('main_character_name')) }}&addbookmark=Panic%20Attack%20Teamspeak">
                    <i class="fa fa-plug"></i> Connect to teamspeak automatically 
                </a>
            </div>
            <div class="col-sm-6">
                Then <button type="submit" href="/teamspeak/" class="btn btn-default">
                    <i class="fa fa-magic"></i> Set permissions
                </button>
            </div>
            </div>
        </form>
        @else
            <div class="col-sm-12">Teamspeak is not configured. Contact an admin.</div>
        @endif
        
    </div>
</div>

@stop

@section('right')

    
@stop