<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Bus Pass Management System || View Pass Page</title>

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
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=1000,height=1000');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
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
				
				
				<div class="clearfix"> </div>	
				<div class="table-responsive" id="divToPrint">
                                 <?php
$vid=$_GET['viewid'];
$sql="SELECT * from  tblpass where ID=$vid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                    <table border="2" class="table table-bordered" style="font-size: 18px;" > 
                                    <tr align="center">
<td colspan="6" style="font-size:20px;color:blue">
 Pass ID: <?php  echo ($row->PassNumber);?></td></tr>
   <tr>
        <th scope>Category</th>
    <td colspan="3"><?php  echo ($row->Category);?></td>
  </tr>
<tr>
    <th scope>Full Name</th>
    <td colspan="3"><?php  echo ($row->FullName);?></td>
    
  </tr>
  <tr>
    <th scope>Photo</th>
    <td colspan="3"><img src="admin/images/<?php  echo ($row->ProfileImage);?>" width="50" height="50"></td>

  </tr>

  <tr>
    <th scope>Mobile Number</th>
    <td><?php  echo ($row->ContactNumber);?></td>
    <th scope>Email</th>
    <td><?php  echo ($row->Email);?></td>
  </tr>
<tr>
    <th scope>Identity Type</th>
    <td><?php  echo ($row->IdentityType);?></td>
    <th scope>Identity Card Number</th>
    <td><?php  echo ($row->IdentityCardno);?></td>

  </tr>
  <tr>
    <th scope>Source</th>
    <td><?php  echo ($row->Source);?></td>
    <th scope>Destination</th>
    <td><?php  echo ($row->Destination);?></td>
  </tr>
<tr>
    <th scope>From Date</th>
    <td><?php  echo ($row->FromDate);?></td>
    <th scope>To Date</th>
    <td><?php  echo ($row->ToDate);?></td>
  </tr>
  <tr>
    
    <th scope>Cost</th>
    <td><?php  echo ($row->Cost);?></td>
    <th scope>Pass Creation Date</th>
    <td><?php  echo ($row->PasscreationDate);?></td>
  </tr>
                                    
   <?php $cnt=$cnt+1;}} ?>
   </table>
   
  <input type="button" style="padding-right: 20px" class="btn btn-primary" value="print" onclick="PrintDiv();" /></p>
    
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