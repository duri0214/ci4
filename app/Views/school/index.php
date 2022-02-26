<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="assets/school/css/index.css">
</head>
<body>
    <h1>school</h1>
    <p>学校名: <?= $school->name ?></p>
    <p>所在地: 〒<?= $school->zipcode ?> <?= $school->address ?></p>
    <p>tel: <?= $school->tel ?></p>
    <p>学校のカテゴリー: <?= $school_category->name ?></p>
    
    <p>学校がもつすべてのホームルームリスト:</p>
    <?php
    if (!empty($homerooms)) {
        foreach ($homerooms as $homeroom) : ?>
            <li><?= $homeroom->name ?> <?= $homeroom->description ?></li>
        <?php endforeach;
    } else {
        echo '<p>レコードなし</p>';
    }
    ?>
    
    <p>学期情報:</p>
    <?php
    if (!empty($periods)) {
        foreach ($periods as $period) : ?>
            <li><?= $period->name ?> <?= $period->from_date->format('Y-m-d') ?> <?= $period->to_date->format('Y-m-d') ?></li>
        <?php endforeach;
    } else {
        echo '<p>レコードなし</p>';
    }
    ?>
    
    <p>現在の学期:</p>
    <?php if (!empty($current_period)) { ?>
        <li><?= $current_period->name ?> <?= $current_period->from_date->format('Y-m-d') ?> <?= $current_period->to_date->format('Y-m-d') ?></li>
    <?php } ?>
    
    <p>出席情報:</p>
    <?php
    if (!empty($attendances)) {
        foreach ($attendances as $attendance) : ?>
            <li><?= $attendance->attendance_date->format('Y-m-d') ?> <?= $attendance->comment ?></li>
        <?php endforeach;
    } else {
        echo '<p>レコードなし</p>';
    }
    ?>
    
    

    <label>
        <!-- '/change_year/' + this.value -->
        <select style="font-size:12px;padding: 7px 10px;" onChange="location.href = '/home/school/#';">
            <option value="2021" selected>2021年度</option>
            <option value="2020" >2020年度</option>
            <option value="2019" >2019年度</option>
            <option value="2018" >2018年度</option>
            <option value="2017" >2017年度</option>
        </select>
    </label>
    <h2>授業のリスト</h2>
    <table>
        <thead>
        <tr>
            <th colspan="2">国語</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>国語総合</td>
            <td><a href="/school/lesson/12332">詳細</a></td>
        </tr>
        </tbody>
    </table>
    <a href='/'>ポートフォリオへもどる</a>
</body>
</html>
