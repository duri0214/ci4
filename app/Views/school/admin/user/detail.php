<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>学校管理システム｜ユーザー管理｜ユーザー詳細</title>
        
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
            <h1>ユーザー詳細</h1>
            <?= service('validation')->listErrors(); ?>
            <?php if (empty($user)) {
                echo '<p>ユーザーレコードなし</p>';
            } else { ?>
                <div class="mb-2 form-group row">
                    <label class="col-sm-2 col-form-label">ユーザー名</label>
                    <div class="col-sm-6 d-flex align-items-center">
                        <?= $user['username'] ?>
                    </div>
                </div>
                
                <div class="mb-2 form-group row">
                    <label class="col-sm-2 col-form-label">ロール（役割）</label>
                    <div class="col-sm-6 d-flex align-items-center">
                        <?= $user['roles'] ?>
                    </div>
                </div>
                <div class="mb-2 form-group row">
                    <label class="col-sm-2 col-form-label">email</label>
                    <div class="col-sm-6 d-flex align-items-center">
                        <?= $user['email'] ?>
                    </div>
                </div>
                <div class="mb-2 form-group row">
                    <label class="col-sm-2 col-form-label">特記事項</label>
                    <div class="col-sm-6 d-flex align-items-center">
                        <?= $user['remark'] ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
        </script>
    </body>
</html>
