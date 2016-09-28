@extends('web::layouts.grids.6-6')

@section('title', 'Settings')
@section('page_header', 'Settings')

@section('left')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Teamspeak Settings</h3>
    </div>
    <div class="panel-body">
        
        <!-- Teamspeak Settings -->
        <form action="{{ url('teamspeak/admin') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Teamspeak admin -->
            <div class="form-group">
                <label for="admin" class="col-sm-4 control-label">Admin User ID</label>

                <div class="col-sm-7">
                    @if (!count($tssettings))
                    <input type="text" name="admin" id="admin" class="form-control">
                    @else
                    <input type="text" name="admin" id="admin" class="form-control" value="{{ $tssettings->admin }}">
                    @endif
                </div>
            </div>  
            
            <div class="form-group">
                <label for="tshost" class="col-sm-4 control-label">Teamspeak Host</label>

                <div class="col-sm-7">
                    @if (!count($tssettings))
                    <input type="text" name="tshost" id="tshost" class="form-control">
                    @else
                    <input type="text" name="tshost" id="tshost" class="form-control" value="{{ $tssettings->tshost }}">
                    @endif
                </div>
            </div>  
            
            <div class="form-group">
                <label for="tsuser" class="col-sm-4 control-label">Teamspeak User</label>

                <div class="col-sm-7">
                    @if (!count($tssettings))
                    <input type="text" name="tsuser" id="tsuser" class="form-control">
                    @else
                    <input type="text" name="tsuser" id="tsuser" class="form-control" value="{{ $tssettings->tsuser }}">
                    @endif
                </div>
            </div>  
            
            <div class="form-group">
                <label for="tspass" class="col-sm-4 control-label">Teamspeak Server Pass</label>

                <div class="col-sm-7">
                    @if (!count($tssettings))
                    <input type="password" name="tspass" id="tspass" class="form-control">
                    @else
                    <input type="password" name="tspass" id="tspass" class="form-control" value="{{ $tssettings->tspass }}">
                    @endif
                </div>
            </div>  
            
            <div class="form-group">
                <label for="tsport" class="col-sm-4 control-label">Teamspeak Server Port</label>

                <div class="col-sm-7">
                    @if (!count($tssettings))
                    <input type="text" name="tsport" id="tsport" class="form-control">
                    @else
                    <input type="text" name="tsport" id="tsport" class="form-control" value="{{ $tssettings->tsport }}">
                    @endif
                </div>
            </div>  
            
            <div class="form-group">
                <label for="tscport" class="col-sm-4 control-label">Teamspeak Server Client Port</label>

                <div class="col-sm-7">
                    @if (!count($tssettings))
                    <input type="text" name="tscport" id="tscport" class="form-control">
                    @else
                    <input type="text" name="tscport" id="tscport" class="form-control" value="{{ $tssettings->tscport }}">
                    @endif
                </div>
            </div>
                
            <div class="form-group">
                <label for="allianceid" class="col-sm-4 control-label">Alliance/Corp EVE IDs (Separate by comma)</label>

                <div class="col-sm-7">
                    @if (!count($tssettings))
                    <input type="text" name="allianceid" id="allianceid" class="form-control">
                    @else
                    <input type="text" name="allianceid" id="allianceid" class="form-control" value="{{ $tssettings->allianceid }}">
                    @endif
                </div>
                
            </div>
            
            <div class="form-group">
                <label for="tsdivider" class="col-sm-4 control-label">Teamspeak Corp Ticker Divider</label>

                <div class="col-sm-7">
                    @if (!count($tssettings))
                    <input type="text" name="tsdivider" id="tsdivider" class="form-control">
                    @else
                    <input type="text" name="tsdivider" id="tsdivider" class="form-control" value="{{ $tssettings->tsdivider }}">
                    @endif
                </div>
                
            </div>
            
            <div class="form-group">
                <label for="defaultgroup" class="col-sm-4 control-label">Default Member TS Server Group ID</label>

                <div class="col-sm-7">
                    @if (!count($tssettings))
                    <input type="text" name="defaultgroup" id="defaultgroup" class="form-control">
                    @else
                    <input type="text" name="defaultgroup" id="defaultgroup" class="form-control" value="{{ $tssettings->defaultgroup }}">
                    @endif
                </div>
                
            </div>

            <div class="form-group">
                <label for="noodlTicker" class="col-sm-4 control-label">N0ODL Corp Ticker</label>

                <div class="col-sm-7">
                    @if (!count($tssettings))
                    <input type="text" name="noodlTicker" id="noodlTicker" class="form-control">
                    @else
                    <input type="text" name="noodlTicker" id="noodlTicker" class="form-control" value="{{ $tssettings->noodlTicker }}">
                    @endif
                </div>
                
            </div>
            
            <div class="form-group">
                <label for="noodlCID" class="col-sm-4 control-label">N0ODL Channel ID</label>

                <div class="col-sm-7">
                    @if (!count($tssettings))
                    <input type="text" name="noodlCID" id="noodlCID" class="form-control">
                    @else
                    <input type="text" name="noodlCID" id="noodlCID" class="form-control" value="{{ $tssettings->noodlCID }}">
                    @endif
                </div>
                
            </div>
            
            <div class="form-group">
                <label for="noodlCGID" class="col-sm-4 control-label">N0ODL Channel Group ID</label>

                <div class="col-sm-7">
                    @if (!count($tssettings))
                    <input type="text" name="noodlCGID" id="noodlCGID" class="form-control">
                    @else
                    <input type="text" name="noodlCGID" id="noodlCGID" class="form-control" value="{{ $tssettings->noodlCGID }}">
                    @endif
                </div>
                
            </div>
            
            <div class="form-group">
                <label for="s4uceCID" class="col-sm-4 control-label">S4UCE Channel ID</label>

                <div class="col-sm-7">
                    @if (!count($tssettings))
                    <input type="text" name="s4uceCID" id="s4uceCID" class="form-control">
                    @else
                    <input type="text" name="s4uceCID" id="s4uceCID" class="form-control" value="{{ $tssettings->s4uceCID }}">
                    @endif
                </div>
                
            </div>
            
            <div class="form-group">
                <label for="s4uceCGID" class="col-sm-4 control-label">S4UCE Channel Group ID</label>

                <div class="col-sm-7">
                    @if (!count($tssettings))
                    <input type="text" name="s4uceCGID" id="s4uceCGID" class="form-control">
                    @else
                    <input type="text" name="s4uceCGID" id="s4uceCGID" class="form-control" value="{{ $tssettings->s4uceCGID }}">
                    @endif
                </div>
                
            </div>
            
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update Settings
                    </button>
                </div>
                <div class="col-sm-4">
                    <a type="button" href="/teamspeak/test" class="btn btn-default">
                        <i class="fa fa-plus"></i> Test Connection
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

@stop

@section('right')



@stop