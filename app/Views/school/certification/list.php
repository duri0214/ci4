<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!-- SELECT2 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        
        <title>School</title>
    </head>
    <body>
        <?= $breadcrumb ?? null ?>
        <h1>資格一覧</h1>
        <label for="states[]">資格
            <select class="basic-multiple" name="states[]" multiple="multiple">
                <option value="sample1">サンプル資格1</option>
                <option value="sample2">サンプル資格2</option>
                <option value="sample3">サンプル資格3</option>
                <option value="sample4">サンプル資格4</option>
                <option value="sample5">サンプル資格5</option>
            </select>
        </label>
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
                            <td><?= $certification->name_short ?></td>
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
    <script>
        $(document).ready(function() {
            $('.basic-multiple').select2();
        });
    </script>
</html>
