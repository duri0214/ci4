<!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>資格詳細</title>
    </head>
    <body>
        <?= $breadcrumb ?? null ?>
        <h1>取扱資格の編集</h1>
        <?= service('validation')->listErrors(); ?>
        <?php if (empty($certification)) {
            echo '<p>資格レコードなし</p>';
        } else {
            ?>
            <h2><?= $certification['name'] ?></h2>
    
            <?php if (empty($certification['items'])) {
                echo '<p>アイテムレコードなし</p>';
            } else {
                $i = 1; ?>
                <form action="<?= route_to('certification_edit_post') ?>" method="post">
                    <?= csrf_field() ?>
                    <table>
                        <?php foreach ($certification['items'] as $item) : ?>
                            <tr>
                                <th><?= $i ?>回目</th>
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
    </body>
</html>
