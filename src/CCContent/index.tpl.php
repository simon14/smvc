<h1>Content Controller Index</h1>
<p>One controller to manage the actions for content, mainly list, create, edit, delete, view.</p>

<?php if($userAuth): ?>
<h2>Your content</h2>
<?php if($contents != null):?>
  <?php foreach($contents as $val):?>
  <?php if($val['owner']==$user['akronym']):?>
  		<p><?=$val['id']?>. <?=$val['title']?> - <?=$val['subtitle']?> - Writer: <?=$val['owner']?> 
		<a href='<?=create_url("content/edit/{$val['id']}")?>'>edit</a> <a href='<?=create_url("page/view/{$val['id']}")?>'>view</a> <a href='<?=create_url("page/delete/{$val['id']}/content")?>'>delete</a></p>
  <?php endif;?>
  <?php endforeach; ?>
<?php else:?>
  <p>No content exists.</p>
<?php endif;?>
<?php endif;?>

<h2>All content</h2>
<?php if($contents != null):?>
  <?php foreach($contents as $val):?>
  <?php if(empty($val['deleted'])):?>
  		<p><?=$val['id']?>. <?=$val['title']?> - <?=$val['subtitle']?> - Writer: <?=$val['owner']?> 
		<a href='<?=create_url("content/edit/{$val['id']}")?>'>edit</a> <a href='<?=create_url("page/view/{$val['id']}")?>'>view</a> <a href='<?=create_url("page/delete/{$val['id']}/content")?>'>delete</a></p>
  <?php endif;?>
  <?php endforeach; ?>
<?php else:?>
  <p>No content exists.</p>
<?php endif;?>

<h2>Actions</h2>
<ul>
  <li><a href='<?=create_url('content/create')?>'>Create new content</a>
</ul>