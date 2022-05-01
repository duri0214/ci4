<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>授業詳細</title>
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
            <h1>授業詳細</h1>
            <?= service('validation')->listErrors(); ?>
            <?php if (empty($lesson)) {
                echo '<p>授業レコードなし</p>';
            } else { ?>
                <h2><?= $lesson['entity']->name ?></h2>
                
                <?php if (empty($lesson['items'])) {
                    echo '<p>アイテムレコードなし</p>';
                } else {
                    $i = 1; ?>
                    <form action="<?= route_to('lesson_edit_post') ?>" method="post">
                        <?= csrf_field() ?>
                        <table class="table small table-sm">
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
        </div>
        <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
        </script>
    </body>
</html>
