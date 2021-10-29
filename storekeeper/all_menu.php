<?php include 'header.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">All Menu</h1>
                    </div>
                                <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Manage All Menu</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <button class="btn btn-primary" id="add_top_product" data-target="#addProduct" data-toggle="modal">Add Menu</button>
                                    </div>
                                    <br>
                                    <p class="product_msg"></p>
                                    <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
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
                                        <tbody id="product_tbl">
                                          
                                            <?php 
                                                $i=0;
                                                $query=$db->query("SELECT * FROM menu");
                                                if(($query->num_rows)>0){
                                                   while($row=$query->fetch_assoc()){
                                                        $i+=1;
                                                        echo '<tr>';
                                                        echo  '<td>'.$i.'</td>'.'<td>'.$row["product_name"].'</td><td>'.$row["product_desc"].'</td><td>'.$row["product_price"].'<td>'.$row["product_category"].'</td><td><a href="'.$row["product_directory"].'" target="_blank"><button type="button"  class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button></a><button type="button" onclick=delete_item('.$row["id"].') class="prod_del btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> <button type="button" data-id="'.$row["id"].'" class="prod_edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></td>';
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
<div id="editProduct" class="modal" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <h5 class="modal-title">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <p id="edit_err"></p>
           
            
        </div>
        <div class="modal-footer">
            
        </div>
        </div>
    </div>
</div>
<div id="addProduct" class="modal" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <h5 class="modal-title">Add Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <p class="submit_notice"></p>
            <p>This category is currently unavailable</p>
        </div>
        <div class="modal-footer">
            
        </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.prod_edit').click(function(){
                 var product_id = $(this).attr('data-id');
                 $(".modal-body #product_id").val( product_id );
                 $("#editProduct").modal('show');
        });
        $("#product_form").on('submit',(function(e) {
            e.preventDefault();
        var name=$('#product_name').val();
         $.ajax({
                url: 'process.php',
                type:'post',
                 data:  new FormData(this),
                 contentType: false,
                 cache: false,
                processData:false,
                success:function(response){
                    if(response==1){
                         refresh_product_tb();
                        $('.submit_notice').html('<span class="alert alert-success"><i class="fa fa-info-circle"></i> Submitted Successfully</span>');
                    }
                    else if(response==2){
                        $('.submit_notice').html('<span class="alert alert-danger">Failed to submit! Form encounter an unexpected error.</span>');
                    }
                    else if(response==3){
                        $('.submit_notice').html('<span class="alert alert-danger">Failed to Submit!</span>');
                    }
                    else if(response==4){
                        $('.submit_notice').html('<span class="alert alert-danger">Failed to Submit! Unable to upload file. Try again</span>');
                    }
                    else if(response==5){
                        $('.submit_notice').html('<span class="alert alert-danger">Failed to Submit! File format not supported</span>');
                    }
                    else if(response==6){
                        $('.submit_notice').html('<span class="alert alert-danger">Failed to Submit! File yet to be selected</span>');
                    }
                    else if(response==7){
                        $('.submit_notice').html('<span class="alert alert-danger">Failed to Submit! Product Name already exist</span>');
                    }

                }
            });
     }));
    $("#edit_product_form").on('submit',(function(e) {
            e.preventDefault();
         $.ajax({
                url: 'process.php',
                type:'post',
                 data:  new FormData(this),
                 contentType: false,
                 cache: false,
                processData:false,
                success:function(response){
                    if(response==1){
                         refresh_product_tb();
                        $('.submit_notice').html('<span class="alert alert-success"><i class="fa fa-info-circle"></i> Submitted Successfully</span>');
                    }
                    else if(response==2){
                        $('.submit_notice').html('<span class="alert alert-danger">Failed to submit! Form encounter an unexpected error.</span>');
                    }
                    else if(response==3){
                        $('.submit_notice').html('<span class="alert alert-danger">Failed to Submit!</span>');
                    }
                    else if(response==4){
                        $('.submit_notice').html('<span class="alert alert-danger">Failed to Submit! Unable to upload file. Try again</span>');
                    }
                    else if(response==5){
                        $('.submit_notice').html('<span class="alert alert-danger">Failed to Submit! File format not supported</span>');
                    }
                    else if(response==6){
                        $('.submit_notice').html('<span class="alert alert-danger">Failed to Submit! File yet to be selected</span>');
                    }
                    else if(response==7){
                        $('.submit_notice').html('<span class="alert alert-danger">Failed to Submit! Product Name already exist</span>');
                    }

                }
            });
     }));
        $("#editProduct").on('shown.bs.modal', function(){
                var item_id=$('#product_id').val();
                $.ajax({
                url:"process.php",
                type:"post",
                data:{item_id:item_id,edit_prod:1},
                success:function(response){
                    if(response){
                       var output= JSON.parse(response);  
                       var name= output.name;
                       var price= output.price;
                       var desc=output.desc;
                       var cats=output.cats;
                       $('#product_name').val(name);
                       $('#product_price').val(price);
                       $('#product_descs').val(desc);
                       $('#product_cat').val(cats);                      
                    }else{
                        $('#edit_errs').html('<span class="alert alert-danger">Error!</span>');
                    }
                 }
                });
        });
    });
        function delete_item(item_id){
             
           if(confirm("Do you want to delete item?")){
                $.ajax({
                url:"process.php",
                type:"post",
                data:{item_id:item_id,delete_prod:1},
                success:function(response){
                    if(response==1){
                        refresh_product_tb();
                        swal("Done","Successfully deleted","success");
                    }else{
                        swal("Opps!","Deletion Failed","warning");
                        //refresh_product_tb();
                    }
                 }
                });
           }else{

           }
        }
        function refresh_product_tb(){
            $.ajax({
                url:"process.php",
                type:"post",
                data:{update_product_tbl:1},
                success:function(response){
                    if(response){
                        $('#product_tbl').html(response);
                    }
                 }
                });
        }
</script>