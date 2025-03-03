@extends('layouts.master')
@section('page_title', 'إضافة طالب')
@section('content')
<div class="card text-right">
    <div class="card-header bg-white header-elements-inline">
        <h6 class="card-title">يرجى ملأ النموذج لإضافة طالب جديد</h6>

        {!! Qs::getPanelOptions() !!}
    </div>

    <form id="ajax-reg" method="post" enctype="multipart/form-data" class="wizard-form steps-validation" action="{{ route('students.store') }}" data-fouc>
        @csrf
        <h6>البيانات الشخصية</h6>
        <fieldset>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>الاسم الكامل: <span class="text-danger">*</span></label>
                        <input value="{{ old('name') }}" required type="text" name="name" placeholder="الاسم الكامل" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>العنوان: <span class="text-danger">*</span></label>
                        <input value="{{ old('address') }}" class="form-control" placeholder="العنوان" name="address" type="text" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>البريد الالكترونى: </label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="البريد الالكترونى">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gender">الجنس: <span class="text-danger">*</span></label>
                        <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="إختر...">
                            <option value=""></option>
                            <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">ذكر</option>
                            <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">أنثى</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>الهاتف:</label>
                        <input value="{{ old('phone') }}" type="text" name="phone" class="form-control" placeholder="الهاتف">
                    </div>
                </div>

                <!-- <div class="col-md-3">
                    <div class="form-group">
                        <label>Telephone:</label>
                        <input value="{{ old('phone2') }}" type="text" name="phone2" class="form-control" placeholder="">
                    </div>
                </div> -->

            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>تاريخ الولادة:</label>
                        <input name="dob" value="{{ old('dob') }}" type="text" class="form-control date-pick" placeholder="إختر التاريخ...">

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nal_id">الجنسية: <span class="text-danger">*</span></label>
                        <select data-placeholder="اختر..." required name="nal_id" id="nal_id" class="select-search form-control">
                            <option value=""></option>
                            @foreach($nationals as $nal)
                            <option {{ (old('nal_id') == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ $nal->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="d-block">تحميل الصورة:</label>
                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo" class="form-input-styled" data-fouc>
                        <span class="form-text text-muted">الصور المقبولة: png ،jpeg، الحد الأقصى لحجم الصورة 2Mb.</span>
                    </div>
                </div>

                <!-- <div class="col-md-3">
                            <label for="state_id">State: <span class="text-danger">*</span></label>
                            <select onchange="getLGA(this.value)" required data-placeholder="Choose.." class="select-search form-control" name="state_id" id="state_id">
                                <option value=""></option>
                                @foreach($states as $st)
                                    <option {{ (old('state_id') == $st->id ? 'selected' : '') }} value="{{ $st->id }}">{{ $st->name }}</option>
                                @endforeach
                            </select>
                        </div> -->

                <!-- <div class="col-md-3">
                    <label for="lga_id">LGA: <span class="text-danger">*</span></label>
                    <select required data-placeholder="Select State First" class="select-search form-control" name="lga_id" id="lga_id">
                        <option value=""></option>
                    </select>
                </div> -->
            </div>
            <!-- <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bg_id">Blood Group: </label>
                        <select class="select form-control" id="bg_id" name="bg_id" data-fouc data-placeholder="Choose..">
                            <option value=""></option>
                            @foreach(App\Models\BloodGroup::all() as $bg)
                            <option {{ (old('bg_id') == $bg->id ? 'selected' : '') }} value="{{ $bg->id }}">{{ $bg->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> 

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="d-block">Upload Passport Photo:</label>
                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo" class="form-input-styled" data-fouc>
                        <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>
                    </div>
                </div>
            </div> -->

        </fieldset>

        <h6>بيانات الطالب</h6>
        <fieldset>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="my_class_id">القسم: <span class="text-danger">*</span></label>
                        <select onchange="getClassSections(this.value)" data-placeholder="إختر..." required name="my_class_id" id="my_class_id" class="select-search form-control">
                            <option value=""></option>
                            @foreach($my_classes as $c)
                            <option {{ (old('my_class_id') == $c->id ? 'selected' : '') }} value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="section_id">الفصول: <span class="text-danger">*</span></label>
                        <select data-placeholder="إختر القسم أولا" required name="section_id" id="section_id" class="select-search form-control">
                            <option {{ (old('section_id')) ? 'selected' : '' }} value="{{ old('section_id') }}">{{ (old('section_id')) ? 'Selected' : '' }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="my_parent_id">الولي: </label>
                        <select data-placeholder="إختر..." name="my_parent_id" id="my_parent_id" class="select-search form-control">
                            <option value=""></option>
                            @foreach($parents as $p)
                            <option {{ (old('my_parent_id') == Qs::hash($p->id)) ? 'selected' : '' }} value="{{ Qs::hash($p->id) }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="year_admitted">سنة الإضافة: <span class="text-danger">*</span></label>
                        <select data-placeholder="إختر..." required name="year_admitted" id="year_admitted" class="select-search form-control">
                            <option value=""></option>
                            @for($y=date('Y', strtotime('- 10 years')); $y<=date('Y'); $y++) <option {{ (old('year_admitted') == $y) ? 'selected' : '' }} value="{{ $y }}">{{ $y }}</option>
                                @endfor
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- <div class="col-md-3">
                    <label for="dorm_id">Dormitory: </label>
                    <select data-placeholder="Choose..." name="dorm_id" id="dorm_id" class="select-search form-control">
                        <option value=""></option>
                        @foreach($dorms as $d)
                        <option {{ (old('dorm_id') == $d->id) ? 'selected' : '' }} value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Dormitory Room No:</label>
                        <input type="text" name="dorm_room_no" placeholder="Dormitory Room No" class="form-control" value="{{ old('dorm_room_no') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Sport House:</label>
                        <input type="text" name="house" placeholder="Sport House" class="form-control" value="{{ old('house') }}">
                    </div>
                </div> -->

                <div class="col-md-3">
                    <div class="form-group">
                        <label>رقم الإضافة:</label>
                        <input type="text" name="adm_no" placeholder="رقم القبول" class="form-control" value="{{ old('adm_no') }}">
                    </div>
                </div>
            </div>
        </fieldset>

    </form>
</div>
@endsection