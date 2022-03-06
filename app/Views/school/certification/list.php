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
        <?= $breadcrumb ?>
        <h1>資格一覧</h1>
        <?php
        if (!empty($certifications)) { ?>
            <table>
                <thead>
                    <tr>
                        <th>資格名</th>
                        <th>取得者管理</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($certifications as $certification) : ?>
                        <tr>
                            <td><?= $certification->name ?></td>
                            <td>編集</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php
        } else {
            echo '<p>学校で取り扱っている資格がありません</p>';
        }
        ?>
        <p><a href="<?= route_to('certification_edit_get') ?>">学校取扱資格を選択する</a></p>
        <p><a href="<?= route_to('school_home') ?>">ホームへもどる</a></p>
    </body>
</html>
