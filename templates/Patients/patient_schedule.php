
<script>
    console.log("Testing basic script execution");
</script>
<style>
    .table .thead-dark th {
    color: #fff;
    background-color: #212529;
    border-color: #32383e;
    padding:10px;
}
table td:focus-visible{
    border:none;
    outline:none;
}

ul{
    margin:0;
}
table{
    white-space:nowrap;
}
table td, table th{
    font-size:14px;
    padding:10px !important;
        border: 1px solid #efefef;
}
.content{
    border-radius:12px;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    margin-bottom:20px;
}
.content h3{
    font-size:25px;
    font-weight:600;
}
    </style>
<div class="">
    <div class="column-responsive">
        <div class="patients index content">
            <h3><?= __('Patient Information') ?></h3>
            <div class="table-responsive">
            <table id="patients-table" class="table table-bordered">
                <thead>
                <tr> <!-- Purple row -->  
                <th style="background-color: #fff0d4;"><?= __('Date') ?></th>
                <th style="background-color: #fff0d4;"><?= __('12/2/2025') ?></th>
                <th style="background-color: #fff0d4;"><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                    </tr>
                <tr> <!-- Purple row -->  
                       <th style="background-color: #fff0d4;"><?= __('Charge 1') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th style="background-color: #fff0d4;"><?= __('IR KRISTI') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th style="background-color: #fff0d4;">
                        <i class="fas fa-brain" style="color: #ff69b4; margin-left: 5px;"></i>
                        <?= __('Pedi Hussaini') ?>
                        </th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                    </tr>
                <tr> 
                     <th style="background-color: #fff0d4;"><?= __('Charge 2') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th style="background-color: #fff0d4;">
                        <i class="fas fa-heart" style="color: #ff6771; margin-left: 5px;"></i>
                        <?= __('Neuro Patel') ?> 
                    </th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                        <th><?= __('') ?></th>
                    </tr>

                    
        <tr class="thead-dark"  data-timing-id="1"> <!-- Purple row -->
           <th onclick="sortTable(0)"><i class="fas fa-clock" style="color: #ff6771; margin-left: 5px;"></i>ScheduledTime</th>
            <th onclick="sortTable(1)"><i class="fas fa-user-nurse" style="color: #ff6771; margin-left: 5px;"></i>Nurse</th>
            <th onclick="sortTable(2)">Patient LastName</th>
            <th onclick="sortTable(2)">Patient FirstName</th>
            <th onclick="sortTable(3)">Age</th>
            <th onclick="sortTable(4)">Gender</th>
            <th onclick="sortTable(5)">MRN</th>
            <th onclick="sortTable(6)">Diagnosis</th>
            <th onclick="sortTable(7)">Imaging Room</th>
            <th onclick="sortTable(8)"><i class="fas fa-x-ray" style="color: #ff6771; margin-left: 5px;"></i>Exam</th>
            <th onclick="sortTable(9)">Sedation</th>
            <th onclick="sortTable(10)">Discharge Location</th>
            <th onclick="sortTable(11)">Child Life</th>
            <th onclick="sortTable(12)">PIV</th>
            <th onclick="sortTable(13)">PICC Team</th>
            <th onclick="sortTable(14)">Port Access</th>
            <th onclick="sortTable(15)">Foley</th>
            <th onclick="sortTable(16)">Monitoring and Circulating</th>
            <th onclick="sortTable(17)">Meds</th>
            <th onclick="sortTable(18)">Medication Details</th>
            <th onclick="sortTable(19)">Comments</th>
            <th onclick="sortTable(20)">Order Reviewed By</th>
            <th onclick="sortTable(21)">Patient Called By</th>
            <th onclick="sortTable(22)">Arrival Time</th>
            <th onclick="sortTable(23)">Holding Time</th>
            <th data-timing-id onclick="sortTable(24)">Exam Start Time</th>  
            <th data-timing-id onclick="sortTable(25)">Exam End Time</th>
            <th onclick="sortTable(26)">D/C Time</th>
            <th onclick="sortTable(27)">D/C Location</th>
            </tr>

                </thead>


                <?php /* //if ($userRole === 'admin' || $userRole === 'nurse') : ?>
    <th><?= //__('Sensitive Data Column') ?></th>
<?php //endif; */?> 

                <tbody>
                <?php //debug($patient);?>
                    <?php foreach ($patients as $patient) :  ?>
                        <?php //debug($patients);?>
                        <?php //debug(/$patients->diagnosis[2]);?>
                        <tr data-timing-id="<?= $patient->timing ? $patient->timing->id : '' ?>">
                        <?php //debug($patients);?>
                            <td data-table-name="patients" data-timing-id="<?= $patient->timing ? $patient->timing->id : '' ?>">
                                    <?php foreach ($patient->exams as $exam): ?> 
                                        <span onclick="makeCellEditable(this, 'scheduled_time', 'ScheduledTime', <?= $exam->scheduled_time->id ? : 'null' ?>)">
                                        <?= h($exam->scheduled_time->ScheduledTime) ?>
                                        </span>
                                        <?php //debug($patient);?>
                                        <?php //debug($exam);?>
                                    <?php endforeach; ?>
                                </td>
                            <td >
                                
                                    <?php foreach ($patient->care_assignments as $care_assignments): ?>
                                        <span onclick="makeCellEditable(this, 'Nurses', 'FirstName', <?= $care_assignments->nurse->id ? : 'null' ?>)">
                                        <?= h($care_assignments->nurse->LastName . ' ' . $care_assignments->nurse->FirstName)  ?>
                                        </span>
                                        <?php //debug($care_assignments->nurse->LastName . ' ' . $care_assignments->nurse->FirstName); ?>

                                    <?php endforeach; ?>
                               



                                
                            <td data-table-name="patients" data-name="LastName" onclick="makeCellEditable(this, 'Patients', 'LastName', <?= $patient->id? : 'null' ?>)">
                                <?= h($patient->LastName) ?>
                            </td>
                            <td data-table-name="patients" data-name="FirstName" onclick="makeCellEditable(this, 'Patients', 'FirstName', <?= $patient->id? : 'null' ?>)"><?= h($patient->FirstName) ?></td>

                            <td onclick="makeCellEditable(this, 'Patients', 'age', <?= $patient->id? : 'null' ?>)"><?= h($patient->age) ?></td>
                            <td onclick="makeCellEditable(this, 'Patients', 'gender', <?= $patient->id? : 'null' ?>)"><?= h($patient->gender) ?></td>
                            <td><?= h($patient->medical_record_number) ?></td>
                            <?php //debug($patient);?>
                            <td onclick="makeCellEditable(this, 'Diagnosis', 'diagnosis_text', <?= $patient->medical_record_number ? : 'null' ?>)"><?= h($patient->diagnosi) ? h($patient->diagnosi->diagnosis_text) : 'N/A' ?></td>
                           
                            
                            <td onclick="makeCellEditable(this, 'imaging_room', 'room_name',<?= $patient->id? : 'null' ?>)"><?= isset($patient->imaging_room) ? h($patient->imaging_room->room_name) : 'N/A' ?><?= h($patient->imaging_room) ?></td>
                            <td>
                                
                                    <?php foreach ($patient->exams as $exam): ?>
                                        <li><?= h($exam->exam_type) ?></li>
                                        <?php //debug($exam);?>
                                    <?php endforeach; ?>
                                
                            </td>
                           
                            <td>
                              <?php if (!empty($exam->sedations)): ?>
                              
                               <?php foreach ($exam->sedations as $sedation): ?>
                            <?= h($sedation->sedation_type) ?>
                             <?php endforeach; ?>
                             
                               <?php else: ?>
                                   N/A
                                <?php endif; ?>
                            </td>
                            <?php //debug($exam->sedations);?>

                            <td><?= h($patient->discharge_location) ?></td>
                            <td><input type="checkbox" <?= $patient->child_life ? 'checked' : '' ?>></td>
                            <td><input type="checkbox" <?= $patient->piv ? 'checked' : '' ?>></td>
                            <td><input type="checkbox" <?= $patient->picc_team ? 'checked' : '' ?>></td>
                            <td><input type="checkbox" <?= $patient->port_access ? 'checked' : '' ?>></td>
                            <td><input type="checkbox" <?= $patient->foley ? 'checked' : '' ?>></td>
                            <td><input type="checkbox" <?= $patient->monitoring ? 'checked' : '' ?>></td>
                            <td><input type="checkbox" <?= $patient->meds ? 'checked' : '' ?>></td>
                            <td><?= h($patient->medication_details) ?></td>
                            <td><?= h($patient->comments) ?></td>
                            <td><?= h($patient->OrderReviewedBy) ?></td>
                            <td><?= h($patient->PatientCalledBy) ?></td>
                            <td><?= h($patient->arrival_time) ?></td>
                            <td><?= h($patient->holding_time) ?></td>
                            <td data-name="start_time" data-patient-id="<?= $patient->id ?>">
                            <ul>
                                    <?php foreach ($patient->exams as $exam): ?> 
                                        <span onclick="makeCellEditable(this, 'scheduled_time', 'start_time', <?= $exam->scheduled_time->id ? : 'null' ?>)">
                                        <?= h($exam->scheduled_time->start_time) ?>
                                    </span>
                                        <?php //debug($patients);?>
                                        <?php //debug($exam);?>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                             <td data-name="end_time" data-patient-id="<?= $patient->id ?>">
                             <ul>
                                    <?php foreach ($patient->exams as $exam): ?> 
                                        <span onclick="makeCellEditable(this, 'scheduled_time', 'end_time', <?= $exam->scheduled_time->id ? : 'null' ?>)">
                                        <?= h($exam->scheduled_time->end_time) ?>
                                    </span>
                                        <?php //debug($patients);?>
                                        <?php //debug($exam);?>
                                    <?php endforeach; ?>
                                </ul>
                            <td><?= h($patient->dc_time) ?></td>
                            <td><?= h($patient->dc_location) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
                                    </div>
            <!-- Pagination Controls -->
        </div>
    </div>
