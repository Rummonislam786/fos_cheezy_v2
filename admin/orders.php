<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<table class="table table-bordered">
		<thead>
			 <tr>

			<th>#</th>
			<th>Name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Status</th>
			<th></th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$i = 1;
			include 'db_connect.php';
			$qry = $conn1->query("SELECT * FROM orders ");
			if($_SESSION['login_branch'] == 'Dinajpur'){
				$qry = $conn2->query("SELECT * FROM orders ");
			}
			if($_SESSION['login_branch'] == 'Barisal'){
				$qry = $conn3->query("SELECT * FROM orders ");
			}
			if($_SESSION['login_branch'] == 'Jessore'){
				$qry = $conn4->query("SELECT * FROM orders ");
			}
			while($row=$qry->fetch_assoc()):
			 ?>
			 <tr>
			 		<td><?php echo $i++ ?></td>
			 		<td><?php echo $row['name'] ?></td>
			 		<td><?php echo $row['address'] ?></td>
			 		<td><?php echo $row['email'] ?></td>
			 		<td><?php echo $row['mobile'] ?></td>
				<?php 
					
                switch ($row['status']) {
                    case '1':
                        echo '<td class="text-center" data-status="1"><span class="badge badge-success">Preparing...</span></td>';
                        break;
					case '2':
						echo '<td class="text-center" data-status="2"><span class="badge badge-warning">Delivering</span></td>';
                        break;
                    case '3':
                        echo '<td class="text-center" data-status="3"><span class="badge badge-success">Delivered</span></td>';
                        break;
                    case '4':
                        echo '<td class="text-center" data-status="4"><span class="badge badge-danger">Cancelled</span></td>';
                        break;
                    default:
                        echo '<td class="text-center" data-status="0"><span class="badge badge-secondary">For Payment Verification</span></td>';
                        break;
                }
                ?>
			 		<td>
			 			<button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>" >View Order</button>
			 		</td>
			 </tr>
			<?php endwhile; ?>
		</tbody>
	</table>
		</div>
	</div>
	
</div>
<script>
	$('.view_order').click(function(){
		uni_modal('Order','view_order.php?id='+$(this).attr('data-id'))
	})

</script>