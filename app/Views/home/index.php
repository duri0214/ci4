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

        <!--jquery-->
        <script
                src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous">
        </script>

        <!-- FONTAWESOME -->
        <link href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" rel="stylesheet">
    
    </head>
    <body>
        <div class="container">
            
            <div class="jumbotron">
                <h1 class="display-4">Let's shuffle your sentence</h1>
                <p class="lead">Can be inspected by drag and drop.</p>
                <a class="btn btn-primary btn-sm" href="#" role="button">register</a>
                <a id="submit" class="btn btn-success btn-sm" href="#" role="button">入れ替えた順番をチェック</a>
                <hr class="my-4">
            </div>

            <h2 class="mt-4">Draggable</h2>
            <p>現在の順番の表示：<span id="list-ids"></span></p>
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

            <h2 class="mt-4">Text resize</h2>
            <div class="btn btn-primary btn-sm" onclick="selectText(0)">短文</div>
            <div class="btn btn-primary btn-sm" onclick="selectText(1)">中文</div>
            <div class="btn btn-primary btn-sm" onclick="selectText(2)">長文</div>
            <div id="text-box" class="p-3"></div>
    
            <h2 class="mt-4">Playground</h2>
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
        <script
                src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"
                integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY="
                crossorigin="anonymous">
        </script>
        
        <!-- my script -->
        <script src="assets/home/js/script.js"></script>
        <script>
            const textElem = document.getElementById("text-box");

            /**
             * 指定量の文を貼り付けてリサイズするボタンのアクション（お試し発火用）
             * @param {Number} amountNumber
             */
            function selectText(amountNumber) {
                // the text from db
                const text_amount = [
                    "寿司食べたい🍣",
                    "いろはにほへとちりぬるをわかよたれそつねならむうゐのおくやまけふこえてあさきゆめみしゑひもせすんいろはにほへとちりぬるをわかよたれそつねならむうゐのおくやまけふこえてあさきゆめみしゑひもせすんいろはにほへとちりぬるをわかよたれそつねならむうゐのおくやまけふこえてあさきゆめみしゑひもせすんいろはにほへ",
                    "いろはにほへとちりぬるをわかよたれそつねならむうゐのおくやまけふこえてあさきゆめみしゑひもせすんいろはにほへとちりぬるをわかよたれそつねならむうゐのおくやまけふこえてあさきゆめみしゑひもせすんいろはにほへとちりぬるをわかよたれそつねならむうゐのおくやまけふこえてあさきゆめみしゑひもせすんいろはにほへとちりぬるをわかよたれそつねならむうゐのおくやまけふこえてあさきゆめみしゑひもせすんいろはにほへとちりぬるをわかよたれそつねならむうゐのおくやまけふこえてあさきゆめみしゑひもせすんいろはにほへとちりぬるをわかよたれそつねならむうゐのおくやまけふこえてあさきゆめみしゑひもせすんいろはにほへとちりぬるをいろはにほへとちりぬるをわかよたれそつねならむうゐのおくやまけふこえてあさきゆめみしゑひもせすんいろはにほへとちりぬるをわかよたれそつねならむうゐのおくやまけふこえていろはにほへとちりぬるをわかよたれそつねならむうゐのおくやまけふこえてあさきゆめみしゑひもせすんいろはにほへとちりぬ"
                ]
                textElem.innerText = text_amount[amountNumber];  // 本来はdbから値を持ってくる文字列
                resize(textElem, 30);
            }
        </script>
    </body>
</html>
