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
        <h1>資格一覧</h1>
        <?php
        if (!empty($certifications)) { ?>
            <table>
                <thead>
                    <tr>
                        <th colspan="2">資格名</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($certifications as $certification) : ?>
                        <tr>
                            <td><?= $certification->name ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php
        } else {
            echo '<p>レコードなし</p>';
        }
        ?>
        <p><a href="<?= route_to('certification_manage') ?>">資格管理</a></p>
        <p><a href="<?= route_to('school_home') ?>">ホームへもどる</a></p>
    </body>
</html>
