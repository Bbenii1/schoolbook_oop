<?php
echo <<<HTML
<form method='post' action='/students'>
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="id" value="{$students->id}">
    <fieldset>
    <label for="firstName">First Name</label>
    <input type="text" name="firstName" id="name" value="{$students->firstName}"><br>
    <label for="lastName">Last Name</label>
    <input type="text" name="lastName" id="name" value="{$students->lastName}">
    <label for="gender">Gender</label>
    <input type="text" name="gender" id="name" value="{$students->gender}">
    <label for="classID">Gender</label>
    <input type="text" name="classID" id="name" value="{$students->classID}">
    <br>
    <button type="submit" name="btn-update" class="btn-save"><i class="fa fa-save"></i>&nbsp;Mentés</button>
</fieldset>
</form>
<form method='post' action='/students'>
<input type="hidden" name="_method" value="GET">
<button type="submit" name="btn-cancel" class="btn-cancel"><i class="fa fa-undo"></i>&nbsp;Vissza</button>
</form>
HTML;
