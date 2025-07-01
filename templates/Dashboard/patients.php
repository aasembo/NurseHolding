

  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet"/>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    body {
      background-color: #f6f9fc;
      font-family: 'Segoe UI', sans-serif;
    }
    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    .info-box {
      text-align: center;
      padding: 20px;
    }
    .info-box h4 {
      margin-top: 10px;
      font-weight: 500;
    }
    .info-box span {
      font-size: 1.8rem;
      font-weight: bold;
    }
  </style>

<div class="container py-4">
    <div class="row">
        <!-- Left Sidebar Navigation Tabs -->
        <div class="col-md-2">
            <div class="nav flex-column nav-pills me-3" id="v-tabs" role="tablist" aria-orientation="vertical">
            <a href="/dashboard" class="nav-link">Overview</a>
            <!-- <a href="/dashboard" class="nav-link" id="v-appointments-tab" data-bs-toggle="pill" data-bs-target="#v-appointments" type="button" role="tab">Appointments</a> -->
            <a href="/dashboard/patients" class="nav-link active">Patients</a>
            <a href="/dashboard/technicians" class="nav-link " >Technicians</a>
            <a href="/dashboard/specialists" class="nav-link" >Specialist</a>
            <!-- <a href="/dashboard" class="nav-link" >Imaging Rooms</a> -->
            </div>
        </div>


         <!-- Tab Content Area -->
    <div class="col-md-10">
        <div class="tab-content" id="v-tabs-content">

            <!-- Info Boxes -->
            <div class="row g-4 mb-4">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <div class="card info-box">
                            <i class="bi bi-hospital fs-1 text-primary"></i>
                            <h4>Total Patients</h4>
                            <span><?= h($totalPatients) ?></span>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card info-box">
                            <i class="bi bi-clipboard-check fs-1 text-success"></i>
                            <h4>Pending Exam</h4>
                            <span><?= h($pendingexamCounts) ?></span>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card info-box">
                            <i class="bi bi-people-fill fs-1 text-warning"></i>
                            <h4> Ongoing Schedule</h4>
                            <span><?= h($activeExamPatientsCount) ?></span>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card info-box">
                            <i class="bi bi-building fs-1 text-info"></i>
                            <h4>Active Specialist</h4>
                            <span><?= h($activeExamSpecialistCount) ?></span>
                            </div>
                        </div>

                        <!-- Payments -->
                    <div class="col-md-12">
                        <div class="card p-3">
                            <h5>Ongoing Patient Exams</h5>
                            <ul class="list-group">
                            <?php foreach ($patientHistory as $patient): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                <?= h($patient->FirstName . ' ' . $patient->LastName) ?> 
                            <?php endforeach; ?>
                            </ul>
                        </div>
                        </div>


                        
                    </div>
                </div>
                <!-- Appointments & Doctors -->
                <div class="col-md-4">
                    <div class="card p-3">
                        <h5>Today Exams</h5>

                        <!-- Tabs -->
                        <ul class="nav nav-tabs mb-3" id="appointmentTab" role="tablist">
                            
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">Pending</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="ongoing-tab" data-bs-toggle="tab" data-bs-target="#ongoing" type="button" role="tab">Ongoing</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab">Completed</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="appointmentTabContent">
                        <!-- ongoing -->
                        <div class="tab-pane fade show active" id="ongoing" role="tabpanel">
                            <ul class="list-group">
                                <?php foreach ($examLists['ongoing'] as $item): ?>
                                    <li class="list-group-item"><?= h($item['time']) ?> - <?= h($item['patient']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!-- pending -->
                        <div class="tab-pane fade" id="pending" role="tabpanel">
                            <ul class="list-group">
                                <?php foreach ($examLists['pending'] as $item): ?>
                                    <li class="list-group-item"><?= h($item['time']) ?> - <?= h($item['patient']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!-- completed -->
                        <div class="tab-pane fade" id="completed" role="tabpanel">
                            <ul class="list-group">
                                <?php foreach ($examLists['completed'] as $item): ?>
                                    <li class="list-group-item"><?= h($item['time']) ?> - <?= h($item['patient']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        </div>

                    </div>

                </div>

                

            </div>

            

            <!-- Revenue -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="row">
                        <form id="filterForm"  method="post" class=" g-2">
                            <!-- Date Range Picker -->
                            <div class="col-md-2">
                                <label for="patientsexamDaterange" class="form-label">Date Range</label>
                                <input type="text" name="daterange"  id="patientsexamDaterange" class="form-control" readonly>
                            </div>

                            <!-- Imaging Room -->
                            <div class="col-md-2">
                                <label for="imagingRoom" class="form-label">Imaging Room</label>
                                <select id="imagingRoom" name="rooms"  class="form-control">
                                    <option value="">All</option>
                                    <?php foreach ($rooms as $item): ?>
                                    <option value="<?= $item->id ?>"><?= h($item->room_name) ?></option>
                                    <?php endforeach; ?>
                                    <!-- You can dynamically populate this -->
                                </select>
                            </div>

                            <!-- Age -->
                            <div class="col-md-2">
                                <label for="age" class="form-label">Age Range</label>
                                <select id="age" name="age"  class="form-control">
                                    <option value="">All</option>
                                    <option value="0-10">0 - 10</option>
                                    <option value="11-20">11 - 20</option>
                                    <option value="21-30">21 - 30</option>
                                    <option value="31-40">31 - 40</option>
                                    <option value="41-50">41 - 50</option>
                                    <option value="51-60">51 - 60</option>
                                    <option value="61-70">61 - 70</option>
                                    <option value="71-80">71 - 80</option>
                                    <option value="81+">81+</option>
                                </select>
                            </div>

                            <!-- Gender -->
                            <div class="col-md-2">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" name="gender"  class="form-control">
                                    <option value="">All</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <!-- Gender -->
                            <div class="col-md-2">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" name="status"  class="form-control">
                                    <option value="">All</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>

                            <!-- Nurse -->
                            <div class="col-md-2">
                                <label for="nurse" class="form-label">Nurse</label>
                                <select id="nurse" name="nurse" class="form-control">
                                    <option value="">All</option>
                                    <?php foreach ($nurses as $item): ?>
                                    <option value="<?= $item->id ?>"><?= h($item->FirstName .' '.$item->LastName ) ?></option>
                                    <?php endforeach; ?>
                                    <!-- Populate dynamically if needed -->
                                </select>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">Apply Filter</button>
                            </div>
                        </form>
                    </div>

                    <div class="card mt-3 p-3">
                        <h5>Patients Exam</h5>
                        <canvas id="patientsexamChart"></canvas>
                    </div>
                </div>

                <!-- Balance -->
                <!-- <div class="col-md-6">
                    <label for="balanceDaterange" class="form-label">Balance Date Range</label>
                    <input type="text" id="balanceDaterange" class="form-control" readonly>
                    <div class="card mt-3 p-3">
                        <h5>Balance</h5>
                        <canvas id="balanceChart"></canvas>
                    </div>
                </div> -->
            </div>

            <!-- Overview -->
            <div class="row">
                <div class="col-md-6">
                    <label for="overviewDaterange" class="form-label">Patients gender</label>
                    <input type="text" id="overviewDaterange" class="form-control" readonly>
                    <div class="card mt-3 p-3">
                        <h5>Patients gender</h5>
                        <canvas id="overviewChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ✅ jQuery (must be loaded first) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- ✅ Moment.js (for DateRangePicker) -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>

<!-- ✅ DateRangePicker -->
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- ✅ Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script>
    $(function () {
        $('#age').select2({ placeholder: 'Select Age', allowClear: true, width: '100%' });
    });

    $(function () {
        $('#imagingRoom, #gender, #nurse').select2({ width: '100%' });
    });
  const patientsexamChart = new Chart(document.getElementById("patientsexamChart"), {
    type: 'bar',
    data: { labels: [], datasets: [{ label: 'values', backgroundColor: '#36a2eb', data: [] }] },
    options: { responsive: true, plugins: { legend: { position: 'top' } } }
  });

//   const balanceChart = new Chart(document.getElementById("balanceChart"), {
//     type: 'line',
//     data: {
//       labels: [],
//       datasets: [
//         { label: 'Income', data: [], borderColor: '#4bc0c0', fill: false, tension: 0.4 },
//         { label: 'Outcome', data: [], borderColor: '#ff6384', fill: false, tension: 0.4 }
//       ]
//     },
//     options: {
//       plugins: { legend: { position: 'top' } },
//       responsive: true
//     }
//   });

  const overviewChart = new Chart(document.getElementById("overviewChart"), {
    type: 'pie',
    data: {
      labels: ['Male', 'Female', 'Child'],
      datasets: [{
        backgroundColor: ['#36a2eb', '#ff6384', '#ffce56', '#4bc0c0'],
        data: []
      }]
    },
    options: {
      plugins: { legend: { position: 'right' } },
      responsive: true
    }
  });

  function loadpatientsexamChart(start, end) {
    $('#patientsexamDaterange').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    fetch(`/dashboard/chart-data?model=Patients&start=${start.format('YYYY-MM-DD')}&end=${end.format('YYYY-MM-DD')}`)
      .then(res => res.json())
      .then(data => {
        patientsexamChart.data.labels = data.labels;
        patientsexamChart.data.datasets[0].data = data.values;
        patientsexamChart.update();
      });
  }

//   function loadBalanceChart(start, end) {
//     $('#balanceDaterange').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
//     fetch(`/dashboard/balance-data?start=${start.format('YYYY-MM-DD')}&end=${end.format('YYYY-MM-DD')}`)
//       .then(res => res.json())
//       .then(data => {
//         balanceChart.data.labels = data.labels;
//         balanceChart.data.datasets[0].data = data.income;
//         balanceChart.data.datasets[1].data = data.outcome;
//         balanceChart.update();
//       });
//   }

    // Handle AJAX filter submit
    $('#filterForm').on('submit', function (e) {
      e.preventDefault();

      const formData = $(this).serialize();

      $.ajax({
        url: '/dashboard/filter-graph-data', // Your CakePHP controller endpoint
        method: 'GET',
        data: formData,
        success: function (res) {
          updateChart(res.labels, res.values); // assuming this function updates the chart
        },
        error: function () {
          alert('Something went wrong fetching chart data');
        }
      });
    });

    // Chart update logic
    function updateChart(labels, values) {
      patientsexamChart.data.labels = labels;
      patientsexamChart.data.datasets[0].data = values;
      patientsexamChart.update();
    }


  function loadOverviewChart(start, end) {
    $('#overviewDaterange').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    fetch(`/dashboard/overview-data?start=${start.format('YYYY-MM-DD')}&end=${end.format('YYYY-MM-DD')}`)
      .then(res => res.json())
      .then(data => {
        overviewChart.data.datasets[0].data = data.values;
        overviewChart.update();
      });
  }

  $(function () {
    const defaultStart = moment().subtract(6, 'days');
    const defaultEnd = moment();

    const ranges = {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    };

    $('#patientsexamDaterange').daterangepicker({ startDate: defaultStart, endDate: defaultEnd, ranges });
    // $('#balanceDaterange').daterangepicker({ startDate: defaultStart, endDate: defaultEnd, ranges }, loadBalanceChart);
    $('#overviewDaterange').daterangepicker({ startDate: defaultStart, endDate: defaultEnd, ranges }, loadOverviewChart);

    // Initial Load
    loadpatientsexamChart(defaultStart, defaultEnd);
    // loadBalanceChart(defaultStart, defaultEnd);
    loadOverviewChart(defaultStart, defaultEnd);
  });
</script>

