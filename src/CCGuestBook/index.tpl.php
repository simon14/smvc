<form action='<?=$formAction?>' method='post'>
        <p>
          <label>
          <textarea name='newEntry'></textarea></label>
        </p>
        <p>
          <input type='submit' name='doAdd' value='Add message' />
          <input type='submit' name='doClear' value='Clear all messages' />
        </p>
</form>
<?php foreach($entries as $val):?>
<p class='post'>
<?=$val['entry']?>
<br />
<small>Posted on: <?=$val['date']?></small>
</p>
<?php endforeach;?>
