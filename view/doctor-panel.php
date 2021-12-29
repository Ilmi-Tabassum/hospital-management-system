<?php
include('../model/db.php');
$connection = new db();
session_start();
$temp = $connection->getIdandName("doctordata", "doctor_id", "dname");//$temp is an array,
$doctor_id = $temp[0];
$dname = $temp[1];
echo "" . "Welcome," . $dname . "<br>";
$conobj=$connection->OpenCon();
$appointments = $connection->showAppointments($conobj,$doctor_id);
$i = 1;
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <table class="table table-hover">

                <thead>
                <tr>
                    <td>Serial Number</td>
                    <td>Time</td>
                    <td>Description<td
                    <td>View</td>
                </tr>
                <?php
                while($row = $appointments->fetch_assoc())
                {
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row["time"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>
                        <?php $patient_id = $row["patient_id"]; ?>

                        <td> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['patient_id'] ?>">View</button>  </td>
                    </tr>

                    <!--MODAL-->
                    <div id="myModal<?php echo $row['patient_id'] ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <h4 class="modal-title">Details</h4>
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">

                                    <?php
                                    $patient_details = $connection->showPatientDataModal($conobj,$patient_id,$doctor_id);
                                    while($row = $patient_details->fetch_assoc())
                                    {
                                        ?>
                                        <h4>Name : <?php echo $row['pname']; ?></h4>
                                        <h4>Mobile Number : <?php echo $row['phoneno']; ?></h4>
                                        <h4>Email : <?php echo $row['email']; ?></h4>
                                        <h4>Address : <?php echo $row['address']; ?></h4>

                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                 Modal end   -->

                    <?php

                }
                ?>
                </tbody>
            </table>


            </tbody>
            </table>

        </div>
    </div>
</div>
</tr>


</thead>

</table>
</div>
</div>

<a href="../controller/logout.php" class="button">Log Out</a>


</div>
</body>
</html>