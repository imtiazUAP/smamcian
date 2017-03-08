<div style='overflow: auto; ' class="col-sm-2 sidenav visible-md visible-lg">
    <ul class="list-group">
        <?php
        $strquery = "SELECT * FROM batch";
        $results = mysql_query($strquery);
        $num = mysql_numrows($results);
        $i = 0;
        while ($i < $num) {
            $batchId = mysql_result($results, $i, "batch_id");
            $batchName = mysql_result($results, $i, "batch_name");
            ?>

            <li class="list-group-item"><a href="batch.php?batch_id=<?= $batchId ?>"><?php echo $batchName ?></a></li>

            <?php
            $i++;
        }
        ?>
    </ul>
</div>