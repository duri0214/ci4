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
        <uo>
            <li>ドロップダウンでなにかを登録させようとする</li>
            <li>バリデーション（コールバックタイプ）をかけて</li>
            <li>通れば redirect to list</li>
            <li>通らなければ 差し戻し</li>
        </uo>
        <?= session()->getFlashdata('error') ?>
        <?= service('validation')->listErrors() ?>
        
        <form action="<?= route_to('certification_info_register') ?>" method="post">
            <?= csrf_field() ?>
            <div>
                <label class="select2-label" for="selected_cert_single">処理対象の資格
                    <select class="select2_single" name="selected_cert_single">
                        <option selected disabled>選択してください</option>
                        <?php if (!empty($certifications)) { ?>
                            <?php foreach ($certifications as $certification) : ?>
                                <option value="<?= $certification->id ?>"><?= $certification->name_short ?></option>
                            <?php endforeach; ?>
                        <?php } ?>
                    </select>
                </label>
            </div>
            <div>
                <label class="select2-label" for="selected_cert_multi">処理対象の資格
                    <select class="select2_multi" name="selected_cert_multi" multiple="multiple">
                        <?php if (!empty($certifications)) { ?>
                            <?php foreach ($certifications as $certification) : ?>
                                <option value="<?= $certification->id ?>"><?= $certification->name_short ?></option>
                            <?php endforeach; ?>
                        <?php } ?>
                    </select>
                </label>
            </div>
            <input type="submit" value="編集">
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
                            <td class="text-center padding50">
                                <a href="<?= route_to('certification_item_edit', $certification->id) ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
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
            $('.select2_single').select2({
                width: 300,
                tags: true
            });
            $('.select2_multi').select2({
                placeholder: "選択してください（複数可）",
                allowClear: true,
                width: 300
            });
        });
    </script>
</html>
