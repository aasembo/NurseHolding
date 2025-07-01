<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
</head>
<body>
<div class="container py-4">
    <div class="row">
        <!-- Left Sidebar Navigation Tabs -->
        <div class="col-md-2">
            <div class="nav flex-column nav-pills me-3" id="v-tabs" role="tablist" aria-orientation="vertical">
            <a href="/dashboard" class="nav-link active">Overview</a>
            <!-- <a href="/dashboard" class="nav-link" id="v-appointments-tab" data-bs-toggle="pill" data-bs-target="#v-appointments" type="button" role="tab">Appointments</a> -->
            <a href="/dashboard/patients" class="nav-link ">Patients</a>
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
                            <i class="bi bi-person-badge fs-1 text-success"></i>
                            <h4>Nurses</h4>
                            <span><?= h($totalNurses) ?></span>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card info-box">
                            <i class="bi bi-people-fill fs-1 text-warning"></i>
                            <h4>Technicians</h4>
                            <span><?= h($totalTechnicians) ?></span>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card info-box">
                            <i class="bi bi-building fs-1 text-info"></i>
                            <h4>Total Rooms</h4>
                            <span><?= h($totalRooms) ?></span>
                            </div>
                        </div>

                        <div class="col-md-3 mb-4">
                            <div class="card info-box">
                            <i class="bi bi-people-fill fs-1 text-warning"></i>
                            <h4>Specialists</h4>
                            <span><?= h($totalSpecialists) ?></span>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card info-box">
                            <i class="bi bi-building fs-1 text-info"></i>
                            <h4>Total User</h4>
                            <span><?= h($totalUser) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Appointments & Doctors -->
                <div class="col-md-4">
                    <div class="card p-3">
                        <h5>Upcoming Appointments</h5>

                        <!-- Tabs -->
                        <ul class="nav nav-tabs mb-3" id="appointmentTab" role="tablist">
                            
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="yesterday-tab" data-bs-toggle="tab" data-bs-target="#yesterday" type="button" role="tab">Yesterday</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="today-tab" data-bs-toggle="tab" data-bs-target="#today" type="button" role="tab">Today</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tomorrow-tab" data-bs-toggle="tab" data-bs-target="#tomorrow" type="button" role="tab">Tomorrow</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="appointmentTabContent">
                          <!-- Today -->
                          <div class="tab-pane fade show active" id="today" role="tabpanel">
                              <ul class="list-group">
                              <?php foreach ($groupedAppointments['today'] as $item): ?>
                                  <li class="list-group-item"><?= h($item) ?></li>
                              <?php endforeach; ?>
                              </ul>
                          </div>

                          <!-- Yesterday -->
                          <div class="tab-pane fade" id="yesterday" role="tabpanel">
                              <ul class="list-group">
                              <?php foreach ($groupedAppointments['yesterday'] as $item): ?>
                                  <li class="list-group-item"><?= h($item) ?></li>
                              <?php endforeach; ?>
                              </ul>
                          </div>

                          <!-- Tomorrow -->
                          <div class="tab-pane fade" id="tomorrow" role="tabpanel">
                              <ul class="list-group">
                              <?php foreach ($groupedAppointments['tomorrow'] as $item): ?>
                                  <li class="list-group-item"><?= h($item) ?></li>
                              <?php endforeach; ?>
                              </ul>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

            

            <!-- patients -->
            <div class="row mb-4">
                <div class="col-md-6">
                  <label for="examDaterange" class="form-label">Patients</label>
                  <input type="text" id="examDaterange" class="form-control" readonly>
                  <div class="card mt-3 p-3">
                      <h5>Patients</h5>
                      <canvas id="examChart"></canvas>
                  </div>
                </div>
                <!-- patients -->
                <div class="col-md-6">
                    <div class="card p-3">
                        <h5>Latest Patients</h5>
                        <ul class="list-group">
                        <?php foreach ($patients as $patient): ?>
                            <li class="list-group-item d-flex justify-content-between">
                            <?= h($patient->FirstName . ' ' . $patient->LastName) ?> 
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="card mt-3 p-3">
                      <h5>Nurses</h5>
                      <ul class="list-group">
                      <?php foreach ($nurses as $nurse): ?>
                          <li class="list-group-item d-flex justify-content-between">
                          <?= h($nurse->FirstName.' ' .$nurse->LastName) ?> 
                      <?php endforeach; ?>
                      </ul>
                  </div>
                </div>

                <!-- Balance -->
                <div class="col-md-6">
                  <label for="nursesDaterange" class="form-label">Nurses</label>
                  <input type="text" id="nursesDaterange" class="form-control" readonly>
                    <div class="card mt-3 p-3">
                        <h5>Nurses</h5>
                        <canvas id="nursesChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Overview -->
            <div class="row">

             

              <div class="col-md-6">
                <label for="techniciansDaterange" class="form-label">Technicians</label>
                <input type="text" id="techniciansDaterange" class="form-control" readonly>
                <div class="card mt-3 p-3">
                    <h5>Technicians</h5>
                     <!-- <canvas id="doughnutChart" width="100%" height="300"></canvas> -->
                     <canvas id="techniciansChart"></canvas>
                </div>
              </div>
              
               <div class="col-md-6">
                  <div class="card p-3">
                      <h5>Technicians</h5>
                      <ul class="list-group">
                          <?php foreach ($technicians as $technician): ?>
                              <li class="list-group-item d-flex justify-content-between">
                              <?= h($technician->name) ?> 
                          <?php endforeach; ?>
                      </ul>
                  </div>
              </div>

              <div class="col-md-6">
                <label for="specialistsDaterange" class="form-label">Specialists</label>
                <input type="text" id="specialistsDaterange" class="form-control" readonly>
                <div class="card mt-3 p-3">
                    <h5>Specialists Overview</h5>
                    <canvas id="specialistsChart"></canvas>
                </div>
              </div>
              

              <div class="col-md-6">
                  <div class="card p-3">
                      <h5>Specialists</h5>
                      <ul class="list-group">
                          <?php foreach ($specialists as $specialist): ?>
                              <li class="list-group-item d-flex justify-content-between">
                              <?= h($specialist->name) ?> 
                          <?php endforeach; ?>
                      </ul>
                  </div>
              </div>

            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
  const examChart = new Chart(document.getElementById("examChart"), {
    type: 'bar',
    data: { labels: [], datasets: [{ label: 'values', backgroundColor: '#36a2eb', data: [] }] },
    options: { responsive: true, plugins: { legend: { position: 'top' } } }
  });

  const specialistsChart = new Chart(document.getElementById("specialistsChart"), {
    type: 'bar',
    data: { labels: [], datasets: [{ label: 'values', backgroundColor: '#36a2eb', data: [] }] },
    options: { responsive: true, plugins: { legend: { position: 'top' } } }
  });

  const nursesChart = new Chart(document.getElementById("nursesChart"), {
    type: 'line',
    data: {
      labels: [],
      datasets: [
        { label: 'Exam', data: [], borderColor: '#4bc0c0', fill: false, tension: 0.4 },
      ]
    },
    options: {
      plugins: { legend: { position: 'top' } },
      responsive: true
    }
  });

  const techniciansChart = new Chart(document.getElementById("techniciansChart"), {
    type: 'line',
    data: {
      labels: [],
      datasets: [
        { label: 'Technician', data: [], borderColor: '#ff6384', fill: false, tension: 0.4 },
      ]
    },
    options: {
      plugins: { legend: { position: 'top' } },
      responsive: true
    }
  });

  

  // const overviewChart = new Chart(document.getElementById("overviewChart"), {
  //   type: 'pie',
  //   data: {
  //     labels: ['Male', 'Female', 'Child'],
  //     datasets: [{
  //       backgroundColor: ['#36a2eb', '#ff6384', '#ffce56', '#4bc0c0'],
  //       data: []
  //     }]
  //   },
  //   options: {
  //     plugins: { legend: { position: 'right' } },
  //     responsive: true
  //   }
  // });






  function loadExamChart(start, end) {
    $('#examDaterange').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    fetch(`/dashboard/chart-data?model=Exams&start=${start.format('YYYY-MM-DD')}&end=${end.format('YYYY-MM-DD')}`)
      .then(res => res.json())
      .then(data => {
        examChart.data.labels = data.labels;
        examChart.data.datasets[0].data = data.values;
        examChart.update();
      });
  }

  function loadnursesChart(start, end) {
    $('#nursesDaterange').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    fetch(`/dashboard/chart-data?model=Nurses&start=${start.format('YYYY-MM-DD')}&end=${end.format('YYYY-MM-DD')}`)
      .then(res => res.json())
      .then(data => {
        nursesChart.data.labels = data.labels;
        nursesChart.data.datasets[0].data = data.values;
        nursesChart.update();
      });
  }

  function loadTechnicianChart(start, end) {
    $('#techniciansDaterange').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    fetch(`/dashboard/chart-data?model=Technicians&start=${start.format('YYYY-MM-DD')}&end=${end.format('YYYY-MM-DD')}`)
      .then(res => res.json())
      .then(data => {
        techniciansChart.data.labels = data.labels;
        techniciansChart.data.datasets[0].data = data.values;
        techniciansChart.update();
      });
  }

  

  function loadSpecialistsChart(start, end) {
    $('#specialistsDaterange').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    fetch(`/dashboard/chart-data?model=Specialists&start=${start.format('YYYY-MM-DD')}&end=${end.format('YYYY-MM-DD')}`)
      .then(res => res.json())
      .then(data => {
        specialistsChart.data.labels = data.labels;
        specialistsChart.data.datasets[0].data = data.values;
        specialistsChart.update();
      });
  }
  
  

  // function loadOverviewChart(start, end) {
  //   $('#overviewDaterange').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  //   fetch(`/dashboard/overview-data?start=${start.format('YYYY-MM-DD')}&end=${end.format('YYYY-MM-DD')}`)
  //     .then(res => res.json())
  //     .then(data => {
  //       overviewChart.data.datasets[0].data = data.values;
  //       overviewChart.update();
  //     });
  // }

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

    $('#examDaterange').daterangepicker({ startDate: defaultStart, endDate: defaultEnd, ranges }, loadExamChart);
    $('#nursesDaterange').daterangepicker({ startDate: defaultStart, endDate: defaultEnd, ranges }, loadnursesChart);
    $('#techniciansDaterange').daterangepicker({ startDate: defaultStart, endDate: defaultEnd, ranges }, loadTechnicianChart);
    // $('#overviewDaterange').daterangepicker({ startDate: defaultStart, endDate: defaultEnd, ranges }, loadOverviewChart);
    $('#specialistsDaterange').daterangepicker({ startDate: defaultStart, endDate: defaultEnd, ranges }, loadSpecialistsChart);

    // Initial Load
    loadExamChart(defaultStart, defaultEnd);
    loadnursesChart(defaultStart, defaultEnd);
    // loadOverviewChart(defaultStart, defaultEnd);
    loadTechnicianChart(defaultStart, defaultEnd);
    loadSpecialistsChart(defaultStart, defaultEnd);
  });
</script>
</body>
</html>
