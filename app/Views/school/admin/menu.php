<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>システム管理｜メニュー</title>
    
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
            <h1>システム管理｜メニュー</h1>
            <table class="mt-3 table small table-sm">
                <thead>
                <tr>
                    <th>サブメニュー</th>
                </tr>
                </thead>
                <tbody>
                    <tr><td><a href="<?= route_to('unregistered_list') ?>">未登録ユーザーの紐づけ</a></td></tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
