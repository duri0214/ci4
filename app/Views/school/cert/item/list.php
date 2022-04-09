<!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <title>資格詳細</title>
    </head>
    <body>
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
