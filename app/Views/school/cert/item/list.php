<!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>資格詳細</title>
        <!-- Bootstrap CSS -->
        <link
                rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
    
            <?= $breadcrumb ?? null ?>
            <h1>取扱資格の編集</h1>
            <h2>todo</h2>
            <ul>
                <li>試験アイテム（＝試験日）の新規作成、削除</li>
            </ul>
    
            <?= service('validation')->listErrors(); ?>
    
            <form action="#" method="post">
                <input type="submit" value="資格アイテムを追加（＋マークはjavascriptでつくる）">
            </form>
    
            <?php if (empty($cert)) {
                echo '<p>資格レコードなし</p>';
            } else {
                ?>
                <h2><?= $cert['name'] ?></h2>
        
                <?php if (empty($cert['items'])) {
                    echo '<p>アイテムレコードなし</p>';
                } else {
                    $i = 1; ?>
                    <form action="<?= route_to('cert_edit_post') ?>" method="post">
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
                                    <td><?= $item->the_day_of_the_test->format('Y-m-d') ?></td>
                                </tr>
                                <?php
                                $i++;
                            endforeach; ?>
                        </table>
                        <input type="submit" value="更新">
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
