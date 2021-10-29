<?php include 'header.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Contact</h1>
                    </div>
                     <div class="row">
                         <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Contact Info</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table">
                                        <?php 
                                            $get_contact_info=$db->query("SELECT * FROM contacts LIMIT 1");
                                            $contacts=$get_contact_info->fetch_assoc();
                                            $address=$contacts['address'];
                                        ?>
                                        <tr>
                                            <td>Address</td>
                                            <td colspan="2"><input type="text" class="form-control" id="address" name="" value="<?=$contacts['address'];?>"></td>
                                        </tr>
                                        <tr>
                                           <td>Mobile No 1</td> 
                                           <td  colspan="2"><input type="text" class="form-control" id="phone1" name="" value="<?=$contacts['phone1'];?>"></td>
                                        </tr>
                                        <tr>
                                           <td>Mobile No 2</td> 
                                           <td  colspan="2"><input type="text" class="form-control" id="phone2" name="" value="<?=$contacts['phone2'];?>"></td>
                                        </tr>
                                        <tr>
                                           <td>Email</td> 
                                           <td  colspan="2"><input type="text" class="form-control" id="email" name="" value="<?=$contacts['email'];?>"></td>
                                        </tr>
                                        <tr>
                                            <td></td><td colspan="2"><center><button id="update_contact" class="btn btn-primary form-control">Update Contact</button></center></td>
                                        </tr>
                                    </table>
                                </div>
                                </div>
                            </div>
                         </div>
                     </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

<?php include "footer.php" ?>
<script type="text/javascript">
    $('#update_contact').click(function(){
            var address= $('#address').val();
            var mobile= $('#phone1').val();
            var mobile2= $('#phone2').val();
            var email= $('#email').val();
            $.ajax({
                url:'process.php',
                method: 'post',
                data:{address:address,mobile:mobile,mobile2:mobile2,email:email,update_contact:1},
                success:function(response){
                    if(response==1){
                        swal("Good","Contact was updated successully","success");
                    }else{
                        swal("Opps!","Unable to Submit", "error");
                    }
                }
            });
    });
</script>