<?php
echo <<<HTML
<form method='post' action='/classes'>
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="id" value="{$classes->id}">
    <fieldset>
    <label for="class_name">Osztály</label>
    <input type="text" name="class" id="name" value="{$classes->class}"><br>
    <label for="year">Év</label>
    <input type="text" name="schoolYear" id="name" value="{$classes->schoolYear}">
    <br>
    <button type="submit" name="btn-update" class="btn-save"><i class="fa fa-save"></i>&nbsp;Mentés</button>
</fieldset>
</form>
<form method='post' action='/classes'>
<input type="hidden" name="_method" value="GET">
<button type="submit" name="btn-cancel" class="btn-cancel"><i class="fa fa-undo"></i>&nbsp;Vissza</button>
</form>
HTML;
