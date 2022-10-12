<?php

include "./header.php";

?>

<form class="insert" action="" method="post" enctype="multipart/form-data">

    <input class="insert text" type="text" name="name" value="<?= $edit ? $shop->name : "" ?>" placeholder="Name">
    <input class="insert text" type="text" name="sales_field" value="<?= $edit ? $shop->sales_field : "" ?>" placeholder="Sales field">
    <input class="insert text" type="text" name="accepts_card" value="<?= $edit ? $shop->accepts_card : "" ?>" placeholder="Accepts card(1-Yes/0-No)">
    <input class="insert text" type="text" name="items_quantity" value="<?= $edit ? $shop->items_quantity : "" ?>" placeholder="Items quantity">
    <input class="insert text" type="hidden" name="id" value="<?= $edit ? $shop->id : "" ?>">
    <?php
    if ($edit) { ?>
        <button type="submit" name="update" class="btn btn-success save">Update</button>
    <?php } else { ?>
        <button type="submit" name="save" class="btn btn-primary save">Save</button>
    <?php } ?>

</form>

<!-- <?php echo $shops[3] ?> -->

<table class="container table table-hover">

    <tr>
        <th>ID
            <form class="sort" action="" method="GET">
                <input type="hidden" name="sort" value="id asc">
                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                    </svg></button>
            </form>


            <form class="sort" action="" method="GET">
                <input type="hidden" name="sort" value="id desc">
                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                    </svg></button>
            </form>
        </th>
        <th>Logo</th>
        <th>Name</th>
        <th>Sales field</th>
        <th>Accepts card</th>
        <th>Items quantity</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>

    <?php foreach ($shops as $shop) { ?>
        <tr>

            <?php
            echo '<td>' . $shop->id . '</td>';
            echo '<td>' . '<img class="logologo"src="./images/' . $shop->logo . '"></td>';
            echo '<td>' . $shop->name . '</td>';
            echo '<td>' . $shop->sales_field . '</td>';
            echo '<td>' . ($shop->accepts_card == 0 ? "No" : "Yes") . '</td>';
            echo '<td>' . $shop->items_quantity . '</td>';
            ?>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $shop->id ?>">
                    <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                </form>

            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $shop->id ?>">
                    <button type="submit" name="destroy" class="btn btn-danger">Delete</button>
                </form>

            </td>
        </tr>
    <?php } ?>

</table>

<!-- <img src="./images/"> -->
 <!-- <?php foreach ($shop as $values) { ?>
                <td> <?= $values ?> </td>

                <?php } ?> -->

<?php include "./footer.php";
