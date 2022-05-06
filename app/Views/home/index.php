<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Welcome to CodeIgniter 4!</title>

        <!-- Bootstrap CSS -->
        <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                crossorigin="anonymous">

        <!-- for css -->
        <link rel="stylesheet" href="assets/home/css/index.css">
        
        <!-- FONTAWESOME -->
        <link href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" rel="stylesheet">
    
    </head>
    <body>
        <div class="container">
            
            <div class="jumbotron">
                <h1 class="display-4">Let's shuffle your sentence</h1>
                <p class="lead">Can be inspected by drag and drop.</p>
                <a class="btn btn-primary btn-sm" href="#" role="button">register</a>
                <a class="btn btn-success btn-sm" href="#" role="button">check</a>
                <hr class="my-4">
            </div>
            
            <table class="table table-bordered">
                <tbody>
                <?php
                if (isset($vocabulary_book)) {
                    foreach ($vocabulary_book as $items) : ?>
                        <tr class="sortable correct">
                            <?php foreach ($items as $item_k => $item_v) : ?>
                                <td id="item<?= $item_k ?>"><?= $item_v ?></td>
                            <?php endforeach;?>
                        </tr>
                    <?php endforeach;
                } ?>
                </tbody>
            </table>
    
            <h1>Hello World!</h1>
            <a href=<?= route_to('home_store') ?>>
                <button>store</button>
            </a>
            <a href=<?= route_to('home_csv_export') ?>>
                <button>csvダウンロード</button>
            </a>
            <a href=<?= route_to('home_excel_export') ?>>
                <button>excelダウンロード</button>
            </a>
            <a href=<?= route_to('home_rotate_pdf') ?>>
                <button>帳票A4タテヨコ混在で出力</button>
            </a>
            <a href=<?= route_to('school_home') ?>>
                <button>school</button>
            </a>
            
        </div>

        <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
        </script>
        
        <!-- for drug and drop -->
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        
        <!-- my script -->
        <script src="assets/home/js/script.js"></script>
    </body>
</html>
