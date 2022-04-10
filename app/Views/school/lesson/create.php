<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!-- css -->
        <link rel="stylesheet" href="/assets/school/css/lesson/create.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Document</title>
    </head>
    <body>
        <?= $breadcrumb ?? null ?>
        <h1>レッスンを作成する</h1>
        <h2><?= esc($title ?? null) ?></h2>
        
        <?= session()->getFlashdata('error') ?>
        <?= isset($validation) ? $validation->listErrors() : null ?>
        
        <?php
            echo form_open('school/lesson/create');
            echo '<div>';
            echo form_label('授業名', 'lesson_name', attributes: ['class' => 'label-width-150']);
            echo form_input('lesson_name', set_value('lesson_name'));
            echo '</div>';
            echo '<div>';
            echo form_label('単位', 'lesson_unit', attributes: ['class' => 'label-width-150']);
            echo form_input('lesson_unit', set_value('lesson_unit'));
            echo '</div>';
            echo '<div>';
            echo form_label('授業説明', 'lesson_body', attributes: ['class' => 'label-width-150']);
            echo form_textarea('lesson_remark', set_value('lesson_remark'), extra: ["cols" => "45", "rows" => "4"]);
            echo '</div>';
            echo '<div>';
            echo form_label('続けて入力する', 'is_continuous', attributes: ['class' => 'label-width-150']);
            echo form_checkbox('is_continuous', checked: set_checkbox('is_continuous'));
            echo '</div>';
            echo '<div>';
            echo form_submit('submit', '登録');
            echo form_close();
        ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
