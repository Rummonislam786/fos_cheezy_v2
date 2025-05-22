 <!-- Masthead-->
 <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-center mb-4 page-title">
                    	<h1 class="text-white">Shopping Cart</h1>
                        <hr class="divider my-4 bg-dark" />
                    </div>
                    
                </div>
            </div>
        </header>
	<section class="page-section" id="menu">
        <div class="container">
        	<div class="row">
        	<div class="col-lg-8">
        		<div class="sticky">
	        		<div class="card">
	        			<div class="card-body">
	        				<div class="row">
		        				<div class="col-md-8"><b>Items</b></div>
		        				<div class="col-md-4 text-right"><b>Total</b></div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
        		<?php 
        		if(isset($_SESSION['login_user_id'])){
					$data = "where c.user_id = '".$_SESSION['login_user_id']."' ";	
				}else{
					$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
					$data = "where c.client_ip = '".$ip."' ";	
				}
				$total = 0;
				$get = $conn1->query("SELECT *,c.id as cid FROM cart c inner join product_list p on p.id = c.product_id ".$data);
				while($row= $get->fetch_assoc()):
					$total += ($row['qty'] * $row['price']);
        		?>

        		<div class="card">
	        		<div class="card-body">
		        		<div class="row">
			        		<div class="col-md-4 d-flex align-items-center" style="text-align: -webkit-center">
								<div class="col-auto">	
			        				<a href="admin/ajax.php?action=delete_cart&id=<?php echo $row['cid'] ?>" class="rem_cart btn btn-sm btn-outline-danger" data-id="<?php echo $row['cid'] ?>"><i class="fa fa-trash"></i></a>
								</div>	
								<div class="col-auto flex-shrink-1 flex-grow-1 text-center">	
			        				<img src="assets/img/<?php echo $row['img_path'] ?>" alt="">
								</div>	
			        		</div>
			        		<div class="col-md-4">
			        			<p><b><large><?php echo $row['name'] ?></large></b></p>
			        			<p class='truncate'> <b><small>Desc :<?php echo $row['description'] ?></small></b></p>
			        			<p> <b><small>Unit Price :<b style="font-weight: 800; font-size:0.9em">৳</b><?php echo number_format($row['price'],2) ?></small></b></p>
			        			<p><small>QTY :</small></p>
			        			<div class="input-group mb-3">
								  <div class="input-group-prepend">
								    <button class="btn btn-outline-secondary qty-minus" type="button"   data-id="<?php echo $row['cid'] ?>"><span class="fa fa-minus"></button>
								  </div>
								  <input type="number" readonly value="<?php echo $row['qty'] ?>" min = 1 class="form-control text-center" name="qty" >
								  <div class="input-group-prepend">
								    <button class="btn btn-outline-secondary qty-plus" type="button" id=""  data-id="<?php echo $row['cid'] ?>"><span class="fa fa-plus"></span></button>
								  </div>
								</div>
			        		</div>
			        		<div class="col-md-4 text-right">
			        			<b><large><b style="font-weight: 800; font-size:0.9em">৳</b><?php echo number_format($row['qty'] * $row['price'],2) ?></large></b>
			        		</div>
		        		</div>
	        		</div>
	        	</div>
	        <?php endwhile; ?>
	        <br>
			<div class="row">
				<div class="col-lg-6 text-center">
					<button class="btn btn-block btn-outline-success" type="button" id="add_more">Add More Items</button>
				</div>
				<div class="col-lg-6 text-center">
					<button class="btn btn-block btn-outline-danger" type="button" id="clear_cart">Clear Cart</button>
				</div>
			</div>
        	</div>
        	<div class="col-md-4">
        		<div class="sticky">
        			<div class="card">
        				<div class="card-body">
        					<p><large>Total Amount</large></p>
        					<hr>
        					<p class="text-right"><b><b style="font-weight: 800; font-size:0.9em">৳</b><?php echo number_format($total,2) ?></b></p>
        					<hr>
        					<div class="text-center">
        						<button class="btn btn-block btn-outline-dark" type="button" id="checkout">Proceed to Checkout</button>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	</div>
        </div>
    </section>
    <style>
    	.card p {
    		margin: unset
    	}
    	.card img{
		    max-width: calc(100%);
		    max-height: calc(59%);
    	}
    	div.sticky {
		  position: -webkit-sticky; /* Safari */
		  position: sticky;
		  top: 4.7em;
		  z-index: 10;
		  background: white
		}
		.rem_cart{
		   position: absolute;
    	   left: 0;
		}
    </style>
    <script>
        
        $('.view_prod').click(function(){
            uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
        })
        $('.qty-minus').click(function(){
		var qty = $(this).parent().siblings('input[name="qty"]').val();
		update_qty(parseInt(qty) -1,$(this).attr('data-id'))
		if(qty == 1){
			return false;
		}else{
			 $(this).parent().siblings('input[name="qty"]').val(parseInt(qty) -1);
		}
		})
		$('.qty-plus').click(function(){
			var qty =  $(this).parent().siblings('input[name="qty"]').val();
				 $(this).parent().siblings('input[name="qty"]').val(parseInt(qty) +1);
		update_qty(parseInt(qty) +1,$(this).attr('data-id'))
		})
		$('#add_more').click(function(){
			location.replace("index.php?#menu")
		})

		$('#clear_cart').click(function(){
			$.ajax({
				url:'admin/ajax.php?action=clear_cart',
				method:"POST",
				success:function(resp){
					location.reload()
				}
			})
		})

		function update_qty(qty,id){
			start_load()
			$.ajax({
				url:'admin/ajax.php?action=update_cart_qty',
				method:"POST",
				data:{id:id,qty},
				success:function(resp){
					location.reload()
				}
			})

		}
		$('#checkout').click(function(){
			// Prevent multiple clicks
			$(this).attr('disabled', true);
			
			// Start loading indicator
			start_load();
			
			// Check if user is logged in
			var isLoggedIn = <?php echo isset($_SESSION['login_user_id']) ? 'true' : 'false' ?>;
			
			// First validate the cart quantity
			$.ajax({
				url: 'admin/ajax.php?action=validate_cart_qty',
				method: 'POST',
				dataType: 'text',
				error: function(xhr, status, error) {
					console.log('Error during validation:', error);
					alert_toast("An error occurred during validation", "danger");
					end_load();
					$('#checkout').attr('disabled', false);
				},
				success: function(resp) {
					// If validation passes
					if(resp == 1) {
						// Different flow based on login status
						if(isLoggedIn) {
							// Redirect to checkout if logged in
						location.replace("index.php?page=checkout");
					} else {
							// Show login modal if not logged in
							end_load();
							$('#checkout').attr('disabled', false);
							uni_modal("Checkout","login.php?page=checkout");
						}
					} else {
						// If validation fails
						alert_toast("Some items in your cart exceed available quantity", "danger");
						setTimeout(function(){
							location.reload();
						}, 1500);
						end_load();
						$('#checkout').attr('disabled', false);
					}
				}
			});
		})
		function reload_cart(){
			$.ajax({
				url:'admin/ajax.php?action=get_cart_count',
				method:"POST",
				success:function(resp){
					if(resp == 1){
						location.reload()
					}
				}
			})
		}
    </script>
	
