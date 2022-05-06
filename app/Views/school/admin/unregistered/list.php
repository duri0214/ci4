<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>システム管理｜未登録管理</title>
    
        <!-- Bootstrap CSS -->
        <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                crossorigin="anonymous">
        
        <!-- FONTAWESOME -->
        <link href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" rel="stylesheet">

        <!--jquery-->
        <script
                src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous">
        </script>

        <!-- select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
    <body>
        <div class="container">
            <?= $breadcrumb ?? null ?>
            <h1>システム管理｜未登録管理</h1>
            アクティベーションが済んだが、学校へのアサインが済んでいないユーザーのリストです
            <uo>
                <li>shiftキーを押しながらまとめてチェックする、みたいな機能</li>
                <li>すでに登録済みの生徒を別の学校に移籍する機能</li>
            </uo>
    
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

            <form method="post" action="#">
                <?= csrf_field() ?>
                <div class="mt-4">
                    <label>
                        <select class="select2_single" name="school_id">
                            <option></option>
                            <?php if (!empty($schools)) {
                                foreach ($schools as $school) {
                                    echo('<option value="'.$school->id.'">'.$school->name.'</option>');
                                }
                            } ?>
                        </select>
                    </label>
                </div>
    
                <?php if (!empty($users)) { ?>
                    <table class="mt-3 table small table-sm">
                        <thead>
                            <tr>
                                <th></th>
                                <th>未登録者email</th>
                                <th>未登録者名</th>
                                <th>登録日</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td>
                                        <input class="chk_group" type="checkbox" name="registration_users[<?= $user->id ?>]">
                                    </td>
                                    <td><?= $user->email ?></td>
                                    <td><?= $user->username ?></td>
                                    <td><?= $user->created_at ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } else {
                    echo '<p>未登録の生徒はいません</p>';
                } ?>
                <button id="register" class="btn btn-outline-danger">登録先の学校を選んでください</button>
            </form>
        </div>
    </body>
    <script>
        $(function() {
            $('.select2_single').select2({
                placeholder: "未登録ユーザを割り当てる学校を選択してください",
                allowClear: true,
                width: '100%',
            });
        });
        
        // 登録先の学校を選択していないと登録ボタンの submit が働かないようにする
        $('select').on('change', function() {
            const selected_idx = $(this).find('option:selected').index();
            const register = document.querySelector('#register');
            if (selected_idx > 0) {
                register.classList.replace('btn-outline-danger', 'btn-outline-success')
                register.textContent = '登録できます';
                register.parentElement.setAttribute('action', '<?= route_to('user_register') ?>');
                register.setAttribute('type', 'submit')
            } else {
                register.classList.replace('btn-outline-success', 'btn-outline-danger')
                register.textContent = '登録先の学校を選んでください';
                register.parentElement.removeAttribute('action');
                register.setAttribute('type', 'button')
            }
        }).trigger('change');

        // Shift+クリックでチェックボックスを一括選択
        $(function(){
            let checked_last = null;
            $('.chk_group').on('click', function(event){
                if (event.shiftKey && checked_last) {
                    const $targets = $('.chk_group');
                    const p1 = $targets.index(checked_last);
                    const p2 = $targets.index(this);
                    for (let i = Math.min(p1, p2); i <= Math.max(p1, p2); ++i) {
                        $targets.get(i).checked = checked_last.checked;
                    }
                } else {
                    checked_last = this;
                }
            });
        });
    </script>
</html>
