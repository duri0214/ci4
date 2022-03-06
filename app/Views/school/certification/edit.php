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
        <h1>取扱資格の設定</h1>
        <?php
        if (!empty($certifications)) { ?>
            <table>
                <thead>
                <tr>
                    <th>使う</th>
                    <th>資格名</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($certifications as $certification) : ?>
                    <tr>
                        <td><label><input type="checkbox" name="i_want_use" value="0"></label></td>
                        <td><?= $certification['name'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <input type="submit" value="更新">
            <?php
        } else {
            echo '<p>レコードなし</p>';
        }
        ?>
    </body>
</html>
