<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    {!! Form::label('group_id', trans('admin.changes.columns.group'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('group_id', App\Group::all()->pluck('code', 'id'), null, ['class' => 'form-control select2']) !!}
        {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('subject_id') ? 'has-error' : ''}}">
    {!! Form::label('subject_id', trans('admin.changes.columns.subject'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('subject_id', App\Subject::all()->pluck('name', 'id'), null, ['class' => 'form-control select2']) !!}
        {!! $errors->first('subject_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('pair_id') ? 'has-error' : ''}}">
    {!! Form::label('pair_id', trans('admin.changes.columns.pair_number'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('pair_id', App\Pair::where('building_id', 1)->pluck('pair_number', 'id'), (isset($change) ? $change->pair->pair_number : null), ['class' => 'form-control']) !!}
        {!! $errors->first('pair_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('auditory_id') ? 'has-error' : ''}}">
    {!! Form::label('auditory_id', trans('admin.changes.columns.auditory'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('auditory_id', auditoriesWithBuildingsList(), null, ['class' => 'form-control select2']) !!}
        {!! $errors->first('auditory_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('teacher_id') ? 'has-error' : ''}}">
    {!! Form::label('teacher_id', trans('admin.changes.columns.teacher'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('teacher_id', App\Teacher::all()->pluck('fio', 'id'), null, ['class' => 'form-control select2']) !!}
        {!! $errors->first('teacher_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    {!! Form::label('date', trans('admin.changes.columns.date'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('date', null, ['class' => 'form-control']) !!}
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('admin.actions.create'), ['class' => 'btn btn-primary']) !!}
    </div>
</div>
