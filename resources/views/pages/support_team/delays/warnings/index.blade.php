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
                            <th>الإسم</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($delay_warnings as $w)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $w->name }}</td>
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
                <div class="row">
                    <div class="col-md-6">
                        <form class="ajax-store" method="post" action="{{ route('delaywarnings.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">الإسم <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="الاسم الكامل">
                                </div>
                            </div>

                            <div class="text-right">
                                <button id="ajax-btn" type="submit" class="btn btn-primary">حفض <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Class List Ends--}}

@endsection