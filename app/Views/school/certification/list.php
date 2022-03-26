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

        <!-- FONTAWESOME -->
        <link href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" rel="stylesheet">
        
        <!-- CSS -->
        <link rel="stylesheet" href="/assets/school/css/certification/list.css">

        <title>School</title>
    </head>
    <body>
        <?= $breadcrumb ?? null ?>
        <h1>資格一覧</h1>
        <form action="<?= route_to('editGet') ?>" method="post">
            <label for="selected_cert">処理対象の資格
                <select class="select2_single" name="selected_cert">
                    <option selected disabled>選択してください</option>
                    <?php if (!empty($certifications)) { ?>
                        <?php foreach ($certifications as $certification) : ?>
                            <option value="<?= $certification->id ?>"><?= $certification->name_short ?></option>
                        <?php endforeach; ?>
                    <?php } ?>
                </select>
            </label>
        </form>
        <?php
        if (!empty($certifications)) { ?>
            <table>
                <thead>
                    <tr>
                        <th>資格名</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($certifications as $certification) : ?>
                        <tr>
                            <td><?= $certification->name_short ?></td>
                            <td class="text-center padding50"><a href="<?= route_to('certification_edit_get', $certification->id) ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php
        } else {
            echo '<p>学校で取り扱っている資格がありません</p>';
        }
        ?>
        <p><a href="<?= route_to('certification_manage_get') ?>">学校取扱資格を選択する</a></p>
    </body>
    <script>
        $(document).ready(function() {
            $('.select2_single').select2();
        });
    </script>
</html>
