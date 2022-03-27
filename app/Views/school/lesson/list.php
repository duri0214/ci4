<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Document</title>
    </head>
    <body>
        <?= $breadcrumb ?? null ?>
        <h1>授業一覧</h1>
        <?php
        if (!empty($lessons)) { ?>
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
        }
        ?>
        <p><a href="<?= route_to('lesson_create') ?>">レッスン作成</a></p>
        <p><a href="<?= route_to('lesson_upload_get') ?>">CSVアップロード</a></p>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
