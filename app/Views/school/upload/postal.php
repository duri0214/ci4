<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>How to Import CSV file data to MySQL in CodeIgniter 4</title>
    </head>
    <body>
        <h1>郵便番号のアップロード画面です</h1>
        drug on drop でアップロードさせたい
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="<?= route_to('lesson_upload_get') ?>">授業</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?= route_to('postal_upload_get') ?>">郵便番号</a>
            </li>
        </ul>


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    // Display Response
                    use Config\Services;
                
                    if (session()->has('message')) {
                        ?>
                        <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                            <?= session()->getFlashdata('message') ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php $validation = Services::validation(); ?>
                    <form method="post" action="<?=route_to('postal_upload_post')?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="file">File:</label>
                            <input type="file" class="form-control" id="file" name="file" />
                            <!-- Error -->
                            <?php if ($validation->getError('file')) {?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $validation->getError('file'); ?>
                                </div>
                            <?php }?>
                        </div>
                        <input type="submit" class="btn btn-success" name="submit" value="Import CSV">
                    </form>
    
                </div>
            </div>
    
            <div class="row">
                <!-- Postal list -->
                <div class="col-md-12 mt-4" >
                    <h3 class="mb-4">登録済みの郵便番号</h3>
                    <table class="table">
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
                                <td colspan="5">No record found.</td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <p><a href="<?= route_to('lesson_list') ?>">授業管理へもどる</a></p>
        <p><a href="<?= route_to('school_home') ?>">ホームへもどる</a></p>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
