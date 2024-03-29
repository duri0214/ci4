<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>学校管理システム｜資格管理</title>

        <!-- Bootstrap CSS -->
        <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                crossorigin="anonymous">
        
        <!-- css -->
        <link rel="stylesheet" href="/assets/school/css/cert/list.css">

        <!--jquery-->
        <script
                src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous">
        </script>

        <!-- select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
    <body>
        <div class="container">
            <?= $breadcrumb ?? null ?>
            <h1>資格一覧</h1>
            
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

            <!--<form action="--><?//= route_to('cert_info_register') ?><!--" method="post">-->
            <!--    --><?//= csrf_field() ?>
            <!--    <div class="mb-2">-->
            <!--        <label class="select2-label" for="selected_cert_single">処理対象の資格-->
            <!--            <select class="select2_single" name="selected_cert_single">-->
            <!--                <option></option>-->
            <!--                --><?php //if (!empty($certs)) {
            //                     foreach ($certs as $cert) {
            //                         echo('<option>');
            //                         echo($cert->name.' '.$cert->remark);
            //                         echo('</option>');
            //                     }
            //                 } ?>
            <!--            </select>-->
            <!--        </label>-->
            <!--    </div>-->
            <!--    <div class="mb-2">-->
            <!--        <label class="select2-label" for="selected_cert_multi">処理対象の資格-->
            <!--            <select class="select2_multi" name="selected_cert_multi" multiple="multiple">-->
            <!--                --><?php //if (!empty($certs)) {
            //                     foreach ($certs as $cert) {
            //                         echo('<option>');
            //                         echo($cert->name.' '.$cert->remark);
            //                         echo('</option>');
            //                     }
            //                 } ?>
            <!--            </select>-->
            <!--        </label>-->
            <!--    </div>-->
            <!--    <input class="mb-4 btn btn-primary" type="submit" value="編集">-->
            <!--</form>-->
    
            <form class="mb-4" action="/school/cert/create" method="post">
                <?= csrf_field() ?>
                <label>資格名
                    <input class="form-control" type="text" name="newCertName" value="<?= old('newCertName') ?>" required>
                </label>
                <label>備考
                    <input class="form-control" type="text" name="newCertRemark" value="<?= old('newCertRemark') ?>">
                </label>
                <button class="btn btn-primary" type="submit">追加</button>
                <div id="submitHelp" class="form-text mb-4">資格をひとつ追加できます</div>
            </form>
            
            <?php if (!empty($certs)) { ?>
                <table class="table small table-sm">
                    <thead>
                        <tr>
                            <th>資格名</th>
                            <th>備考</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($certs as $cert) : ?>
                            <tr class="clickable-tr" data-href="<?= route_to('cert_item_list', $cert->id) ?>">
                                <td><?= $cert->name ?></td>
                                <td><?= $cert->remark ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } else {
                echo '<p>学校で取り扱っている資格がありません</p>';
            } ?>
        </div>

        <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
        </script>
    </body>
    <script>
        $(function() {
            $('.select2_single').select2({
                placeholder: "資格を選択してください",
                allowClear: true,
                width: '100%',
                tags: true
            });
            $('.select2_multi').select2({
                placeholder: "資格を選択してください（複数可）",
                allowClear: true,
                width: '100%'
            });
        });

        // clickable tr-tag
        jQuery( function($) {
            $('tbody tr[data-href]').addClass('clickable').click( function() {
                window.location = $(this).attr('data-href');
            }).find('a').hover( function() {
                $(this).parents('tr').off('click');
            }, function() {
                $(this).parents('tr').on('click', function() {
                    window.location = $(this).attr('data-href');
                });
            });
        });
    </script>
</html>
