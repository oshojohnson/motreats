<?php include 'header.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Menu</h1>
                    </div>
                        
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Top Menu</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <button class="btn btn-primary" id="add_top_product" data-target="#addProduct" data-toggle="modal">Add Menu</button>
                                    </div>
                                    <br>
                                    <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Item</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Item</th>
                                                 <th>Description</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                                $i=0;
                                                $query=$db->query("SELECT * FROM menu WHERE priority =1");
                                                if(($query->num_rows)>0){
                                                   while($row=$query->fetch_assoc()){
                                                        $i+=1;
                                                        echo '<tr>';
                                                        echo  '<td>'.$i.'</td>'.'<td>'.$row["product_name"].'</td><td>'.$row["product_desc"].'</td><td>'.$row["product_price"].'<td>'.$row["product_category"].'</td><td><button type="button" onclick=delete_item('.$row["id"].') class="prod_del btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>';
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
<div id="addProduct" class="modal" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <h5 class="modal-title">Add Top Menus</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <p class="red_color"><i>This form manages the top menu that appears on landing page</i></p>
            <form>
                <div class="form-group">
                    <p>This category is currently unavailable</p>
                </div>
               
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-warning" type="button" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
            <!-- Footer -->
<?php include "footer.php" ?>
<script type="text/javascript">
        function delete_item(item_id){
            $.ajax({
                url:"process.php",
                type:"post",
                data:{item_id:item_id,update_top_item:1},
                success:function(response){
                    if(response==1){
                        swal("Done","Successfully deleted","success");
                        window.location='top_products.php';
                    }else{
                        swal("Opps!","Deletion Failed","warning");
                    }
                }
            });
        }
        $('#add_product').click(function(){
            var item_id= $('#select_prod').val();
            $.ajax({
                url:"process.php",
                type:"post",
                data:{id:item_id,new_top_product:1},
                success:function(response){
                    if(response==1){
                        swal("Done","Successfully Added","success");
                         window.location='top_products.php';
                    }else{
                        swal("Opps!","Failed","warning");
                    }
                }
            });     
        });
</script>