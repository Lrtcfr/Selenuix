<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
                
        <title><?= NOM_BASE_SITE ? NOM_BASE_SITE : 'New Site' ?></title>
        <?php html(array('type' => 'css')) ?>
    </head>
    <body>
        <div class="site-hidden">
        <div class="push">
        <?php html(['type' =>'html','partials' => 'header']) ?>
            <div class="content">
                <?= $Session->Flash()  ?>
                <?php  echo $content ?>
            <?php html(['type' =>'html','partials' => 'footer']) ?>
            </div>
        </div>
        </div>
        <?php html(array('type' => 'js')) ?>
    </body>
</html>
