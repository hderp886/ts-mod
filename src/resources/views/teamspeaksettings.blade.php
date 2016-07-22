@extends('web::layouts.grids.3-9')

@section('title', 'Settings')
@section('page_header', 'Settings')

@section('left')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Teamspeak Settings</h3>
    </div>
    <div class="panel-body">
        
        <!-- Teamspeak Settings -->
        <form action="{{ url('teamspeak') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="admin-user" class="col-sm-3 control-label">Admin User ID</label>

                <div class="col-sm-6">
                    @if ($tssettings->admin == null)
                    <input type="text" name="name" id="admin-user" class="form-control">
                    @else
                    <input type="text" name="name" id="admin-user" class="form-control" value="{{ $tssettings->admin }}">
                    @endif
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
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