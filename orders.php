<header class="masthead2">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-center mb-4 page-title">
                    	<h1 class="text-white">Orders</h1>
                        <hr class="divider my-4 bg-dark" />
                    </div>
                </div>
            </div>
        </header>
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
			include 'admin/db_connect.php';
			$qry = $conn1->query("SELECT * FROM orders where email = '".$_SESSION['login_email']."'");
			if($_SESSION['login_branch'] == 'Dinajpur'){
				$qry = $conn2->query("SELECT * FROM orders where email = '".$_SESSION['login_email']."'");
			}
			if($_SESSION['login_branch'] == 'Barisal'){
				$qry = $conn3->query("SELECT * FROM orders where email = '".$_SESSION['login_email']."'");
			}
			if($_SESSION['login_branch'] == 'Jessore'){
				$qry = $conn4->query("SELECT * FROM orders where email = '".$_SESSION['login_email']."'");
			}
			while($row=$qry->fetch_assoc()):
			 ?>
			 <tr>
			 		<td><?php echo $i++ ?></td>
			 		<td><?php echo $row['name'] ?></td>
			 		<td><?php echo $row['address'] ?></td>
			 		<td><?php echo $row['email'] ?></td>
			 		<td><?php echo $row['mobile'] ?></td>
			 		<?php if($row['status'] == 1): ?>
			 			<td class="text-center"><span class="badge badge-success">Confirmed</span></td>
			 		<?php else: ?>
			 			<td class="text-center"><span class="badge badge-secondary">For Verification</span></td>
			 		<?php endif; ?>
			 		<td>
			 			<button class="btn btn-sm btn-primary view_order_user" data-id="<?php echo $row['id'] ?>" >View Order</button>
			 		</td>
			 </tr>
			<?php endwhile; ?>
		</tbody>
	</table>

    <script>
	$('.view_order_user').click(function(){
		uni_modal('Order','view_order_user.php?id='+$(this).attr('data-id'))
	})
</script>