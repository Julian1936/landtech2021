<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landtech Articles</title>
</head>
<body>

<?php 
    include 'includes/article-output.php';  
    include 'includes/author-table.php';    
    
    // Conversion Function
    function conversionRate($sales, $views) {
        $conversionRate = ($sales/$views) * 100;
        return number_format((float)$conversionRate, 2, '.', '');
    }
?>

<main>
    <div class="articles-wrapper">
        <div class="row">
            <div class="articles-inner">
                <?php echo $articleOutput; ?>
            </div>
        </div>
    </div>
    <div class="author-table-wrapper">
        <div class="row">
            <?php echo $authorTable; ?>
        </div>
    </div>
</main>
    
</body>
</html>