<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <?= $breadcrumb ?? null ?>
        <h1>授業一覧</h1>
        <?php
        if (!empty($lessons)) { ?>
            <table>
                <thead>
                    <tr>
                        <th colspan="2">教科</th>
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
    </body>
</html>
