@extends('layouts.master')
@section('page_title', 'إدارة صفوف الأقسام')
@section('content')

<div class="card text-right">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">إدارة صفوف الأقسام</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#new-section" class="nav-link active" data-toggle="tab">إنشاء فصل جديد</a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">إدارة صفوف الأقسام</a>
                <div class="dropdown-menu dropdown-menu-right">
                    @foreach($my_classes as $c)
                    <a href="#c{{ $c->id }}" class="dropdown-item" data-toggle="tab">{{ $c->name }}</a>
                    @endforeach
                </div>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane show  active fade" id="new-section">
                <div class="row">
                    <div class="col-md-6">
                        <form class="ajax-store" method="post" action="{{ route('sections.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">الإسم <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="إسم الفصل">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">إختر القسم <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select required data-placeholder="إختر القسم" class="form-control select" name="my_class_id" id="my_class_id">
                                        @foreach($my_classes as $c)
                                        <option {{ old('my_class_id') == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">المعلم</label>
                                <div class="col-lg-9">
                                    <select data-placeholder="إختر المعلم" class="form-control select-search" name="teacher_id" id="teacher_id">
                                        <option value=""></option>
                                        @foreach($teachers as $t)
                                        <option {{ old('teacher_id') == Qs::hash($t->id) ? 'selected' : '' }} value="{{ Qs::hash($t->id) }}">{{ $t->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">حفض <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @foreach($my_classes as $d)
            <div class="tab-pane fade" id="c{{ $d->id }}">
                <table class="table datatable-button-html5-columns">
                    <thead>
                        <tr>
                            <th>العدد</th>
                            <th>الإسم</th>
                            <th>الفصل</th>
                            <th>المعلم</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections->where('my_class.id', $d->id) as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->name }} @if($s->active)<i class='icon-check'> </i>@endif</td>
                            <td>{{ $s->my_class->name }}</td>

                            @if($s->teacher_id)
                            <td><a target="_blank" href="{{ route('users.show', Qs::hash($s->teacher_id)) }}">{{ $s->teacher->name }}</a></td>
                            @else
                            <td> - </td>
                            @endif

                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            {{--edit--}}
                                            @if(Qs::userIsTeamSA())
                                            <a href="{{ route('sections.edit', $s->id) }}" class="dropdown-item"><i class="icon-pencil"></i> تعديل</a>
                                            @endif
                                            {{--Delete--}}
                                            @if(Qs::userIsSuperAdmin())
                                            <a id="{{ $s->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> حذف</a>
                                            <form method="post" id="item-delete-{{ $s->id }}" action="{{ route('sections.destroy', $s->id) }}" class="hidden">@csrf @method('delete')</form>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endforeach

        </div>
    </div>
</div>

{{--Section List Ends--}}

@endsection