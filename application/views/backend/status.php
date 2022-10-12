<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
         <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-calendar-check-o" style="color:#1976d2"></i>Status</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Status</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>Status/Save_Status" class="text-white"><i class="" aria-hidden="true"></i> Add Status </a></button>

                        <!--<button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="#" class="text-white" data-toggle="modal" data-target="#Bulkmodal"><i class="" aria-hidden="true"></i>  Add Bulk Status</a></button> -->

                        <!-- <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="#" class="text-white" data-toggle="modal" data-target="#Bulkmodal"><i class="" aria-hidden="true"></i>  Add Bulk Status</a></button> -->
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>Status/Status_Report" class="text-white"><i class="" aria-hidden="true"></i> Status Report </a></button>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Status List  </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="status" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                   
                                    <thead>

                                            <tr>
                                            <th>Employee Name</th>
                                            <th>Working Hour</th>
                                            <th>Description</th>
                                            <th>Report Date </th>
                                             <th>Place</th>
                                               <th>Action</th>  
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php   if($this->session->userdata('user_type') == "ADMIN" || $this->session->userdata('user_type') == "SUPER ADMIN"){?>
                                           <?php foreach($statuslist as $value): ?>
                                            <tr>   
                                            
                                                 <td><?php echo $value->em_id; ?></td> 
                                                 <td><?php echo $value->working_hours; ?></td>
                                                <td><?php echo $value->description; ?></td>
                                                <td><?php echo $value->report_date; ?></td> 
                                                <td><?php echo $value->place; ?></td>
                                                <td class="jsgrid-align-center ">
                                              
                                                <a href="<?php echo base_url(); ?>status/inview/?A=<?php echo $value->id;?>" title="view" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-eye"></i></a>
                                                 <a href="<?php echo base_url();?>status/save_status/?A=<?php echo $value->id;?>" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a>
                                                </td>
                                                
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php }?> 
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<div id="Bulkmodal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                           <form method="post" action="import" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Add Status</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Import Status<span><img src="<?php echo base_url(); ?>assets/images/finger.jpg" height="100px" width="100px"></span>Upload only CSV file</h4>
                                             
                                            <input type="file" name="csv_file" id="csv_file" accept=".csv"><br><br>
                                                                                        
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success waves-effect">Save</button>
                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>                             
<?php $this->load->view('backend/footer'); ?>
<script>
    $('#status').DataTable({
        "aaSorting": [[2,'desc']],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>