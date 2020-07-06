<?php if(!defined('ROOT_APP_PATH')) die('Can not access'); ?>
<div class="container">
    <div class="row my-5">
        <?php foreach ($lstProduct as $key =>$item): ?>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <div class="card mb-3">
                <img src="<?php echo UPLOAD_IMAGE . $item['image'];?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item['name_product'];?></h5>
                    <p class="card-text"><?php echo number_format($item['price']) ?></p>
                    <p class="card-text"><?php echo $item['name_cate']; ?></p>
                    <p class="card-text"><?php echo $item['name_brand']; ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <?php echo $paginate;?>
        </div>
    </div>

</div>