</div>


<h3>Nurses</h3>
<ul>
<?php foreach ($patient->care_assignments as $care_assignments): ?>
 <li><?= h($care_assignments->nurse->LastName . ' ' . $care_assignments->nurse->FirstName)  ?></li>
 <?php //debug($care_assignments->nurse->LastName . ' ' . $care_assignments->nurse->FirstName); ?>
 <?php endforeach; ?>
</ul>
</ul>


<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- edit cell -->
<script>
    function makeCellEditable(cell, tableName, column, timingId) {
        if (!cell || !tableName || !column || !timingId) {
            console.error("Invalid parameters provided.", { cell, tableName, column, timingId });
            return;
        }

        // Make the cell editable
        cell.contentEditable = "true";

        // Handle 'keydown' event for 'Enter' key
        cell.addEventListener('focusout', function (event) {
            const value = cell.textContent.trim(); // Updated value

            // AJAX call to update the table
            fetch(`/patients/update/${tableName}/${timingId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': '<?= $this->request->getAttribute("csrfToken") ?>' // Include CSRF token
                },
                body: JSON.stringify({ column, value }) // Send the column and updated value
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                    toastr.success(data.message || "Update successful!");
                    //console.log('Update successful:', data.message);
                      //location.reload()
                  } else {
                    toastr.error(data.error || "Update failed.");
                      console.error('Update failed:', data.error);
                  }
              })
              .catch(error => console.error('Error:', error));
        });
    }
</script>


<script>
var tdElements = rows[i].getElementsByTagName("TD");
if (tdElements.length > 4) { // Check if the 4th cell exists
    var ageCell = tdElements[4];
    console.log("Age cell found:", ageCell.innerHTML);
} else {
    console.warn("Row " + i + " does not have enough TD elements.");
}

</script>



<!-- sort by age -->

   <script>
    window.onload = function () {
        var table = document.getElementById("patients-table");
        if (!table) {
            console.error("Table with ID 'patients-table' not found!");
            return; // Stop execution if the table doesn't exist
        }

        var rows = table.rows;
        for (var i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
            var cells = rows[i].getElementsByTagName("TD");
            if (cells.length > 4) { // Ensure there are at least 4 cells
                var ageCell = cells[4];
                var age = parseInt(ageCell.innerHTML.trim(), 10); // Parse and trim the age value
                if (!isNaN(age) && age < 18) { // Check if age is valid and less than 18
                    rows[i].style.backgroundColor = "#F0E68C"; // Highlight minor patients
                }
            } else {
                console.warn("Row " + i + " does not have enough cells.");
            }
        }
    };
</script>



<!-- sort asc -->
<script>
function sortTable(n) {
    var table = document.getElementById("patients-table");
    if (!table) {
        console.error("Table not found!");
        return;
    }
    var rows = table.rows;
    var switching = true;
    var dir = "asc";
    var switchcount = 0;

    while (switching) {
        switching = false;
        for (var i = 1; i < rows.length - 1; i++) {
            var x = rows[i].getElementsByTagName("TD")[n];
            var y = rows[i + 1].getElementsByTagName("TD")[n];

            if (!x || !y) {
                console.warn(`Missing cell data at column ${n} for row ${i}`);
                continue;
            }

            if (
                (dir === "asc" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) ||
                (dir === "desc" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase())
            ) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
                break;
            }
        }

        if (switchcount === 0 && dir === "asc") {
            dir = "desc";
            switching = true;
        }
    }
}

</script>




