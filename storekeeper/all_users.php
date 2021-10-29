<?php include 'header.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Customers</h1>
                    </div>
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Subscribed Customers</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                                $i=0;
                                                $query=$db->query("SELECT * FROM subscribers");
                                                if(($query->num_rows)>0){
                                                   while($row=$query->fetch_assoc()){
                                                        $i+=1;
                                                        echo '<tr>';
                                                          echo '<td>'.$i.'</td>
                                                                <td>'.$row['name'].'</td>
                                                                <td>'.$row['phone'].'</td>
                                                                <td>'.$row['email'].'</td>';
                                                        echo '</tr>';
                                                   }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
<?php include "footer.php" ?>