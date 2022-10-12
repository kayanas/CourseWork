<?php

include "./header.php";

?>

<div class="container">



    <?php
    foreach ($shops as $i => $shop) {
        if ($i % 3 == 0) {
            echo '<div class="row">';
        }
    ?>
        <div class="card border-dark col-md-3">
            <h4 class="card-header"><?= $shop->name ?></h4>

            <img class="card-img" src="./images/<?= $shop->logo ?>">

            <p class="card-body">
            <h5><?= $shop->sales_field ?></h5>
            <h6>Accepts Cards - <?= ($shop->accepts_card == 0 ? " No" : " Yes") ?></h6>
            </p>

            <a href="#" class="btn btn-info">READ MORE</a>
        </div>

        <?php
        if ($i % 3 == 2) {
            echo '</div>';
        }
        ?>
    <?php } ?>

</div>

<?php include "./footer.php";
