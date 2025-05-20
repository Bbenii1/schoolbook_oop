<?php
echo <<<HTML
<form method='post' action='/subjects'>
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="id" value="{$subjects->id}">
    <fieldset>
    <label for="subject">Tantárgy</label>
    <input type="text" name="name" id="name" value="{$subjects->subject}">
    <br>
    <button type="submit" name="btn-update"><i class="fa fa-save"></i>&nbsp;Mentés</button>
</fieldset>
</form>
<form method='post' action='/subjects'>
<input type="hidden" name="_method" value="GET">
<button type="submit" name="btn-cancel"><i class="fa fa-save"></i>&nbsp;Vissza</button>
</form>
HTML;