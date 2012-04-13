<!doctype html>
<html lang="<?=$language?>"> 
<head>
  <meta charset="<?=$character_encoding?>">
  <title><?=$title?></title>
  <link rel="stylesheet" href="<?=$stylesheet?>">
</head>
<body>
  <div id="header">
    <?=$header?>
  </div>
  <div id="main" role="main">
    <?=$main?>
  </div>
  <div id="footer">
    <?=$footer?>
    <?=get_debug()?>
  </div>
</body>
</html>