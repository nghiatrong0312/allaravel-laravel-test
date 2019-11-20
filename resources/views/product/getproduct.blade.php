
    <div class="modal-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th></th>
              <th>Product Name</th>
              <th>Product Price</th>
              <th>Size</th>
              <th>Color</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($product as $key => $products): ?>
            <tr>
              <td><img src="<?php echo url('../storage/app/upload/', ['img' => $products['product_img']]) ?>"></td>
              <td><p><?php echo $products['product_name'] ?></p></td>
              <td><p><?php echo $products['product_price'] ?></p></td>
              <td><p>M</p></td>
              <td><p>Red</p></td>
            </tr>
          <?php endforeach ?>
          </tbody>
        </table>
    </div>
   
