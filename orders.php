<header class="masthead2">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-center mb-4 page-title">
                    	<h1 class="text-white">My Orders</h1>
                        <hr class="divider my-4 bg-dark" />
                    </div>
                </div>
            </div>
        </header>
        <div class="row mb-5"></div>
   
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
			$qry = $conn1->query("SELECT * FROM orders where email = '".$_SESSION['login_email']."' and status != '4'");
			if($_SESSION['login_branch'] == 'Dinajpur'){
				$qry = $conn2->query("SELECT * FROM orders where email = '".$_SESSION['login_email']."' and status != '4'");
			}
			if($_SESSION['login_branch'] == 'Barisal'){
				$qry = $conn3->query("SELECT * FROM orders where email = '".$_SESSION['login_email']."' and status != '4'");
			}
			if($_SESSION['login_branch'] == 'Jessore'){
				$qry = $conn4->query("SELECT * FROM orders where email = '".$_SESSION['login_email']."' and status != '4'");
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
                        echo '<td class="text-center"><span class="badge badge-success">Preparing...</span></td>';
                        break;
					case '2':
						echo '<td class="text-center"><span class="badge badge-warning">Delivering</span></td>';
                        break;
                    case '3':
                        echo '<td class="text-center"><span class="badge badge-success">Delivered</span></td>';
                        break;
                    case '4':
                        echo '<td class="text-center"><span class="badge badge-danger">Cancelled</span></td>';
                        break;
                    default:
                        echo '<td class="text-center"><span class="badge badge-secondary">For Payment Verification</span></td>';
                        break;
                }
                ?>
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
    
    $('#login_now').click(function(){
		uni_modal('Login','login.php')
	})

    $('#order_search').on('input', function() {
        var searchValue = $(this).val().toLowerCase();
        $('table tbody tr').each(function() {
            var rowText = $(this).text().toLowerCase();
            if (rowText.indexOf(searchValue) > -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
</script>