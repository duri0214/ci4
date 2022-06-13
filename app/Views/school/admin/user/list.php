<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>学校管理システム｜ユーザー管理｜ユーザー一覧</title>

        <!-- Bootstrap CSS -->
        <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <?= $breadcrumb ?? null ?>
            <h1>ユーザー一覧</h1>
    
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

            <?php if (!empty($users)) { ?>
                <table class="table small table-sm">
                    <thead>
                        <tr>
                            <th colspan="3">ユーザー名</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user->username ?></td>
                                <td><?= $user->description ?></td>
                                <td><a href="<?= route_to('user_detail', $user->id) ?>">詳細</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php
            } else {
                echo '<p>レコードなし</p>';
            } ?>
            <p><a href="<?= route_to('user_create') ?>">ユーザー作成</a></p>
            <p><a href="<?= route_to('user_upload_get') ?>">CSVアップロード</a></p>
        </div>
        <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
        </script>
    </body>
</html>
