

  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet"/>

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
            <a href="/dashboard/patients" class="nav-link">Patients</a>
            <a href="/dashboard/technicians" class="nav-link active" >Technicians</a>
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
                            <h4>Total Technician</h4>
                            <span><?= h($totalTechnicians) ?></span>
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
                            <h4>Active Technician</h4>
                            <span><?= h($activeExamTechnicianCount) ?></span>
                            </div>
                        </div>

                        <!-- Payments -->
                    <div class="col-md-12">
                        <div class="card p-3">
                            <h5>Technician</h5>
                            <ul class="list-group">
                            <?php foreach ($technicians as $technician): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                <?= h($technician->name) ?> 
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
                                    <li class="list-group-item"><?= h($item['time']) ?> - <?= h($item['technician']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!-- pending -->
                        <div class="tab-pane fade" id="pending" role="tabpanel">
                            <ul class="list-group">
                                <?php foreach ($examLists['pending'] as $item): ?>
                                    <li class="list-group-item"><?= h($item['time']) ?> - <?= h($item['technician']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!-- completed -->
                        <div class="tab-pane fade" id="completed" role="tabpanel">
                            <ul class="list-group">
                                <?php foreach ($examLists['completed'] as $item): ?>
                                    <li class="list-group-item"><?= h($item['time']) ?> - <?= h($item['technician']) ?></li>
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
                    <label for="techniciansDaterange" class="form-label">Technicians</label>
                    <input type="text" id="techniciansDaterange" class="form-control" readonly>
                    <div class="card mt-3 p-3">
                        <h5>Technicians</h5>
                        <canvas id="techniciansChart"></canvas>
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
            <!-- <div class="row">
                <div class="col-md-6">
                    <label for="overviewDaterange" class="form-label">Overview Date Range</label>
                    <input type="text" id="overviewDaterange" class="form-control" readonly>
                    <div class="card mt-3 p-3">
                        <h5>Appointments Overview</h5>
                        <canvas id="overviewChart"></canvas>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
  const techniciansChart = new Chart(document.getElementById("techniciansChart"), {
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

//   const overviewChart = new Chart(document.getElementById("overviewChart"), {
//     type: 'pie',
//     data: {
//       labels: ['Male', 'Female', 'Child', 'Other'],
//       datasets: [{
//         backgroundColor: ['#36a2eb', '#ff6384', '#ffce56', '#4bc0c0'],
//         data: []
//       }]
//     },
//     options: {
//       plugins: { legend: { position: 'right' } },
//       responsive: true
//     }
//   });

  function loadtechniciansChart(start, end) {
    $('#techniciansDaterange').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    fetch(`/dashboard/chart-data?model=Technicians&start=${start.format('YYYY-MM-DD')}&end=${end.format('YYYY-MM-DD')}`)
      .then(res => res.json())
      .then(data => {
        techniciansChart.data.labels = data.labels;
        techniciansChart.data.datasets[0].data = data.values;
        techniciansChart.update();
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

//   function loadOverviewChart(start, end) {
//     $('#overviewDaterange').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
//     fetch(`/dashboard/overview-data?start=${start.format('YYYY-MM-DD')}&end=${end.format('YYYY-MM-DD')}`)
//       .then(res => res.json())
//       .then(data => {
//         overviewChart.data.datasets[0].data = data.values;
//         overviewChart.update();
//       });
//   }

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

    $('#techniciansDaterange').daterangepicker({ startDate: defaultStart, endDate: defaultEnd, ranges }, loadtechniciansChart);
    // $('#balanceDaterange').daterangepicker({ startDate: defaultStart, endDate: defaultEnd, ranges }, loadBalanceChart);
    // $('#overviewDaterange').daterangepicker({ startDate: defaultStart, endDate: defaultEnd, ranges }, loadOverviewChart);

    // Initial Load
    loadtechniciansChart(defaultStart, defaultEnd);
    // loadBalanceChart(defaultStart, defaultEnd);
    // loadOverviewChart(defaultStart, defaultEnd);
  });
</script>

