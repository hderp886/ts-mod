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

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update Settings
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@stop

@section('right')

right

@stop