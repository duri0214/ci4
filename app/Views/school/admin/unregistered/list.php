<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>システム管理</title>
    
        <!-- Bootstrap CSS -->
        <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                crossorigin="anonymous">
        
        <!-- FONTAWESOME -->
        <link href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" rel="stylesheet">

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
            <h1>システム管理</h1>
            アクティベーションが済んだが、学校へのアサインが済んでいないユーザーのリストです
            <uo><li>shiftキーを押しながらまとめてチェックする、みたいな機能</li></uo>
    
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

            <form action="<?= route_to('school_user_register') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mt-4">
                    <label>
                        <select class="select2_single" name="school_of_assignment">
                            <option></option>
                            <?php if (!empty($schools)) {
                                foreach ($schools as $school) {
                                    echo('<option>');
                                    echo($school->name.' '.$school->remark);
                                    echo('</option>');
                                }
                            } ?>
                        </select>
                    </label>
                </div>
    
                <?php if (!empty($users)) { ?>
                    <table class="mt-3 table small table-sm">
                        <thead>
                            <tr>
                                <th></th>
                                <th>未登録者email</th>
                                <th>未登録者名</th>
                                <th>登録日</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" name="use[<?= $user->id ?>]">
                                        </label>
                                    </td>
                                    <td><?= $user->email ?></td>
                                    <td><?= $user->username ?></td>
                                    <td><?= $user->created_at ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <input class="btn btn-outline-primary" type="submit" aria-disabled="true">
                <?php } else {
                    echo '<p>未登録の生徒はいません</p>';
                } ?>
            </form>
        </div>
    </body>
    <script>
        $(document).ready(function() {
            $('.select2_single').select2({
                placeholder: "未登録ユーザを割り当てる学校を選択してください",
                allowClear: true,
                width: '100%',
            });
        });
    </script>
</html>
