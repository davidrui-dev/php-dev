<div class="dashboard-main-inner">
<div class="row">
    <div class="col-12">
        <div class="page-breadcrumb-content mb-40">
            <h1>Support Tickets</h1>
        </div>
    </div>
</div>
<style type="text/css">
	thead th
	{
		font-weight: bold;
	}
    a.ht-btn.theme-btn, button.ht-btn.theme-btn
    {
        height: auto !important;
    }

    @media only screen and (max-width: 600px) {
        a.ht-btn.theme-btn, button.ht-btn.theme-btn
        {
            height: auto !important;
            width: 100% !important;
            margin-left: 0px !important;
        }
    }

</style>

<div class="dashboard-overview">
    <div class="row">
    	<div class="col-xl-12 col-12">
            <div class="submited-applications mb-50">
                <div class="applications-heading">
                    <h3>Create New Tickets</h3>
                </div>
                <div class="applications-main-block">
                    <div class="applications-table" style="padding: 20px 0px;">
                        <div class="col-md-12">
                            <div class="single-input mb-25">                                
                                <input type="text" id="support_subject" name="support_subject" placeholder="Subject" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single-input mb-25">                                
                                <textarea name="support_query" id="support_query" rows="5" placeholder="Enter Your Query"></textarea>
                                <div id="error"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button style="margin-left: 20px;" class="ht-btn theme-btn theme-btn-two mb-xs-20" id="send_support_tickets">Submit</button>
                        </div>
                    </div>                    
                </div>
            </div>            
        </div>

        <div class="col-xl-12 col-12">
            <div class="submited-applications mb-50">
                <div class="applications-heading">
                    <h3>Support Tickets List</h3>
                </div>
                <div class="applications-main-block">
                    <div class="applications-table">
                        <table class="table" style="width: 100%;">
                            <thead style="background: #e7e7e7;">
                                <tr>
                                    <th>#ID</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Create Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            	$newUser=new Users();
                            	$supporttickets = $newUser->FindByUIDAll('support',$_SESSION['master_id']);
                            	if($supporttickets)
                            	{
                            		foreach ($supporttickets as $ticket) 
                            		{
                            			?>
                            			<tr class="application-item">
		                                	<td class="application-id">
		                                        <a href="#">#<?php echo $ticket->id; ?></a>
		                                    </td>
		                                    <td class="application-job">
		                                        <h3><a href="#"><?php echo $ticket->subject; ?></a></h3>
		                                    </td>
		                                   
		                                    <td class="status">
		                                    	<?php 
		                                    	if($ticket->subject == 0)
		                                    	{
		                                    		echo '<span class="approved">Active</span>';
		                                    	}
		                                    	else
		                                    	{
		                                    		echo '<span class="pending">Closed</span>';
		                                    	}
		                                        ?>
		                                    </td>

		                                    <td class="application-created">
		                                        <span><?php echo date("d-m-Y h:i A", strtotime($ticket->time)); ?> </span>
		                                    </td>
		                                    <td class="view-application-pop text-right">
                                                <a href="#"><i class="lnr lnr-eye"></i><span>View</span></a>
                                            </td>
		                                   
		                                </tr>
                            			<?php
                            		}
                            	}
                            	?>
                                
                               
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </div>            
        </div>        
    </div>
</div>