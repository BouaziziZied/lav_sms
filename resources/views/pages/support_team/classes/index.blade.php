@extends('layouts.master')
@section('page_title', 'إدارة الأقسام')
@section('content')

<div class="card text-right">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">إدارة الأقسام</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">إدارة الأقسام</a></li>
            <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> إنشاء قسم جديد</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-classes">
                <table class="table datatable-button-html5-columns">
                    <thead>
                        <tr>
                            <th>العدد</th>
                            <th>الإسم</th>
                            <!-- <th>Class Type</th> -->
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($my_classes as $c)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $c->name }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            @if(Qs::userIsTeamSA())
                                            {{--Edit--}}
                                            <a href="{{ route('classes.edit', $c->id) }}" class="dropdown-item"><i class="icon-pencil"></i> تعديل</a>
                                            @endif
                                            @if(Qs::userIsSuperAdmin())
                                            {{--Delete--}}
                                            <a id="{{ $c->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> حذف</a>
                                            <form method="post" id="item-delete-{{ $c->id }}" action="{{ route('classes.destroy', $c->id) }}" class="hidden">@csrf @method('delete')</form>
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

            <div class="tab-pane fade" id="new-class">
                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info border-0 alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>

                            <span>عند إنشاء قسم، سيتم إنشاء فصل تلقائيا للقسم، ويمكنك تعديله أو إضافة المزيد من الفصول إلى القسم في <a target="_blank" href="{{ route('sections.index') }}">إدارة الفصول</a></span>
                        </div>
                    </div>
                </div> -->

                <div class="row">
                    <div class="col-md-6">
                        <form class="ajax-store" method="post" action="{{ route('classes.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">الإسم <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="اسم القسم">
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">Class Type</label>
                                <div class="col-lg-9">
                                    <select required data-placeholder="Select Class Type" class="form-control select" name="class_type_id" id="class_type_id">
                                        @foreach($class_types as $ct)
                                        <option {{ old('class_type_id') == $ct->id ? 'selected' : '' }} value="{{ $ct->id }}">{{ $ct->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->

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