<?php if($content['id']):?>
  <h1><?=$content['title']?></h1>
<div class='content'>
  <p><?=$content['content']?></p>
  <p class='smaller-text silent'><a href='<?=create_url("content/edit/{$content['id']}")?>'>edit</a> <a href='<?=create_url("content")?>'>view all</a></p>
<?php else:?>
<div class='content'>
  <p>404: No such page exists.</p>
<?php endif;?>
</div>