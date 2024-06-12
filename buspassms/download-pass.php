<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Bus Pass Management System || Pass Page</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">  
<link href="css/font-awesome.css" rel="stylesheet">		<!-- font-awesome icons -->  
<!-- //Custom Theme files -->  
<!-- web-fonts -->   
<link href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>  
	<!-- banner -->
	<div class="agileits-banner">
		<div class="bnr-agileinfo"> 
			<!-- navigation -->
			<?php include_once('includes/header.php');?>
			<!-- //navigation -->
			<!-- banner-text -->
			<div class="banner-text agileinfo about-bnrtext"> 
				<div class="container">
					<h2><a href="index.php">Home</a> / View Pass</h2> 
				</div>
			</div>
			<!-- //banner-text -->   
		</div>
	</div>
	<!-- //banner --> 
	<!-- contact -->
	<div class="contact agileits">
		<div class="container">  
			<div class="agileits-title">
				<h3>View Pass</h3>
			</div>  
			<div class="contact-agileinfo">
				<div class="col-md-7 contact-form wthree">
					<form action="#" method="post">
						<input id="searchdata" type="text" name="searchdata" placeholder="Search by Pass Number" required="true">
					 <button style="padding-top: 14px;" type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
					</form>
				</div>
				
				<div class="clearfix"> </div>	
				<div class="table-responsive">
                                 <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 style="padding-bottom: 20px;">Result against "<?php echo $sdata;?>" keyword </h4>
                                <table border="2" class="table table-bordered" style="font-size: 18px;">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                           <th>Pass Number</th>
                                            <th>Full Name</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>Creation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$sql="SELECT * from tblpass where PassNumber like '$sdata%'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                                           <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php  echo htmlentities($row->PassNumber);?></td>
                  <td><?php  echo htmlentities($row->FullName);?></td>
                  <td><?php  echo htmlentities($row->ContactNumber);?></td>
                  <td><?php  echo htmlentities($row->Email);?></td>
                  <td><?php  echo htmlentities($row->PasscreationDate);?></td>
                  <td><a href="view-pass-detail.php?viewid=<?php echo htmlentities ($row->ID);?>" class="btn btn-primary">View </a></td>
                </tr>
               <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?> 
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
			</div>
		</div>
	</div>
	<!-- //contact -->  
	 
	
<?php include_once('includes/footer.php');?>   
 
	<!-- js --> 
	<script src="js/jquery-2.2.3.min.js"></script> 
	<script src="js/SmoothScroll.min.js"></script>
	<script src="js/jarallax.js"></script> 
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>  
	<!-- //js -->  
	<!-- start-smooth-scrolling --> 
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>	
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->	 
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->  
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>