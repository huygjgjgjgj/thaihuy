<h2>List Products</h2>            
<table class="table table-striped">
<thead>
	 <tr>
	<th>Stt</th>
	<th>product_name</th>
	<th>image</th>
	<th>amount</th>
	<th>quantity</th>
	<th>Manipulation</th>
	</tr>
</thead>
<tbody>
<?php
	foreach($products as $product){
		echo "<tr>
	        <td>".$i++."</td>
	        <td>". $product['Product']['product_name'] ."</td>
	        <td><img class='product_image' src='". $product['Product']['image'] ."' alt='".$product['Product']['product_name']."'></td>
	        <td>".$product['Product']['amount']."</td>
	        <td>".$product['Product']['quantity']."</td>
	        <td>
            	<a href='/admin/edit-product-".$product['Product']['id'].".html'> <button type='submit' id='edit-product' class='btn btn-edit' value='".$product['Product']['id']."' >sửa</button></a>&nbsp;&nbsp;
            	<a href='/admin/delete-product-".$product['Product']['id'].".html' id='delete-product'> <button type='submit'  class='btn btn-edit' value='".$product['Product']['id']."' >Xóa</button></a>
           	</td>
	  	</tr>";
	}  	
?>
</tbody>
</table>
<ul class="pagination">
    <?php
        echo "<li>" .$this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled'))."</li>" ;
        echo "<li>".$this->Paginator->numbers(array("separator" => ""))."</li> "; 
        echo "<li>" .$this->Paginator->next(' Next »', null, null, array('class' => 'disabled')). "</li>";                            
    ?>
</ul>
<span style="color:red;"><?php echo $add_success . $edit_success . $delete_success; ?></span>
<script type="text/javascript">
    $(document).ready(function() {
        return false;
    });
</script>