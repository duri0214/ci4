<!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>学校管理システム｜資格管理｜資格詳細</title>

        <!-- FONTAWESOME -->
        <link href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <?= $breadcrumb ?? null ?>
            <h1>取扱資格の編集</h1>
    
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
            
            <?php if (empty($cert)) {
                echo '<p>資格レコードなし</p>';
            } else {
                ?>
                <h2>資格名: <?= $cert['name'] ?><i class="fas fa-edit ps-4"></i></h2>
                <form method="post">
                    <?= csrf_field() ?>
                    <div class="row mb-3">
                        <label for="certName" class="col-sm-2 col-form-label">資格名を変更</label>
                        <div class="col-sm-6">
                            <input class="form-control"
                                   type="text"
                                   name="certName"
                                   value="<?= old('certName') ?>"
                                   required>
                        </div>
                    </div>
                </form>
                <form method="post">
                    <?= csrf_field() ?>
                    <label>内訳アイテムを作成
                        <input type="date" name="the_day_of_the_test" pattern="\d{4}-\d{2}-\d{2}">
                    </label>
                    <label>
                        <input type="submit" formaction="<?= route_to('create_cert_item', $cert['id']) ?>" value="新規">
                    </label>
                </form>
    
                <?php if (empty($cert['items'])) {
                    echo '<p>アイテムレコードなし</p>';
                } else {
                    $i = 1; ?>
                    <form method="post">
                        <?= csrf_field() ?>
                        <table class="table small table-sm">
                            <thead>
                                <tr>
                                    <th>回数</th>
                                    <th>試験日</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <?php foreach ($cert['items'] as $item) : ?>
                                <tr>
                                    <td><?= $i ?>回目</td>
                                    <td><?= $item->the_day_of_the_test->format('Y-m-d') ?><i class="fas fa-edit ps-4"></i></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="date" name="the_day_of_the_test" pattern="\d{4}-\d{2}-\d{2}">
                                        <input type="submit" formaction="<?= route_to('update_cert_item', $item->id) ?>" value="更新">
                                        <input type="submit" formaction="<?= route_to('delete_cert_item', $item->id) ?>" value="削除">
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            endforeach; ?>
                        </table>
                    </form>
                <?php } ?>
            <?php } ?>
        </div>
        <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
        </script>
    </body>
</html>
