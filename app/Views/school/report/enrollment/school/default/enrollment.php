<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>帳票｜在籍証明書</title>
        
        <!-- Bootstrap CSS -->
        <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                crossorigin="anonymous">
        
        <!-- GoogleFont NotoSerifJapanese -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">
        
        <style>
            body {
                width: 210mm;
                height: 297mm;
                border: thin solid red;
                font-family: 'Noto Serif JP', serif;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <p class="mt-5 pt-5 me-5 text-end small">■■高証　第 <?= $issue_num ?? '■' ?> 号</p>
            <h1 class="mt-5 pt-5 text-center">在　籍　証　明　書</h1>
            
            <section id="student-profile" class="mt-5 pt-5">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-2 small">
                        ふりがな
                    </div>
                    <div class="col-4 small">
                        <?= $student_name_kana ?? '（生徒名がありません）' ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-2 ">
                        氏名
                    </div>
                    <h2 class="col-4">
                        <?= $student_name ?? '（生徒名がありません）' ?>
                    </h2>
                </div>

                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-2 small">
                        生年月日
                    </div>
                    <div class="col-4 small">
                        <?= $student_birthday ?? '平成 ■■年 ■■月 ■■日生' ?>
                    </div>
                </div>
            </section>

            <h4 class="mt-5 pt-5 ms-5 ps-5 me-5 pe-5 text-center" style="line-height:2rem">
                上記の者は、本校 （課程名がありません）課程 （科名がありません）科 第 （学年がありません）学年に在籍していることを証明する。
            </h4>
            <p class="mt-5 pt-5 ms-5 small"><?= $publish_date ?? '令和 ■■年 ■■月 ■■日' ?></p>
            
            <section id="footer" class="mt-5 pt-5">
                <div class="row">
                    <div class="col-6"></div>
                    <h5 class="col-4">
                        <?= $schoolName ?? '（学校名がありません）' ?>長
                    </h5>
                    <div class="col-2"></div>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-2"></div>
                    <h3 class="col-4">
                        <?= $headTeacher ?? '（校長名がありません）'?>
                    </h3>
                </div>
            </section>
        </div>
    </body>
</html>
<?php exit() ?>
