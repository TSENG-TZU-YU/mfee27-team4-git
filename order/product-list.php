<div class="row gy-4">
    <?php foreach ($rows as $row) : ?>
        <div class="col-md-4 ">
            <div>
                <figure class="ratio ratio-4x3 mb-2">
                    <img class="object-cover" src="../images/ins/<?= $row["image"] ?>" alt="">
                </figure>
                <div class="text-primary"><?= $row["cate"] ?></div>
                <h4 class="mb-2"><?= $row["name"] ?></h4>
                <p class="mb-2 ellipsis"><?=$row["intro"]?></p>
                <div class="text-end text-danger">$<?= $row["price"] ?></div>
                <div class="py-2">
                    <div class="d-grid">
                        <button data-id="<?=$row["product_id"]?>" data-cate="<?=$row["category"]?>" class="btn btn-grey btn-cart">+加到購物車</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>