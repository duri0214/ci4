<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <title>Document</title>
    </head>
    <body>
        <?= $breadcrumb ?? null ?>
        <h1>取扱資格の設定</h1>
        <p>取り扱う資格を選んでください</p>
        <?= service('validation')->listErrors(); ?>
        <?php if (!empty($certifications)) { ?>
            <form action="<?= route_to('certification_manage_post') ?>" method="post">
                <?= csrf_field() ?>
                <table class="table small table-borderless table-sm">
                    <thead>
                    <tr>
                        <th colspan="2">資格名</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($certifications as $k => $v) : ?>
                        <tr>
                            <td>
                                <label>
                                    <input type="checkbox" name="checked[<?= $k ?>]" <?= $v['checked'] ?>>
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input type="text" name="name_short[<?= $k ?>]" value="<?= $v['name'] ?>">
                                </label>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <input type="submit" value="更新">
            </form>
        <?php } else {
            echo '<p>レコードなし</p>';
        } ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
