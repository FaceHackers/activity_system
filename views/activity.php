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
                    <th class="text-left">活動名稱</th>
                    <th class="text-left">參加人數</th>
                    <th class="text-left">是否攜伴</th>
                    <th class="text-left">可參加級別</th>
                    <th class="text-left">開始日期</th>
                    <th class="text-left">結束日期</th>
                    <th class="text-left">網址</th>
                </tr>
            </thead>
        <tbody class="table-hover">
            <?php
                foreach ($data as $row) {
            ?>
            <tr>
                <td class="text-left"><?=htmlspecialchars($row["name"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["max"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["bring"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["disables"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["start"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["end"]);?></td>
                <td class="text-left" ><a href="readmodify?show_id=<?=htmlspecialchars($row["activity_id"]);?>">報名網址</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    	
    </body>
</html>