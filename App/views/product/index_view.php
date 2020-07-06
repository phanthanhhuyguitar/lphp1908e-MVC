<?php if(!defined('ROOT_APP_PATH')) die('Can not access'); ?>

<div class="container">
    <div class="col h-100 py-5">
        <h2 class="text-center">This is content - <?php echo $name; ?></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
            <?php $totalMoney = 0; ?>
            <?php foreach ($lstProduct as $key=>$item): ?>
            <?php $totalMoney+=$item['price']; ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td>
                        <img width="120" height="120" src="<?php echo UPLOAD_IMAGE . $item['image']; ?>">
                    </td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['price']; ?></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
               <tr>
                   <td colspan="3">Tong tien</td>
                   <td><?php echo $totalMoney; ?></td>
               </tr>
            </tfoot>
        </table>
    </div>

</div>