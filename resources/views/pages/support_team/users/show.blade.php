@extends('layouts.master')
@section('page_title', 'حساب المستخدم - '.$user->name)
@section('content')
<div class="row">
    <div class="col-md-3 text-center">
        <div class="card">
            <div class="card-body">
                <img style="width: 90%; height:90%" src="{{ $user->photo }}" alt="photo" class="rounded-circle">
                <br>
                <h3 class="mt-3">{{ $user->name }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">{{ $user->name }}</a>
                    </li>
                </ul>

                <div class="tab-content">
                    {{--Basic Info--}}
                    <div class="tab-pane fade show active" id="basic-info">
                        <table class="table table-bordered text-right">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">الاسم</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">الجنس</td>
                                    <td>{{ $user->gender }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">العنوان</td>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                @if($user->email)
                                <tr>
                                    <td class="font-weight-bold">البريد الإلكتروني</td>
                                    <td>{{$user->email }}</td>
                                </tr>
                                @endif
                                @if($user->username)
                                <tr>
                                    <td class="font-weight-bold">اسم المستخدم</td>
                                    <td>{{$user->username }}</td>
                                </tr>
                                @endif
                                @if($user->phone)
                                <tr>
                                    <td class="font-weight-bold">الهاتف</td>
                                    <td>{{$user->phone.' '.$user->phone2 }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="font-weight-bold">يوم الميلاد</td>
                                    <td>{{$user->dob }}</td>
                                </tr>
                                @if($user->bg_id)
                                <tr>
                                    <td class="font-weight-bold">Blood Group</td>
                                    <td>{{$user->blood_group->name }}</td>
                                </tr>
                                @endif
                                @if($user->nal_id)
                                <tr>
                                    <td class="font-weight-bold">Nationality</td>
                                    <td>{{$user->nationality->name }}</td>
                                </tr>
                                @endif
                                @if($user->state_id)
                                <tr>
                                    <td class="font-weight-bold">State</td>
                                    <td>{{$user->state->name }}</td>
                                </tr>
                                @endif
                                @if($user->lga_id)
                                <tr>
                                    <td class="font-weight-bold">LGA</td>
                                    <td>{{$user->lga->name }}</td>
                                </tr>
                                @endif
                                @if($user->user_type == 'parent')
                                <tr>
                                    <td class="font-weight-bold">Children/Ward</td>
                                    <td>
                                        @foreach(Qs::findMyChildren($user->id) as $sr)
                                        <span> - <a href="{{ route('students.show', Qs::hash($sr->id)) }}">{{ $sr->user->name.' - '.$sr->my_class->name. ' '.$sr->section->name }}</a></span><br>

                                        @endforeach
                                    </td>
                                </tr>
                                @endif

                                @if($user->user_type == 'teacher')
                                <tr>
                                    <td class="font-weight-bold">My Subjects</td>
                                    <td>
                                        @foreach(Qs::findTeacherSubjects($user->id) as $sub)
                                        <span> - {{ $sub->name.' ('.$sub->my_class->name.')' }}</span><br>
                                        @endforeach
                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


{{--User Profile Ends--}}

@endsection