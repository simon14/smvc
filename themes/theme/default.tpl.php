<!doctype html>
<html lang="<?=$language?>"> 
<head>
  <meta charset="<?=$character_encoding?>">
  <title><?=$title?></title>
  <link rel="stylesheet" href="<?=$stylesheet?>">
</head>
<body>
  <div id="header">
    <?=makeHeader();?>
  </div>
  <div id="main" role="main">
  	<?=get_messages_from_session()?>
    <?=@$main?>
    <?=render_views()?>
  </div>
  <div id="footer">
    <?=$footer?>
    <?=get_debug()?>
  </div>
</body>
</html>