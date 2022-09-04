<div class="section-heading" style="margin-bottom: 20px;">
    <h2 class="section-title" style="font-family: 'Playfair Display', sans-serif; font-weight: 700;">Cup Cakes</h2>
    <div class="title-divider">
        <img src="assets/images/title-divider.png" alt="divider">
    </div>
</div>
<div class="gallery-inner-wrap gallery-container grid">
    <?php
    for ($i = 1; $i < 7; $i++) { ?>

        <div class="single-gallery grid-item">
            <figure class="gallery-img">
                <a href="./assets/images/gallery-two/CupCake/cupcake-<?= $i ?>.jpg" data-fancybox="gallery">
                    <img src="./assets/images/gallery-two/CupCake/cupcake-<?= $i ?>.png" style="border-radius: 10px;" alt="Cake Korner Gallery cupcake-<?= $i ?>.png" />
                    <h4 style="border-radius: 10px;">
                        <img src="./assets/images/eye.png" style="width: 30px; height: auto;" />
                    </h4>
                </a>
            </figure>
        </div>
    <?php }

    ?>
</div>
<div class="gallery-inner-wrap gallery-container grid">
    <?php
    for ($i = 7; $i < 11; $i++) { ?>

        <div class="single-gallery grid-item">
            <figure class="gallery-img">
                <a href="./assets/images/gallery-two/CupCake/cupcake-<?= $i ?>.jpg" data-fancybox="gallery">
                    <img src="./assets/images/gallery-two/CupCake/cupcake-<?= $i ?>.png" style="border-radius: 10px;" alt="Cake Korner Gallery cupcake-<?= $i ?>.png" />
                    <h4 style="border-radius: 10px;">
                        <img src="./assets/images/eye.png" style="width: 30px; height: auto;" />
                    </h4>
                </a>
            </figure>
        </div>
    <?php }
    ?>
</div>