<?php

$tableBody = "";
foreach ($students as $s) {
    $tableBody .= <<<HTML
            <tr>
                <td>{$s->id}</td>
                <td>{$s->firstName}</td>
                <td>{$s->lastName}</td>
                <td>{$s->gender}</td>
                <td>{$s->classID}</td>
                <td class='flex float-right'>
                    <form method='post' action='/students/edit'>
                        <input type='hidden' name='id' value='{$s->id}'>
                        <button type='submit' name='btn-edit' title='Módosít'><i class='fa fa-edit'></i></button>
                    </form>
                    <form method='post' action='/students'>
                        <input type='hidden' name='id' value='{$s->id}'>    
                        <input type='hidden' name='_method' value='DELETE'>
                        <button type='submit' name='btn-del' title='Töröl'><i class='fa fa-trash trash'></i></button>
                    </form>
                </td>
            </tr>
            HTML;
}

$html = <<<HTML
        <table id='admin-classes-table' class='admin-classes-table'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Gender</th>
                    <th>classID</th>
                    <th>
                        <form method='post' action='/students/create'>
                            <button type="submit" name='btn-plus' title='Új'>
                                <i class='fa fa-plus plus'></i></button>
                        </form>
                    </th>
                </tr>
            </thead>
             <tbody>%s</tbody>
            <tfoot>
            </tfoot>
        </table>
        HTML;

echo sprintf($html, $tableBody);