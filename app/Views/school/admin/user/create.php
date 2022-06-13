<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>学校管理システム｜ユーザー管理｜新規作成</title>

        <!-- Bootstrap CSS -->
        <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                crossorigin="anonymous">

        <!-- css -->
        <link rel="stylesheet" href="/assets/school/css/admin/user/create.css">

        <!--jquery-->
        <script
                src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous">
        </script>

        <!-- select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
    <body>
        <div class="container">
            <?= $breadcrumb ?? null ?>
            <h1>ユーザーを作成する</h1>
    
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
            
            <form action="<?= route_to('user_register') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-2 form-group row">
                    <label class="col-sm-2 col-form-label">ロール（役割）</label>
                    <div class="col-sm-6">
                        <select id="role_list" class="select2_multi" name="selected_roles[]" multiple="multiple">
                            <option></option>
                            <?php if (!empty($roles)) {
                                foreach ($roles as $role) {
                                    echo('<option>'.$role->name.'</option>');
                                }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="mb-2 form-group row">
                    <label class="col-sm-2 col-form-label">科目</label>
                    <div class="col-sm-6">
                        <select id="subsubject_list" class="select2_single" name="selected_subsubject">
                            <option></option>
                            <?php if (!empty($subsubjects)) {
                                foreach ($subsubjects as $subsubject) {
                                    echo('<option>'.$subsubject->name.'</option>');
                                }
                            } ?>
                        </select>
                    </div>
                </div>

                <div class="mb-2 form-group row">
                    <label class="col-sm-2 col-form-label">ユーザー名</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="user_name" value="<?= old('user_name') ?>">
                    </div>
                </div>
                <div class="mb-2 form-group row">
                    <label class="col-sm-2 col-form-label">email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="user_email" value="<?= old('user_email') ?>">
                    </div>
                </div>
                <div class="mb-2 form-group row">
                    <label class="col-sm-2 col-form-label">特記事項</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="user_body"><?= old('user_body') ?></textarea>
                    </div>
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
            $('#role_list').select2({
                placeholder: "役割を選択してください（複数選択可）",
                allowClear: true,
                width: '100%',
            })
            .val('<?= old('selected_roles') ?>')
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
