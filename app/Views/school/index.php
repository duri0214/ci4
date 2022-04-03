<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>

        <!-- Bootstrap CSS -->
        <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                crossorigin="anonymous">
        
        <!-- css -->
        <link rel="stylesheet" href="assets/school/css/index.css">

        <!--jquery-->
        <script
                src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous"></script>
        
        <!-- select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
    <body>
        <h1>school</h1>
        <p>学校名: <?= $school->name ?? null ?></p>
        <p>所在地: 〒<?= $school->zipcode ?? null ?> <?= $school->address ?? null ?></p>
        <p>tel: <?= $school->tel ?? null ?></p>
        <p>学校のカテゴリー: <?= $schoolCategory->name ?? null ?></p>

        <label>
            <select class="select2-curriculum form-control" name="curriculum">
                <option></option>
                <?php
                if (!empty($curriculumChoices)) {
                    foreach ($curriculumChoices as $curriculumChoice) {
                        echo('<option>');
                        echo($curriculumChoice->name.' '.$curriculumChoice->remark);
                        echo('</option>');
                    }
                }
                ?>
            </select>
        </label>

        <label>
            <select class="select2-homeroom form-control" name="curriculum">
                <option></option>
                <?php
                if (!empty($homeroomChoices)) {
                    foreach ($homeroomChoices as $homeroom) {
                        echo('<option>');
                        echo($homeroom->name.' '.$homeroom->remark);
                        echo('</option>');
                    }
                }
                ?>
            </select>
        </label>


        <p>カリキュラム（id=1）がもつすべての学期リスト:</p>
        <?php
        if (!empty($periods)) {
            foreach ($periods as $period) : ?>
                <li><?= $period->name ?> <?= $period->from_date->format('Y-m-d') ?> ～ <?= $period->to_date->format('Y-m-d') ?></li>
            <?php endforeach;
        } else {
            echo '<p>レコードなし</p>';
        }
        ?>

        <p>現在の学期:</p>
        <?php if (!empty($currentPeriod)) { ?>
            <li><?= $currentPeriod->name ?> <?= $currentPeriod->from_date->format('Y-m-d') ?> ～ <?= $currentPeriod->to_date->format('Y-m-d') ?></li>
        <?php } else {
            echo '<p>レコードなし</p>';
        } ?>
        
        <p>出席情報:</p>
        <?php
        if (!empty($attends)) {
            foreach ($attends as $attend) : ?>
                <li><?= $attend->attend_date->format('Y-m-d') ?> <?= $attend->remark ?></li>
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
        <p><a href="<?= route_to('lesson_list') ?>">授業管理へ</a></p>
        <p><a href="<?= route_to('cert_list') ?>">資格管理へ</a></p>
        <a href="<?= route_to('home') ?>">ポートフォリオへもどる</a>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

<script>
    $(document).ready(function() {
        $('.select2-curriculum').select2({
            placeholder: "カリキュラムを選択してください",
            allowClear: true,
            width: '100%'
        });
    });
    $(document).ready(function() {
        $('.select2-homeroom').select2({
            placeholder: "ホームルームを選択してください",
            allowClear: true,
            width: '100%'
        });
    });
</script>
