

<?php
$connect = mysqli_connect("localhost", "root", "", "hospitalmanagementsystem");
$query = "SELECT * FROM patientdata ORDER BY patient_id DESC";
$result = mysqli_query($connect, $query);
include('../model/db.php');
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../css/style.css">
</head>

<html>
<head>
    <title>Patient Records</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<br /><br />
<div class="container" style="width:700px;">
    <h3 align="center">Patient Records</h3>
    <br />
    <div class="table-responsive">
        <div align="right">
            <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
        </div>
        <br />
        <div id="employee_table">
            <table class="table table-bordered">
                <tr>
                    <th width="70%">Patient Name</th>
                    <th width="70%">Phone Number</th>
                    <th width="15%">Delete</th>
                    <th width="15%">View</th>
                </tr>
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    ?>
                    <tr>
                        <td><?php echo $row["pname"]; ?></td>
                        <td><?php echo $row["phoneno"]; ?></td>

                    <form method="post" action="../controller/admin-controller.php">
                        <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id = $row["patient_id"]; ?>"/>
                        <td><button type="submit" name="submit"> Delete</button>  </td>
                    </form>

                        <td> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['patient_id'] ?>">View</button>  </td>
                    </tr>



                    <div id="myModal<?php echo $row['patient_id'] ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">

                                <div class="modal-header">
                                    <button>Patient Details  <type="button" class="close" data-dismiss="modal">&times; </button>

                                </div>
                                <div class="modal-body">
                                    <h4>Name : <?php echo $row['pname']; ?></h4>
                                    <h4>Mobile Number : <?php echo $row['phoneno']; ?></h4>
                                    <h4>Email : <?php echo $row['email']; ?></h4>
                                    <h4>Address : <?php echo $row['address']; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Employee Details</h4>
            </div>
            <div class="modal-body" id="employee_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Patient records</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <label>Enter Patient Name</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <br />
                    <label>Enter Patient Address</label>
                    <textarea name="address" id="address" class="form-control"></textarea>
                    <br />
                    <label>Select Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <br />
                    <label>Enter Problems</label>
                    <input type="text" name="designation" id="designation" class="form-control" />
                    <br />
                    <label>Enter Age</label>
                    <input type="text" name="age" id="age" class="form-control" />
                    <br />
                    <input type="hidden" name="employee_id" id="employee_id" />
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#add').click(function(){
                $('#insert').val("Insert");
                $('#insert_form')[0].reset();
            });
            $(document).on('click', '.edit_data', function(){
                var employee_id = $(this).attr("id");
                $.ajax({
                    url:"fetch.php",
                    method:"POST",
                    data:{employee_id:employee_id},
                    dataType:"json",
                    success:function(data){
                        $('#name').val(data.name);
                        $('#address').val(data.address);
                        $('#gender').val(data.gender);
                        $('#designation').val(data.designation);
                        $('#age').val(data.age);
                        $('#employee_id').val(data.id);
                        $('#insert').val("Update");
                        $('#add_data_Modal').modal('show');
                    }
                });
            });
            $('#insert_form').on("submit", function(event){
                event.preventDefault();
                if($('#name').val() == "")
                {
                    alert("Name is required");
                }
                else if($('#address').val() == '')
                {
                    alert("Address is required");
                }
                else if($('#designation').val() == '')
                {
                    alert("Designation is required");
                }
                else if($('#age').val() == '')
                {
                    alert("Age is required");
                }
                else
                {
                    $.ajax({
                        url:"insert.php",
                        method:"POST",
                        data:$('#insert_form').serialize(),
                        beforeSend:function(){
                            $('#insert').val("Inserting");
                        },
                        success:function(data){
                            $('#insert_form')[0].reset();
                            $('#add_data_Modal').modal('hide');
                            $('#employee_table').html(data);
                        }
                    });
                }
            });
            $(document).on('click', '.view_data', function(){
                var employee_id = $(this).attr("id");
                if(employee_id != '')
                {
                    $.ajax({
                        url:"select.php",
                        method:"POST",
                        data:{employee_id:employee_id},
                        success:function(data){
                            $('#employee_detail').html(data);
                            $('#dataModal').modal('show');
                        }
                    });
                }
            });
        });
    </script>

</div>
<a href="../controller/logout.php" class="button">Log Out</a>

</body>
</html>
