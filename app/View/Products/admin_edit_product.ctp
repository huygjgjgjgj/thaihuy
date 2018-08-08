<div class="container" >
    <h2>Sửa chữa TT sản phẩm</h2>
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Tên sản phẩm *</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" name="Product[product_name]" value="<?php echo $product[0]['Product']['product_name']; ?>">
                <?php
                    if(!empty($error['product_name'])){
                        echo "<span>".$error['product_name'][0]."</span>";
                    }
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Giá tiền *</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" placeholder="giá bán" name="Product[amount]" value="<?php echo $product[0]['Product']['amount']; ?>">
                <?php
                    if(!empty($error['amount'])){
                        echo "<span>".$error['amount'][0]."</span>";
                    }
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Số lượng *</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="quantity" placeholder="số lượng sản phẩm" name="Product[quantity]" value="<?php echo $product[0]['Product']['quantity']; ?>">
                <?php
                    if(!empty($error['quantity'])){
                        echo "<span>".$error['quantity'][0]."</span>";
                    }
                ?>
            </div>
           
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Hình ảnh *</label>
            <div class="col-sm-10">
                <input type="text" name='Product[image]' class="form-control" id="code" placeholder="url image" value="<?php echo $product[0]['Product']['image']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Status</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="status" placeholder="status" name="Product[status]" value="<?php echo $product[0]['Product']['status']; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Sửa</button>
            </div>
        </div>
        
    </form>
</div>