<?php include 'header.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                    </div>
                     <div class="row">
                         <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Admin Profile</h6>
                                </div>
                                <div class="card-body">
                                    <button type="button" id="addManager" class="btn btn-primary mb-4 float-right"> <i class="fa fa-plus"></i> Add New Manager</button>
                                    <button class="btn btn-warning float-right" style="display: none;" id="close">Close &times;</button>
                                    <p></p>
                                    <div id="managerForm" style="display: none;">
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="text" name="" id="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" name="" id="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_pass">Confirm Password:</label>
                                            <input type="password" name="" id="confirm_pass" class="form-control" placeholder="Retype Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="priv_level">Level of Privilege:</label>
                                           <select class="form-control" id="priv_level">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                        <button id="UpdateManager" class="btn btn-primary float-right">Add New Manager</button>
                                        <p class="red_color">
                                            *Note:<br>Level 1 has all priviledges while level 2 access level is restricted (Can not add, suspend or drop  any manager account).
                                        </p>

                                    </div>
                                    <form>
                                        <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Email: </th>
                                                <td><?=$_SESSION['email']?></td>
                                                <input type="text" name="" style="display: none;" id="newemail" value="<?=$_SESSION['email']?>" >
                                            </tr>
                                            <tr>
                                                <th>Password: </th>
                                                <td><input type="password" class="form-control col-6" name="" value="XXXXXXXXXX" id="newpass"><button type="button" id="changePassword" class="btn btn-primary col-6">Change Password</button></td>
                                            </tr>
                                        </table>
                                       </div>
                                    </form>
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
    $('#addManager').click(function(){
        $('#managerForm').show();
        $('#addManager').hide();
        $('#close').show();

    });
    $('#close').click(function(){
        $('#managerForm').hide();
        $('#addManager').show();
        $('#close').hide();
    });
    $('#changePassword').click(function(){
        var email= $('#newemail').val();
        var password= $('#newpass').val();
        if(password!="XXXXXXXXXX"){
           if(confirm("Are you sure you want to change Password?")){
            $.ajax({
                url:'process.php',
                method:'post',
                data:{email:email,password:password,changePassword:1},
                success:function(response){
                    if(response==1){
                        swal("Success","Password successfully changed","success");
                    }else{
                        swal("Opps","Unable to make changes","error");
                    }
                }
            });
          }
        }else{
            swal("Opps","No changes in password field was observed","error")
        }
    });
    $('#UpdateManager').click(function(){
            swal("Opps","Service currently unvailable","error");
    });
</script>