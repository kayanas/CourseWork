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

            <img class="card-title cards" src="./images/<?= $shop->logo ?>">

            <h5 class="card-body"><?= $shop->sales_field ?></h4>
                <h6 class="card-body"><?= ($shop->accepts_card == 0 ? "No" : "Yes") ?></h4>
                    <h6 class="card-body"><?= $shop->items_quantity ?></h4>


        </div>

        <?php
        if ($i % 3 == 2) {
            echo '</div>';
        }
        ?>
    <?php } ?>

</div>

<?php include "./footer.php";
