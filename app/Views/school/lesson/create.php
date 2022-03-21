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
        <h1>レッスンを作成する</h1>
        <h2><?= esc($title ?? null) ?></h2>
        
        <?= session()->getFlashdata('error') ?>
        <?= service('validation')->listErrors() ?>
        
        <form action="<?= route_to('lesson_create') ?>" method="post">
            <?= csrf_field() ?>
            <div>
                <label for="lesson_title">
                    タイトル
                    <input type="text" name="lesson_title" />
                </label>
            </div>
            <div>
                <label for="lesson_unit">
                    単位
                    <input type="text" name="lesson_unit" />
                </label>
            </div>
            <div>
                <label for="lesson_body">
                    説明
                    <textarea name="lesson_body" cols="45" rows="4"></textarea>
                </label>
            </div>
            <div>
                <label for="is_continuous">
                    連続で作成する
                    <input type="checkbox" name="is_continuous">
                </label>
            </div>
            <p><input type="submit" name="submit" value="登録" /></p>
        </form>
    </body>
</html>
