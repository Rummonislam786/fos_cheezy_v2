<div class="container-fluid">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Qty</th>
				<th>Order</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$total = 0;
			include 'admin/db_connect.php';
			$qry = $conn1->query("SELECT * FROM orders o inner join order_list ol on o.id = ol.order_id inner join product_list p on ol.product_id = p.id  where o.id =".$_GET['id'] );
			if(isset($_SESSION['login_branch'])){
				if($_SESSION['login_branch'] == 'Dinajpur'){
					$qry = $conn2->query("SELECT * FROM orders o inner join order_list ol on o.id = ol.order_id inner join product_list p on ol.product_id = p.id  where o.id =".$_GET['id']);
				}
				if($_SESSION['login_branch'] == 'Barisal'){
					$qry = $conn3->query("SELECT * FROM orders o inner join order_list ol on o.id = ol.order_id inner join product_list p on ol.product_id = p.id  where o.id =".$_GET['id']);
				}
				if($_SESSION['login_branch'] == 'Jessore'){
					$qry = $conn4->query("SELECT * FROM orders o inner join order_list ol on o.id = ol.order_id inner join product_list p on ol.product_id = p.id  where o.id =".$_GET['id']);
				}
			}
            $qrystatus = $conn1->query("SELECT status FROM orders where id = ".$_GET['id']);
			if(isset($_SESSION['login_branch'])){
				if($_SESSION['login_branch'] == 'Dinajpur'){
					$qrystatus = $conn2->query("SELECT status FROM orders where id = ".$_GET['id']);
				}
				if($_SESSION['login_branch'] == 'Barisal'){
					$qrystatus = $conn3->query("SELECT status FROM orders where id = ".$_GET['id']);
				}
				if($_SESSION['login_branch'] == 'Jessore'){
					$qrystatus = $conn4->query("SELECT status FROM orders where id = ".$_GET['id']);
				}
			}
			$status1 = $qrystatus->fetch_assoc();
			while($row=$qry->fetch_assoc()):
				$total += $row['qty'] * $row['price'];
			?>
			<tr>
				<td><?php echo $row['qty'] ?></td>
				<td><?php echo $row['name'] ?></td>
				<td><?php echo number_format($row['qty'] * $row['price'],2) ?></td>
			</tr>
		<?php endwhile; ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="2" class="text-right">TOTAL</th>
				<th ><?php echo number_format($total,2) ?></th>
			</tr>

		</tfoot>
	</table>
    <div class="text-center">
		<?php 
		if($status1['status'] == 0){
			?>
			<button class="btn btn-danger" id="confirm" type="button" onclick="confirm_order('4')">Cancel Order</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<?php
		}
		if($status1['status'] == 1){
			?>
			<button class="btn btn-danger" id="confirm" type="button" onclick="confirm_order('4')">Cancel Order</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<?php
		}
		if($status1['status'] == 2){
			?>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<?php
		}
		if($status1['status'] == 3){
			?>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<?php
		}
		?>
	</div>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
</style>
<script>
	function confirm_order(status){
		$.ajax({
			url:'admin/ajax.php?action=confirm_order',
			method:'POST',
			data:{id:'<?php echo $_GET['id'] ?>', status:status},
			success:function(resp){
                console.log(resp)
				if(resp == 1){
					if(status == 4){
						alert_toast("Order cancelled.")
					}
                    setTimeout(function(){
                        location.reload()
                    },1500)
				}
			}
		})
	}
</script>