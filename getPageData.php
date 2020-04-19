<?php
require_once ("db.php");

if (! (isset($_GET['pageNumber']))) {
    $pageNumber = 1;
} else {
    $pageNumber = $_GET['pageNumber'];
}

$perPageCount = 10;

$sql = "SELECT * FROM album  WHERE 1";

if ($result = mysqli_query($conn, $sql)) {
    $rowCount = mysqli_num_rows($result);
    mysqli_free_result($result);
}

$pagesCount = ceil($rowCount / $perPageCount);

$lowerLimit = ($pageNumber - 1) * $perPageCount;

$sqlQuery = " SELECT * FROM album inner join performer on perform_id = performer_id inner join music_genre on genr_id = genre_id WHERE 1 limit " . ($lowerLimit) . " ,  " . ($perPageCount) . " ";
$results = mysqli_query($conn, $sqlQuery);

?>
<div class="grid-y medium-grid-frame">
    <div class="cell shrink header medium-cell-block-container">
        <div class="small-12">
        <br>
            <h5 class="text-center">Lemezeink</h5>
        <hr>
        </div>
    </div>
<div class="cell medium-auto medium-cell-block-container">
    <div class="grid-x grid-padding-x">
        <div class="cell medium-2 medium-cell-block-y">

        </div>
        <div class="cell medium-8 medium-cell-block-y">

            <table class="hover stack-for-small">
                <thead>
                <tr>
                    <th align="center">Előadó</th>
                    <th align="center">Album címe</th>
                    <th align="center">Kiadás éve</th>
                </tr>
                </thead>
                <?php foreach ($results as $data) { ?>
                    <tr>
                        <td align="left"><?php echo $data['performer'] ?></td>
                        <td align="left"><?php echo $data['title_of_record'] ?></td>
                        <td align="left"><?php echo $data['release_date'] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>


        </div>
        <div class="cell medium-2 medium-cell-block-y">

        </div>
        </div>
    </div>
    <div class="cell shrink footer">
        <p>
            Page <?php echo $pageNumber; ?> of <?php echo $pagesCount; ?>
        </p>
        <p>
            <?php
            for ($i = 1; $i <= $pagesCount; $i ++) {
                if ($i == $pageNumber) {
                    ?>
                    <a href="javascript:void(0);" class="current"><?php echo $i ?></a>
                    <?php
                } else {
                    ?>
                    <a href="javascript:void(0);" class="pages"
                       onclick="showRecords('<?php echo $perPageCount;  ?>', '<?php echo $i; ?>');"><?php echo $i ?></a>
                    <?php
                } // endIf
            } // endFor

            ?>
        </p>
    </div>
    </div>
</div>



