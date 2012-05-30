<h1>DIY: Install SMVC</h1>

<p>
<li>Fix the .htaccess file so it points to your address.
<li>Open the config-file 'site/config.php' and enter the database info.
Currently this framework only work with MySQL.
</p>

<p>When that is done, just press this link: <a href='<?=create_url('modules/install')?>'>Install (Put some tables into database)</a></p>
<p>If you ever wonder about the structure, you can always check out the documentation here: <a href='<?=create_url('docs/')?>'>SMVC Documentation</a></p>

<h1>Links around the site.</h1>
<div class='content'>
<ul>
<?php foreach($menu as $val):?>
<li><a href='<?=$val?>'><?=$val?></a></li>
<?php endforeach;?>
</ul>
</div>
