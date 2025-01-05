
<script>
    console.log("Testing basic script execution");
</script>

<div class="row">
    <div class="column-responsive">
        <div class="patients index content">
            <h3><?= __('Patient Information') ?></h3>
            <table id="patients-table" class="table table-bordered">
                <thead>
                <tr> <!-- Purple row -->  
                <th style="background-color: #fff0d4;"><?= __('Date') ?></th>
                <th style="background-color: #fff0d4;"><?= __('12/2/2024') ?></th>
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
                        <th style="background-color: #fff0d4;"><?= __('IR Lazaga') ?></th>
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

                    
        <tr class="purple-row"  data-timing-id="1"> <!-- Purple row -->
           <th onclick="sortTable(0)"><i class="fas fa-clock" style="color: #ff6771; margin-left: 5px;"></i>ScheduledTime</th>
            <th onclick="sortTable(1)"><i class="fas fa-user-nurse" style="color: #ff6771; margin-left: 5px;"></i>Nurse</th>
            <th onclick="sortTable(2)">Patient Name</th>
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

                            <td><ul>
                                    <?php foreach ($patient->exams as $exam): ?> 
                                        <li><?= h($exam->scheduled_time->start_time) ?></li>  

                                    <?php endforeach; ?>
                                </ul></td>
                            <td>
                                <ul>
                                    <?php foreach ($patient->nurses as $nurse): ?>
                                        <li><?= h($nurse->FirstName . ' ' . $nurse->LastName) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                            <td><?= h($patient->FirstName . ' ' . $patient->LastName) ?></td>

                            <td><?= h($patient->age) ?></td>
                            <td><?= h($patient->gender) ?></td>
                            <td><?= h($patient->medical_record_number) ?></td>
                            <?php //debug($patient);?>
                            <td><?= h($patient->diagnosi) ? h($patient->diagnosi->diagnosis_text) : 'N/A' ?></td>
                           
                            <td><?= isset($patient->imaging_room) ? h($patient->imaging_room->room_name) : 'N/A' ?></td>

                            <td>
                                <ul>
                                    <?php foreach ($patient->exams as $exam): ?>
                                        <li><?= h($exam->exam_type) ?></li>

                                    <?php endforeach; ?>
                                </ul>
                            </td>
                           
                            <td><?= h($patient->sedation) ? h($patient->sedation->sedation_type) : 'N/A' ?></td>


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
                            <td contentEditable="true" data-name="start_time" data-patient-id="<?= $patient->id ?>">
                            <?= h($patient->timing->start_time ?? 'N/A') ?> <!-- Fetch start_time directly -->
                            </td>
                             <td contentEditable="true" data-name="end_time" data-patient-id="<?= $patient->id ?>">
                             <?= h($patient->timing->end_time ?? 'N/A') ?> <!-- Fetch end_time directly -->


                            <td><?= h($patient->dc_time) ?></td>
                            <td><?= h($patient->dc_location) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Pagination Controls -->
        </div>
    </div>
</div>


<h3>Nurses</h3>
<ul>
    <?php foreach ($patient->nurses as $nurse): ?>
        <li><?= h($nurse->FirstName . ' ' . $nurse->LastName) ?></li>
    <?php endforeach; ?>
</ul>


<script>
var tdElements = rows[i].getElementsByTagName("TD");
if (tdElements.length > 3) { // Check if the 4th cell exists
    var ageCell = tdElements[3];
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
            if (cells.length > 3) { // Ensure there are at least 4 cells
                var ageCell = cells[3];
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

<!-- edit cell -->

<script>
document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById("patients-table");

    // Ensure the table is defined
    if (!table) {
        console.error("Table with id 'patients-table' not found.");
        return;
    }

    // Listen for the blur event on the table
    table.addEventListener('blur', function (event) {
        // Check if the target element is editable
        if (event.target.contentEditable === 'true') {
            const column = event.target.getAttribute('data-name'); // Get the column name (start_time, end_time)
            const value = event.target.textContent.trim();         // Get the updated value
            const timingId = event.target.closest('tr')?.dataset?.timingId; // Get the timing ID from the row

            // Ensure timingId and column are valid
            if (!timingId || !['start_time', 'end_time'].includes(column)) {
                console.error('Invalid column or timingId:', column, timingId);
                return;
            }

            // AJAX call to save the updated data
            fetch(`/timings/update/${timingId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': '<?= $this->request->getAttribute("csrfToken") ?>' // Include CSRF token
                },
                body: JSON.stringify({ column, value })  // Send the column and updated value
            }).then(response => response.json()) // Parse the JSON response
              .then(data => {
                  if (data.success) {
                      console.log('Update successful:', data.message);
                  } else {
                      console.error('Update failed:', data.error);
                  }
              })
              .catch(error => console.error('Error:', error));
        }
    }, true);
});

</script>










