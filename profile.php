<?php
include 'admin/db_connect.php';

// Check if the form is submitted
if(isset($_POST['update_profile'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $branch = $_POST['branch'];
    
    // Only update password if provided
    $password_query = "";
    if(!empty($_POST['password'])){
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password_query = ", password = '$password'";
    }
    
    $user_id = $_SESSION['login_user_id'];
    
    // Update user info in all database connections
    $update_query = "UPDATE user_info SET 
                    first_name = '$first_name',
                    last_name = '$last_name',
                    mobile = '$mobile',
                    address = '$address',
                    email = '$email',
                    branch = '$branch'
                    $password_query
                    WHERE user_id = '$user_id'";
    
    $update = $conn1->query($update_query);
    $update2 = $conn2->query($update_query);
    $update3 = $conn3->query($update_query);
    $update4 = $conn4->query($update_query);
    
    
    if($update && $update2 && $update3 && $update4){
        // Update session variables
        $_SESSION['login_first_name'] = $first_name;
        $_SESSION['login_last_name'] = $last_name;
        $_SESSION['login_mobile'] = $mobile;
        $_SESSION['login_address'] = $address;
        $_SESSION['login_email'] = $email;
        $_SESSION['login_branch'] = $branch;
        
        echo "<script>alert('Profile updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating profile.');</script>";
    }
    
}
?>

<!-- Masthead-->

 <header class="masthead2">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-center mb-4 page-title">
                    	<h1 class="text-white">Profile</h1>
                        <hr class="divider my-4 bg-dark" />
                    </div>
                </div>
            </div>
        </header>
    <section class="page-section">
        <div class="container">
           <div class="container-fluid">
	<form action="" id="signup-frm" method="POST">
		<div class="form-group">
			<label for="" class="control-label">Firstname</label>
			<input type="text" name="first_name" required="" class="form-control" value="<?php echo $_SESSION['login_first_name'] ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Lastname</label>
			<input type="text" name="last_name" required="" class="form-control" value="<?php echo $_SESSION['login_last_name'] ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Contact</label>
			<input type="text" name="mobile" required="" class="form-control" value="<?php echo isset($_SESSION['login_mobile']) ? $_SESSION['login_mobile'] : '' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Address</label>
			<textarea cols="30" rows="3" name="address" required="" class="form-control"><?php echo isset($_SESSION['login_address']) ? $_SESSION['login_address'] : '' ?></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Email</label>
			<input type="email" name="email" required="" class="form-control" value="<?php echo isset($_SESSION['login_email']) ? $_SESSION['login_email'] : '' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" class="form-control">
			<small class="form-text text-muted">Leave empty to keep current password</small>
		</div>
		<div class="form-group">
			<label for="">Branch</label>
			<select name="branch" class="form-control">
				<option value="Dhaka" <?php echo (isset($_SESSION['login_branch']) && $_SESSION['login_branch'] == 'Dhaka') ? 'selected' : '' ?>>Dhaka</option>
				<option value="Dinajpur" <?php echo (isset($_SESSION['login_branch']) && $_SESSION['login_branch'] == 'Dinajpur') ? 'selected' : '' ?>>Dinajpur</option>
				<option value="Barisal" <?php echo (isset($_SESSION['login_branch']) && $_SESSION['login_branch'] == 'Barisal') ? 'selected' : '' ?>>Barisal</option>
				<option value="Jessore" <?php echo (isset($_SESSION['login_branch']) && $_SESSION['login_branch'] == 'Jessore') ? 'selected' : '' ?>>Jessore</option>
			</select>
		</div>
		<button type="submit" name="update_profile" class="button btn btn-info btn-sm">Update</button>
	</form>
</div>

            
        </div>
        </section>