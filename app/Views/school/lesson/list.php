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

        <title>授業一覧</title>
    </head>
    <body>
        <div class="container">
            <?= $breadcrumb ?? null ?>
            <h1>授業一覧</h1>
    
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

            <?php if (!empty($lessons)) { ?>
                <table class="table small table-sm">
                    <thead>
                        <tr>
                            <th colspan="3">授業名</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lessons as $lesson) : ?>
                            <tr>
                                <td><?= $lesson->name ?></td>
                                <td><?= $lesson->description ?></td>
                                <td><a href="<?= route_to('lesson_detail', $lesson->id) ?>">詳細</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php
            } else {
                echo '<p>レコードなし</p>';
            } ?>
            <p><a href="<?= route_to('lesson_create') ?>">レッスン作成</a></p>
            <p><a href="<?= route_to('lesson_upload_get') ?>">CSVアップロード</a></p>
        </div>
        <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
        </script>
    </body>
</html>
