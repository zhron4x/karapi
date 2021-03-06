@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('admin.main_menu.changes') }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/changes/create') }}" class="btn btn-success btn-sm" title="{{ trans('admin.actions.new') }} {{ trans('admin.changes.single_r') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('admin.actions.new') }}
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/changes', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" value="{{ $keyword }}" placeholder="{{ trans('admin.actions.search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default search-btn" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{ trans('admin.changes.columns.group') }}</th>
                                        <th>{{ trans('admin.changes.columns.subject') }}</th>
                                        <th>{{ trans('admin.changes.columns.auditory') }}</th>
                                        <th>{{ trans('admin.changes.columns.pair_number') }}</th>
                                        <th>{{ trans('admin.changes.columns.date') }}</th>
                                        <th>{{ trans('admin.actions.th') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($changes as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->group->code }}</td>
                                        <td>{{ $item->subject->name }}</td>
                                        <td>{{ $item->auditory->code }}</td>
                                        <td>{{ $item->pair->pair_number }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>
                                            <a href="{{ url('/admin/changes/' . $item->id) }}" title="{{ trans('admin.actions.view') }} {{ trans('admin.changes.single_r') }}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/changes/' . $item->id . '/edit') }}" title="{{ trans('admin.actions.edit') }} {{ trans('admin.changes.single_r') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/changes', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => trans('admin.actions.delete').' '.trans('admin.changes.single_r'),
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $changes->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
