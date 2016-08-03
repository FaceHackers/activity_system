<!DOCTYPE html>
<html>
    <head>
     <?PHP require_once('header.php'); ?>       
    </head>
    <body>
    <?php
        require_once 'meun.php';
    ?>
        <table class="table-fill">
            <thead>
                <tr>
                    <th class="text-left">員工編號</th>
                    <th class="text-left">員工名稱</th>
                    <th class="text-left">部門</th>
                    <th class="text-left">級別</th>
                </tr>
            </thead>
        <tbody class="table-hover">
            <?php
                foreach ($data as $row) {
            ?>
            <tr>
                <td class="text-left"><?=htmlspecialchars($row["employee_id"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["name"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["department"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["disables"]);?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    	
    </body>
</html>