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
    <h1>Lesson detail</h1>
    <?= $group_id ?>
    <?php
    helper('form');
    $attributes = ['class' => 'email', 'id' => 'myform', 'csrf_id' => 'my-id'];
    echo form_open("/school/lesson/register/$group_id", $attributes);
    echo form_hidden('username', 'johndoe');

    $data = [
        'name'      => 'username',
        'id'        => 'username',
        'value'     => 'johndoe',
        'maxlength' => '100',
        'size'      => '50',
        'style'     => 'width:50%',
    ];
    echo form_input($data);
    echo form_submit('submit_grades', '成績を登録する');
    ?>
    <p><a href='/school'>school</a></p>
</body>
</html>
