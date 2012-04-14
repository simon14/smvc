<!doctype html>
<html lang="<?=$language?>"> 
<head>
  <meta charset="<?=$character_encoding?>">
  <title><?=$title?></title>
  <link rel="stylesheet" href="<?=$stylesheet?>">
</head>
<body>
<div class='wrapper'>
  <div class='header'>
    <?=makeHeader();?>
  </div>
</div>
<div class='wrapper'>
 <div class="main" role="main">
  	<p><?=get_messages_from_session()?></p>
    <?=@$main?>
    <?=render_views()?>
  </div>
  <div class="footer">
    <?=$footer?>
    <?=get_debug()?>
  </div>
</div>
</body>
</html>