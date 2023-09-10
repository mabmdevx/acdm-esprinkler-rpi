<?php
include_once("lib/lib.rpiFunc.php");
// Access Rights - Start
$_SESSION['pageaccesstype']="superadmin#admin#agent";
// Access Rights - End

log_activity("Manual Control");

$errorMsg=""; // Clear Error Msg


	
if(isset($_POST['postbk']) && ($_POST['postbk']==1) )
{
	

	
	
	if(isset($errorMsg) && strlen($errorMsg)<=0) // If No Error - Start
	{		
	
		
		if(isset($_POST['btnx_on']))
		{
			rpi_turn_on(11);
			
			$_SESSION['successMsg']="Sprinkler Turned ON";
			log_activity("Sprinkler Turned ON");
			header("Location: ".HOME_PAGE."?pg=manual_control");
			exit;
		}
		
		if(isset($_POST['btnx_off']))
		{
			rpi_turn_off(11);
			 
			$_SESSION['successMsg']="Sprinkler Turned OFF";
			log_activity("Sprinkler Turned OFF");
			header("Location: ".HOME_PAGE."?pg=manual_control");
			exit;
		}

								

				
	}// If No Error - End
				
	
} // End for postback


?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Manual Control</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Control Sprinkler Manually
            </div>
            <div class="panel-body">
                <div class="row">
                	<div id="msgdiv" style="height:30px;">
                    <p>
                    <?php if(isset($errorMsg) && strlen($errorMsg)>0 ) { ?>
                    <div align="center" class="errorMsg"><strong><?php echo $errorMsg; ?></strong></div>
                    <?php } else if(isset($_SESSION['successMsg']) && strlen($_SESSION['successMsg'])>0 ) { ?>
                    <div align="center" class="successMsg"><strong><?php echo $_SESSION['successMsg']; ?></strong></div>
                    <?php } ?>
                    </p>
                    </div>
                    <div class="col-lg-12">
                    	<div align="center">
                        <form id="manualControlForm" name="manualControlForm" method="post" action="">
                          <input name="postbk" type="hidden" id="postbk" value="1" />
                            <button name="btnx_on" class="btn btn-success btn-lg">ON</button>
                            <button name="btnx_off" class="btn btn-danger btn-lg">OFF</button>
                        </form>
                        </div>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <p>&nbsp;</p>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php
// Clear Success Msg
$_SESSION['successMsg']="";
?>