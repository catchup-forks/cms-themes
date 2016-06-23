@extends('admin::layouts.master')

@section('title')
{{trans('themes::theme.title')}} | @parent
@endsection

@section('page-title')
    @pageHeader('themes::theme.title', 'themes::theme.description', 'themes::theme.icon')
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <i class="fa fa-list"></i>&nbsp;{{trans('themes::theme.lists')}}
            </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <table class="table" id="themes-table">
                <thead>
                <tr>
                    <th width="120px">{{trans('themes::theme.table.preview')}}</th>
                    <th>{{trans('themes::theme.table.theme')}}</th>
                    <th>{{trans('themes::theme.table.author')}}</th>
                    <th width="20px">
                        <i class="fa fa-star" data-toggle="tooltip"
                           data-title="{{trans('themes::theme.table.default')}}"></i>
                    </th>
                    <th width="80px">{{trans('themes::theme.table.positions')}}</th>
                    <th width="80px">{{trans('themes::theme.table.action')}}</th>
                </tr>
                </thead>
                @foreach($themes as $theme)
                    <tr>
                        <td>
                            <img src="{{$theme->preview()}}" class="thumbnail" width="220px" alt="{{$theme->name}}">
                        </td>
                        <td>
                            <h3 class="lead no-margin text-blue">{{$theme->name}} <small>{{$theme->version}}</small></h3>
                            <span class="label label-success">{{$theme->theme}}</span>
                            <p></p>
                            <p>{{$theme->description}}</p>
                        </td>
                        <td>
                            <p>{{$theme->author['name'] or ''}}</p>
                            <p>{{$theme->author['email'] or ''}}</p>
                            @if($theme->author['website'])
                                <p>{{html()->link($theme->author['website'])}}</p>
                            @endif
                        </td>
                        <td>
                            @if($theme->isDefault())
                                <i class="fa fa-star text-green"></i>
                            @endif
                        </td>
                        <td>
                            <ul>
                                @foreach($theme->positions as $position)
                                    <li>{{$position}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            @if(! $theme->isDefault())
                                {!! form()->open() !!}
                                {!! form()->hidden('theme', $theme->theme) !!}
                                <button type="submit" class="btn btn-xs btn-primary btn-block">
                                    <i class="fa fa-star"></i>
                                    {{trans('themes::theme.default')}}
                                </button>
                                {!! form()->close() !!}

                                <br>

                                {!! form()->open(['method' => 'delete', 'url' => route('administrator.themes.destroy', $theme->theme)]) !!}
                                {!! form()->hidden('theme', $theme->theme) !!}
                                <button type="button" class="btn btn-xs btn-danger btn-block btn-delete">
                                    <i class="fa fa-trash"></i>
                                    {{trans('themes::theme.uninstall')}}
                                </button>
                                {!! form()->close() !!}
                            @else
                                <button type="submit" disabled class="btn btn-xs btn-success btn-block">
                                    <i class="fa fa-star"></i>
                                    {{trans('themes::theme.current')}}
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop

@push('scripts')
<script>
    $(function () {
        $('.btn-delete').on('click', function (e) {
            var form = $(this).parents('form');
            e.preventDefault();
            swal({
                title: "{{trans('themes::theme.confirm.title')}}",
                text: "{{trans('themes::theme.confirm.text')}}",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "{{trans('themes::theme.confirm.cancel')}}",
                confirmButtonText: "{{trans('themes::theme.confirm.yes')}}",
                closeOnConfirm: false
            }, function () {
                form.submit();
            });
        });

        $('#themes-table').DataTable({
            order: [[1, 'asc']],
            columnDefs: [
                {orderable: false, targets: [0, 5]}
            ]
        });
    });
</script>
@endpush
