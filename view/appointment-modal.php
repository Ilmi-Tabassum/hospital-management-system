<!-- Modal -->
<?php
include('../controller/take-appointment.php');
?>
<div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="appointmentModal">Take Appointments</h5>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Select Appointment Timings </label>
                            <select name="time" id="time">
                                <option value="12">12</option>
                                <option value="1:20">1:20</option>
                                <option value="2:30">2:20</option>
                                <option value="4:20">4:20</option>
                                <option value="5:30">5:30</option>
                            </select>
                            <br><br>
                            <div class="form-group">
                                <label>Descriptions </label>
                                <input type="text" name="description" class="form-control" placeholder="Enter Symptoms">
                            </div>
                            <input type="hidden" name="doctor_id" id="doctor_id" value=""/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" input name="submit" type="submit" value="Add">Add</button>

                        </div>

                </form>
            </div>

        </div>
    </div>
</div>
</div>