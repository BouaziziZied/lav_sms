@extends('layouts.master')
@section('page_title', 'تعديل إنذار - '.$w->name)
@section('content')

<div class="card text-right">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">تعديل الإنذار</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form class="ajax-update" data-reload="#page-header" method="post" action="{{ route('delaywarnings.update', $w->id) }}">
                    @csrf @method('PUT')
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label font-weight-semibold">الإسم <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input name="name" value="{{ $w->name }}" required type="text" class="form-control" placeholder="الاسم الكامل">
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

{{--Class List Ends--}}

@endsection