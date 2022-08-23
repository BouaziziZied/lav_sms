@extends('layouts.master')
@section('page_title', 'إضافة إنذار كتابي')
@section('content')
<div class="card text-right">
    <div class="card-header bg-white header-elements-inline">
        <h6 class="card-title">التأخر عن الدوام الدراسي</h6>

        {!! Qs::getPanelOptions() !!}
    </div>

    <form method="post" enctype="multipart/form-data" class="p-3" action="">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>اسم الطالب:</label>
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
                    <input name="dod" value="{{ old('dod') }}" type="text" class="form-control date-pick" placeholder="إختر التاريخ...">

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
                    <input type="text" value="{{ old('signature') }}" name="signature" class="form-control" placeholder="توقيع الطالب">
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
            <button type="submit" class="btn btn-danger">تقرير <i class="icon-paperplane ml-2"></i></button>
        </div>

    </form>
</div>
@endsection