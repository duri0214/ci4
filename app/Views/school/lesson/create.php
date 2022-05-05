<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!-- Bootstrap CSS -->
        <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                crossorigin="anonymous">

        <!-- css -->
        <link rel="stylesheet" href="/assets/school/css/lesson/create.css">

        <!--jquery-->
        <script
                src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous">
        </script>

        <!-- select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <title>授業管理｜新規作成</title>
    </head>
    <body>
        <div class="container">
            <?= $breadcrumb ?? null ?>
            <h1>授業を作成する</h1>
    
            <?php if (session()->getFlashdata('success')) {
                echo ('<div class="alert alert-success mt-2">');
                echo (session()->getFlashdata('success'));
                echo ('</div>');
            } ?>
            <?php if (session()->getFlashdata('errors')) {
                echo ('<div class="alert alert-danger mt-2">');
                echo (session()->getFlashdata('errors'));
                echo ('</div>');
            } ?>
            
            <form action="<?= route_to('lesson_register') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-2">
                    <label>年組
                        <select id="homeroom_list" class="select2_single" name="selected_homeroom">
                            <option></option>
                            <?php if (!empty($homerooms)) {
                                foreach ($homerooms as $homeroom) {
                                    echo('<option>'.$homeroom->name.'</option>');
                                }
                            } ?>
                        </select>
                    </label>
                </div>
                <div class="mb-2">
                    <label>科目
                        <select id="subsubject_list" class="select2_single" name="selected_subsubject">
                            <option></option>
                            <?php if (!empty($subsubjects)) {
                                foreach ($subsubjects as $subsubject) {
                                    echo('<option>'.$subsubject->name.'</option>');
                                }
                            } ?>
                        </select>
                    </label>
                </div>

                <div class="mb-2">
                    <label>授業名
                        <input type="text" name="lesson_name" value="<?= old('lesson_name') ?>">
                    </label>
                </div>
                <div class="mb-2">
                    <label>単位
                        <input type="text" name="lesson_unit" value="<?= old('lesson_unit') ?>">
                    </label>
                </div>
                <div class="mb-2">
                    <label>授業説明
                        <textarea name="lesson_body"><?= old('lesson_body') ?></textarea>
                    </label>
                </div>
                <div class="mb-2">
                    <label>続けて入力する
                        <input type="checkbox" name="is_continuous" <?php if (old('is_continuous') == 'on') { echo 'checked'; } ?>>
                    </label>
                </div>
                <button class="btn btn-outline-primary">登録</button>
            </form>
        </div>

        <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
        </script>
    </body>
    <script>
        $(function() {
            $('#homeroom_list').select2({
                placeholder: "ホームルームを選択してください",
                allowClear: true,
                width: '100%',
            })
            .val('<?= old('selected_homeroom') ?>')
            .trigger("change");
            
            $('#subsubject_list').select2({
                placeholder: "科目を選択してください",
                allowClear: true,
                width: '100%',
            })
            .val('<?= old('selected_subsubject') ?>')
            .trigger("change");
        });
    </script>
</html>
