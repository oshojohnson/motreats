<?php include 'header.php' ?>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Manage Orders</h1>
                    </div>
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">All Orders</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Order ID</th>
                                                <th>Product ID</th>
                                                <th>View Details</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Order ID</th>
                                                <th>Product ID</th>
                                                <th>View Details</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                                $i=0;
                                                $query=$db->query("SELECT * FROM orders");
                                                if(($query->num_rows)>0){
                                                   while($row=$query->fetch_assoc()){
                                                        $i+=1;
                                                        echo '<tr>';
                                                          echo '<td>'.$i.'</td>
                                                                <td>#MOTID_00'.$row['id'].'</td>
                                                                <td>'.$row['product_id'].'</td>
                                                                <td><button data-id='.$row['id'].' class="open_order btn btn-primary">View Details</button></td>';
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
            </div>
<div id="ManageOrders" class="modal" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <h5 class="modal-title">Manage Orders</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <p class="submit_notice"></p>
            <form id="product_form" method="post" enctype="multipart/form-data" class="form" action="process.php">
                <input type="text" name="" id="order_id" style="display: none;">
                <table class="table">
                    <tbody id="order_table">
                        
                    </tbody>
                </table>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
        </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
<script type="text/javascript">
     $(document).ready(function(){
        $('.open_order').click(function(){
                 var order_id = $(this).attr('data-id');
                 $(".modal-body #order_id").val( order_id );
                 $("#ManageOrders").modal('show');
        });
        $("#ManageOrders").on('shown.bs.modal', function(){
                var order_id=$('#order_id').val();
               fetch_orders(order_id);
        });
       
    });
     function fetch_orders(order_id){
             $.ajax({
                url:"process.php",
                type:"post",
                data:{order_id:order_id,get_orders:1},
                success:function(response){
                    if(response){
                       //var output= JSON.parse(response);  
                       $('#order_table').html(response);
                    }else{
                        $('#edit_errs').html('<span class="alert alert-danger">Error!</span>');
                    }
                 }
                });
     }
      function confirm_orders(order_id){
             if(confirm("This order will be marked processed")){
                $.ajax({
                url:"process.php",
                type:"post",
                data:{order_id:order_id,submit_order:1},
                success:function(response){
                    if(response){
                       //var output= JSON.parse(response);  
                       swal("OK","Order successfully processed","success");
                       fetch_orders(order_id);
                    }else{
                        $('#edit_errs').html('<span class="alert alert-danger">Error!</span>');
                    }
                 }
                });
             }
            
        }
</script>