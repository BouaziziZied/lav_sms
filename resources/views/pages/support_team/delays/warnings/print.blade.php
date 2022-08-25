<html dir="rtl" lang="ar">

<head>
    <title>إنذار كتابي - {{ $w->name }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/receipt.css') }}" />
</head>

<body>
    <div class="container">
        <div id="print" xmlns:margin-top="http://www.w3.org/1999/xhtml">
            {{--Photo--}}
            <div style="margin: 15px;">
                <img src="{{ asset('global_assets/images/logo_warning.jpg') }}" alt="...">
            </div>

            {{-- School Details--}}
            <table width="100%">
                <tr>

                    <td>
                        <div class="bold arial" style="text-align: center; float:right; width: 200px; padding: 25px; margin-right:325px">
                            <div style="padding: 10px 20px; width: 200px; background-color: #fff2cc;">
                                <span style="color: #000; font-weight: bold; font-size: 35px;"> تنبيه كتابي</span>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>

            {{--Background Logo--}}
            <div style="position: relative;  text-align: center;">
                <img src="" style="max-width: 500px; max-height:600px; margin-top: 60px; position:absolute ; opacity: 0.1; margin-left: auto;margin-right: auto; left: 0; right: 0;" />
            </div>

            {{--Receipt No --}}
            <div class="bold arial" style="text-align: center; float:right; width: 200px; padding-top: 15px; padding-bottom: 50px; margin-right:185px">
                <div style="padding: 10px 20px; width: 300px; background-color: #fff2cc;">
                    <span style="font-size: 25px;">التأخر عن الدوام الدراسي</span>
                </div>
            </div>

            <div style="clear: both"></div>

            <div style="float: right; margin-right: 75px;">
                <table style="font-size: 25px" class="td-right">
                    <tr>
                        <td class="bold" style="padding-left: 250px;">اليوم : {{ $w->day }}</td>
                        <td class="bold">التاريــخ : {{ $w->date }}</td>
                    </tr>
                    <tr>
                        <td class="bold" style="padding-left: 250px;">اسم الطالب : {{ $w->name }}</td>
                        <td class="bold">الصـف : {{ $w->section }}</td>
                    </tr>
                    <tr>
                        <td class="bold" style="padding-left: 250px;">وقت الحضور الساعة : {{ $w->hour }}</td>
                    </tr>
                </table>
            </div>
            <div class="clear"></div>

            {{-- Payment Info --}}
            <div style="margin:50px; display: block; background-color: #fff2cc; padding: 25px;">
                <span style="font-weight:bold; font-size: 25px; color: #000; padding-right: 10px">أتعهــد بعــدم تكرار التأخيـــر عن الدوام الدراسي، والحضور إلــى المدرسة قبل الساعــة السابعــة صباحاً وحضور الطابــور الصباحـــي في وقته المحدد وفي حالة تكرار ذلك سوف تقوم إدارة المدرسة باتخاذ الإجراءات المتبعة حسب اللوائح والقوانين الخاصة بالمدرسة ووزارة التربية و التعليم والتعليم العالي.</span>
            </div>

            <div style="float: right; margin-right: 75px;">
                <table class="td-right" style="font-size: 25px" cellspacing="2" cellpadding="2">
                    <tr>
                        <td class="bold">توقيع الطالب : {{ $w->student_signature }}</td>
                    </tr>
                    <tr>
                        <td class="bold"> تليفــون ولي الأمر : {{ $w->parent_phone }}</td>
                    </tr>
                    <tr>
                        <td class="bold">إفادة ولي الأمر : {{ $w->parent_statement }}</td>
                    </tr>
                </table>
            </div>
            <div class="clear"></div>

            <table class="td-rigth" style="font-size: 25px; margin-top: 50px; margin-bottom:50px;" width="100%" cellspacing="2" cellpadding="2">
                <thead>
                    <tr>
                        <td class="bold" style="padding-right: 50px;">المشرف الإداري</td>
                        <td class="bold" style="font-size: 30px;">نائب الشئون الإدارية والطلابية</td>
                    </tr>
                    <tr>
                        <td class="bold" style="padding-right: 50px;"></td>
                        <td class="bold" style="font-size: 30px;">محمد المراغي</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            {{-- Student Info --}}
            <div style="margin:50px; display: block; background-color: #fff2cc; padding: 15px; ">
                <span style="font-weight:bold; font-size: 23px; color: #000; padding-right: 35px;">رؤية الوزارة: الريادة في توفير فرص تعلُّم دائمة ومبتكرة وذات جودة عالية للمجتمع القطري</span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>