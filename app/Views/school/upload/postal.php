<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>学校管理システム｜アップロード</title>
        
        <!-- Bootstrap CSS -->
        <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                crossorigin="anonymous">
        <!-- FONTAWESOME -->
        <link href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" rel="stylesheet">
        <!-- External CSS -->
        <link rel="stylesheet" href="/assets/school/css/upload/postal.css">
    </head>
    <body>
        <div class="container">
            <?= $breadcrumb ?? null ?>
            <h1>郵便番号のアップロード画面です</h1>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="<?= route_to('lesson_upload_get') ?>">授業</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= route_to('postal_upload_get') ?>">郵便番号</a>
                </li>
            </ul>
    
            <div class="container">
                <a href="https://www.post.japanpost.jp/zipcode/dl/kogaki-zip.html" target="_blank">郵便番号データダウンロード</a>
                <div class="mt-4">
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

                    <form method="post" action="<?= route_to('postal_upload_post') ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-1">
                            <label class="form-label">File
                                <input class="form-control" type="file" name="file" required />
                            </label>
                        </div>
                        <input type="submit" class="btn btn-success" name="submit" value="インポート">
                    </form>
                </div>
                
                <!-- Postal list -->
                <div class="mt-4" >
                    <h3>登録済みの郵便番号</h3>
                    <div class="input-group">
                        <input type="text" id="txt-search" class="form-control input-group-prepend" placeholder="郵便番号を入力（未完成）"></input>
                        <span class="input-group-btn input-group-append"><submit type="submit" id="btn-search" class="btn btn-primary"><i class="fas fa-search"></i> 検索</submit></span>
                    </div>
                    <table class="table small table-sm">
                        <thead>
                        <tr>
                            <th>郵便番号</th>
                            <th>都道府県</th>
                            <th>市町村</th>
                            <th>それ以降</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($postals) && count($postals) > 0) {
                            foreach ($postals as $postal) {
                                ?>
                                <tr>
                                    <td><?= substr_replace($postal->code, '-', 3, 0) ?></td>
                                    <td><?= $postal->prefecture ?></td>
                                    <td><?= $postal->municipality ?></td>
                                    <td><?= $postal->town ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5">レコードなし</td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <p><?= isset($pager) ? $pager->links() : null ?></p>
                </div>
            </div>
        </div>
        <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
        </script>
    </body>
</html>
