<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Name</th>
									<th class="text-center">Available Qty</th>
									<th class="text-center">Ordered Qty</th>
                                    <th class="text-center">Initial Qty</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$cats = $conn1->query("SELECT * from product_available_qty");
								if($_SESSION['login_branch'] == 'Dinajpur'){
									$cats = $conn2->query("SELECT * from product_available_qty");
								}
								if($_SESSION['login_branch'] == 'Barisal'){
									$cats = $conn3->query("SELECT * from product_available_qty");
								}
								if($_SESSION['login_branch'] == 'Jessore'){
									$cats = $conn4->query("SELECT * from product_available_qty");
								}
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p><b><?php echo $row['name'] ?></b></p>
									</td>
                                    <td class="text-center">
                                        <?php 
                                        $available_qty = $row['initial_qty'] - $row['ordered_qty'];
                                        ?>
                                        <p><b><?php echo $available_qty ?></b></p>
                                    </td>
                                    <td class="text-center">
                                        <p><b><?php echo $row['ordered_qty'] ?></b></p>
                                    </td>
                                    <td class="text-center">
                                        <p><b><?php echo $row['initial_qty'] ?></b></p>
                                    </td>
									<td style="max-width: 100px;">
                                    <div class="input-group input-group-sm">
                                        <input type="number" class="form-control" value="0" id="qty-<?php echo $row['id']; ?>">
                                        <div class="input-group-append">
                                        <button class="btn btn-primary" type="button"
                                            onclick="update_qty(<?php echo $row['id'] ?>, document.getElementById('qty-<?php echo $row['id']; ?>').value)">
                                            Add
                                        </button>
                                        </div>
                                    </div>
                                    </td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>

	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset !important;
	}
	.custom-switch,.custom-control-input,.custom-control-label{
		cursor:pointer;
	}
	b.truncate {
    overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 3; 
   -webkit-box-orient: vertical;	
    font-size: small;
    color: #000000cf;
    font-style: italic;
}
</style>
<script>
	function update_qty(id,qty){
		start_load()
        console.log(id,qty)
		$.ajax({
			url:'ajax.php?action=update_qty',
			method:'POST',
			data:{id:id,qty:qty},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>