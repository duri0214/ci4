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
        <?= $breadcrumb ?? null ?>
        <h1>授業詳細</h1>
        <?= service('validation')->listErrors(); ?>
        <?php if (empty($lesson)) {
            echo '<p>授業レコードなし</p>';
        } else {
            ?>
            <h2><?= $lesson['entity']->name ?></h2>
            
            <?php if (empty($lesson['items'])) {
                echo '<p>アイテムレコードなし</p>';
            } else {
                $i = 1; ?>
                <form action="<?= route_to('lesson_edit_post') ?>" method="post">
                    <?= csrf_field() ?>
                    <table>
                        <?php foreach ($lesson['items'] as $item) : ?>
                            <tr>
                                <th><?= $i ?>回目</th>
                                <td><?= $item->the_day_of_the_test->format('Y-m-d') ?></td>
                            </tr>
                            <?php
                            $i++;
                        endforeach; ?>
                    </table>
                    <input type="submit" value="成績を登録する">
                </form>
            <?php } ?>
        <?php } ?>
    </body>
</html>
