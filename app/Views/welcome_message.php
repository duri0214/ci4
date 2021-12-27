<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome to CodeIgniter 4!</title>
        <meta name="description" content="The small framework with powerful features">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    
        <!-- for bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!-- for css -->
        <link rel="stylesheet" href="css/index.css">
        <!-- fontawesome -->
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    
    </head>
    <body>
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
                foreach ($vocabulary_book as $item): ?>
                    <tr class="sortable correct">
                        <?php foreach ($item as $td): ?>
                            <td><?= $td ?></td>
                        <?php endforeach;?>
                    </tr>
                <?php endforeach;
            } ?>
            </tbody>
        </table>
        
        <!-- for bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        
        <!-- for drug and drop -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        
        <!-- my script -->
        <script src="js/script.js"></script>
    </body>
</html>
