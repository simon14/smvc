<form action='<?=$formAction?>' method='post'>
        <p>
          <label>Message: <br/>
          <textarea name='newEntry'></textarea></label>
        </p>
        <p>
          <input type='submit' name='doAdd' value='Add message' />
          <input type='submit' name='doClear' value='Clear all messages' />
        </p>
</form>
<?php foreach($entries as $val):?>
<p>
Post: <?=$val['entry']?>
<br />
Time: <?=$val['date']?>
</p>
<?php endforeach;?>
