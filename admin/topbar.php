<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 5px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
</style>

<nav class="navbar navbar-light bg-light fixed-top " style="padding:0;height:3.4em">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">
  			</div>
  		</div>
      <div class="col-md-4 float-left">
        <large style="font-family: 'Dancing Script', cursive !important;"><b><?php echo $_SESSION['setting_name']; ?> - Admin Site</b></large>
      </div>
	  	<div class="col-md-2 float-right">
        <span class="col-md-2 text-dark"><i class="fa fa-map-marker"></i> <?php echo $_SESSION['login_branch'] ?></span>
	  		<a href="ajax.php?action=logout" class="text-dark"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
</nav>