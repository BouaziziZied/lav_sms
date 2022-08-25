@extends('layouts.master')
@section('page_title', 'إدارة الإنذارات')
@section('content')

<div class="card text-right">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">إدارة الإنذارات</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#all-warnings" class="nav-link active" data-toggle="tab">إدارة الإنذارات</a></li>
            <li class="nav-item"><a href="#new-warning" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> إنشاء إنذار كتابي جديد</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-warnings">
                <table class="table datatable-button-html5-columns">
                    <thead>
                        <tr>
                            <th>العدد</th>
                            <th>اسم الطالب</th>
                            <th>الصـف</th>
                            <th>التاريخ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($delay_warnings as $w)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $w->name }}</td>
                            <td>{{ $w->section }}</td>
                            <td>{{ $w->date }}</td>
                            <td class="text-center">
                                <!-- {{--Receipt--}}
                                <a target="_blank" href="" class="dropdown-item"><i class="icon-printer"></i> طباعة الإنذار</a> -->
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            @if(Qs::userIsTeamSA())
                                            {{--Print--}}
                                            <a target="_blank" href="{{ route('delaywarnings.print', Qs::hash($w->id)) }}" class="dropdown-item"><i class="icon-printer"></i> طباعة الإنذار</a>
                                            @endif
                                            @if(Qs::userIsTeamSA())
                                            {{--Edit--}}
                                            <a href="{{ route('delaywarnings.edit', $w->id) }}" class="dropdown-item"><i class="icon-pencil"></i> تعديل</a>
                                            @endif
                                            @if(Qs::userIsSuperAdmin())
                                            {{--Delete--}}
                                            <a id="{{ $w->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> حذف</a>
                                            <form method="post" id="item-delete-{{ $w->id }}" action="{{ route('delaywarnings.destroy', $w->id) }}" class="hidden">@csrf @method('delete')</form>
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

            <div class="tab-pane fade" id="new-warning">
                <form class="ajax-store" method="post" action="{{ route('delaywarnings.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>اسم الطالب: <span class="text-danger">*</span></label>
                                <input value="{{ old('name') }}" type="text" name="name" placeholder="اسم الطالب" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الصـف:</label>
                                <input value="{{ old('section') }}" class="form-control" placeholder="الصـف" name="section" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>اليوم: </label>
                                <input type="text" value="{{ old('day') }}" name="day" class="form-control" placeholder="اليوم">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>التاريخ:</label>
                                <input name="date" value="{{ old('date') }}" type="text" class="form-control date-pick" placeholder="إختر التاريخ...">

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>وقت الحضور الساعة:</label>
                                <input value="{{ old('hour') }}" type="text" name="hour" class="form-control" placeholder="وقت الحضور الساعة">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>توقيع الطالب: </label>
                                <input type="text" value="{{ old('signature') }}" name="student_signature" class="form-control" placeholder="توقيع الطالب">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>هاتف ولي الأمر:</label>
                                <input name="parent_phone" value="{{ old('parent_phone') }}" type="text" class="form-control date-pick" placeholder="هاتف ولي الأمر">

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>إفادة ولي الأمر:</label>
                                <input value="{{ old('parent_statement') }}" type="text" name="parent_statement" class="form-control" placeholder="إفادة ولي الأمر">
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-danger">حفض <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--Class List Ends--}}

@endsection