<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>帳票｜在籍証明書</title>
        <style>
            body {
                font-family: 'ipafont-m';
            }
        </style>
    </head>
    <body>
        <div class="container">
            <p class="mt-5 pt-5 me-5 text-end small">■■高証　第 { publish }{ number }{ /publish } 号</p>
            <h1 class="mt-5 pt-5 text-center">在　籍　証　明　書</h1>
            <section id="student-profile" class="mt-5 pt-5">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-2 small">
                        ふりがな
                    </div>
                    <div class="col-4 small">
                        { student_attr }{ name_kana }{ /student_attr }
                    </div>
                </div>

                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-2 ">
                        氏名
                    </div>
                    <h2 class="col-4">
                        { student_attr }{ name }{ /student_attr }
                    </h2>
                </div>

                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-2 small">
                        生年月日
                    </div>
                    <div class="col-4 small">
                        { student_attr }{ birthday }{ /student_attr }
                    </div>
                </div>
            </section>

            <h4 class="mt-5 pt-5 ms-5 ps-5 me-5 pe-5 text-center" style="line-height:2rem">
                上記の者は、本校 ■■課程 ■■科 第 ■ 学年に在籍していることを証明する。
            </h4>
            
            <section id="footer" class="mt-5 pt-5">
                <div class="row">
                    発行日　{ publish }{ date }{ /publish }
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <h5 class="col-4">
                        { school_attr }{ name }{ /school_attr }
                    </h5>
                    <div class="col-2"></div>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-2"></div>
                    <h3 class="col-4">
                        { school_attr }{ headmaster }{ /school_attr }
                    </h3>
                </div>
            </section>
        </div>
    </body>
</html>
