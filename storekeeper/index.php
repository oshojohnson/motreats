<?php include 'header.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Home</h1>
                    </div>
                     <div class="row">
                        <?php
                            $query=$db->query("SELECT * FROM orders");
                            $num_pending_orders=0;
                            $num_approved_orders=0;
                            if(($query->num_rows)>0){
                                while($row=$query->fetch_assoc()){
                                    if($row['status']==0){
                                        $num_pending_orders+=1;
                                    }
                                    elseif($row['status']==1){
                                        $num_approved_orders+=1;
                                    }
                                }
                            }
                            $qry2=$db->query("SELECT * FROM Orders where month(date_submited)=month(now())");
                            $month_total=$qry2->num_rows;
                         ?>   
                        <div class="col-xl-3 col-md-6 mb-4">
                             <a href="manage_orders.php">
                                <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pending Orders </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $num_pending_orders; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </a>
                        </div>
                         <div class="col-xl-3 col-md-6 mb-4">
                             <a href="manage_orders.php">
                                <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Approved Orders </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $num_approved_orders; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </a>
                        </div>
                         <div class="col-xl-3 col-md-6 mb-4">
                             <a href="manage_orders.php">
                                <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Orders This Month</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$month_total; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </a>
                        </div>
                        
                     </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php include "footer.php" ?>
          