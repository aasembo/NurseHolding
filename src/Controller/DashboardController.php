<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;
use Cake\I18n\FrozenDate;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Cake\I18n\FrozenTime;
use Cake\Datasource\ConnectionManager;

class DashboardController extends AppController
    {

        public function initialize(): void
        {
            parent::initialize();
            $this->loadComponent('Authentication.Authentication');
            $this->Nurses = TableRegistry::getTableLocator()->get('Nurses');
            $this->Technicians = TableRegistry::getTableLocator()->get('Technicians');
            $this->ImagingRooms = TableRegistry::getTableLocator()->get('ImagingRooms');
            $this->Exams = TableRegistry::getTableLocator()->get('Exams');
            $this->Specialists = TableRegistry::getTableLocator()->get('specialists');
            // Load the Patients table
            $this->Patients = TableRegistry::getTableLocator()->get('Patients');
            $this->Users = TableRegistry::getTableLocator()->get('Users');
        }

        public function beforeFilter(\Cake\Event\EventInterface $event)
        {
            parent::beforeFilter($event);

            // Require user to be authenticated
            $result = $this->Authentication->getResult();
            if (!$result->isValid()) {
                return $this->redirect('/admins/login');
            }

            // Require admin role
            $user = $this->request->getAttribute('identity')->getOriginalData();
            if ($user->role !== 'manager') {
                $this->Flash->error('You are not authorized to access this page.');
                return $this->redirect('/admins/login');
            }
        }

        


        public function index()
        {
            $today = FrozenTime::today();
            $yesterday = FrozenTime::yesterday();
            $tomorrow = FrozenTime::tomorrow();

            // Get total counts
            $totalPatients = $this->Patients->find()->count();
            $totalNurses = $this->Nurses->find()->count();
            $totalSpecialists = $this->Specialists->find()->count();
            $totalTechnicians = $this->Technicians->find()->count();
            $totalRooms = $this->ImagingRooms->find()->count();
            $totalUser = $this->Users->find()->count();
            $patients = $this->Patients->find()
                            ->order(['created_at' => 'DESC'])
                            ->limit(5)
                            ->all();
            $technicians = $this->Technicians->find()
            ->order(['created_at' => 'DESC'])
                            ->limit(5)
                            ->all();
            $specialists = $this->Specialists->find()
                    ->order(['created_at' => 'DESC'])
                            ->limit(5)
                            ->all();
            // debug($specialists);
            $nurses = $this->Nurses->find()
            ->order(['created_at' => 'DESC'])
                            ->limit(5)
                            ->all();
            // Appointments for yesterday, today, tomorrow
            $appointments = $this->Patients->find()
                ->contain([
                    'Exams.ScheduledTimes'
                ])
                ->matching('Exams.ScheduledTimes', function ($q) use ($yesterday, $tomorrow) {
                    return $q->where([
                        'ScheduledTimes.ScheduledTime >=' => $yesterday,
                        'ScheduledTimes.ScheduledTime <' => $tomorrow->modify('+1 day')
                    ]);
                })
                ->toArray();

            // Grouped by date
            $groupedAppointments = [
                'yesterday' => [],
                'today' => [],
                'tomorrow' => [],
            ];

            foreach ($appointments as $patient) {
                foreach ($patient->exams as $exam) {
                    $timeEntity = $exam->scheduled_time ?? null;

                    if ($timeEntity && isset($timeEntity->ScheduledTime)) {
                        $scheduledDateTime = $timeEntity->ScheduledTime;

                        if ($scheduledDateTime instanceof \Cake\I18n\FrozenTime) {
                            $display = $scheduledDateTime->format('H:i') . ' - ' . $patient->FirstName . ' ' . $patient->LastName;

                            if ($scheduledDateTime->isSameDay($yesterday)) {
                                $groupedAppointments['yesterday'][] = $display;
                            } elseif ($scheduledDateTime->isSameDay($today)) {
                                $groupedAppointments['today'][] = $display;
                            } elseif ($scheduledDateTime->isSameDay($tomorrow)) {
                                $groupedAppointments['tomorrow'][] = $display;
                            }
                        }
                    }
                }
            }


           
            // debug($roomsExamCounter);
            $this->set(compact(
                'groupedAppointments',
                'totalUser',
                'patients',
                'totalPatients',
                'totalNurses',
                'totalTechnicians',
                'totalRooms',
                'technicians',
                'specialists',
                'totalSpecialists',
                'nurses'
            ));
        }


        public function graphData()
        {
            $this->request->allowMethod('get');
            $start = $this->request->getQuery('start');
            $end = $this->request->getQuery('end');

            if (!$start || !$end) {
                throw new BadRequestException("Missing date parameters.");
            }

            // Example static/dummy data - replace with database queries
            $data = [
                'revenue' => [
                    'labels' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    'income' => [65, 59, 80, 81, 56, 55, 40],
                    'expense' => [28, 48, 40, 19, 86, 27, 30]
                ],
                'overview' => [
                    'labels' => ['Male', 'Female', 'Child', 'Germany'],
                    'data' => [300, 50, 100, 40]
                ],
                'balance' => [
                    'labels' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    'income' => [20, 45, 30, 60, 75, 70, 90],
                    'outcome' => [10, 20, 15, 30, 35, 25, 40]
                ],
                'payments' => [
                    ['name' => 'Dr. John Doe - Kidney Test', 'amount' => 25.15],
                    ['name' => 'Dr. Michael Doe - Emergency', 'amount' => 99.15],
                    ['name' => 'Dr. Bertie Maxwell - Comp. Test', 'amount' => 40.45],
                ],
                'appointments' => [
                    '10:00 - Shawn Hampton',
                    '10:30 - Polly Paul',
                    '11:00 - John Doe',
                    '11:30 - Harmani Doe',
                ]
            ];

  
             $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'data' => $data,
                    '_serialize' => 'data'
                ]));
            return $this->response;
        }

        public function scheduledChartData()
            {
                $this->request->allowMethod(['get', 'ajax']);

                $start = $this->request->getQuery('start');
                $end = $this->request->getQuery('end');

                $startDate = $start ? FrozenTime::parse($start) : FrozenTime::now()->subDays(6)->startOfDay();
                $endDate = $end ? FrozenTime::parse($end) : FrozenTime::now()->endOfDay();

                $connection = ConnectionManager::get('default');

                $results = $connection->execute("
                    SELECT DATE(st.ScheduledTime) as scheduled_date, COUNT(e.id) as total
                    FROM exams e
                    INNER JOIN scheduled_time st ON st.id = e.scheduled_time_id
                    WHERE st.ScheduledTime BETWEEN :start AND :end
                    GROUP BY DATE(st.ScheduledTime)
                ", [
                    'start' => $startDate->startOfDay()->format('Y-m-d H:i:s'),
                    'end' => $endDate->endOfDay()->format('Y-m-d H:i:s')
                ])->fetchAll('assoc');

                // Build map
                $dateMap = [];
                foreach ($results as $row) {
                    $label = (new FrozenDate($row['scheduled_date']))->format('M d');
                    $dateMap[$label] = (int)$row['total'];
                }

                // Generate full date range
                $labels = [];
                $value = [];

                $current = clone $startDate;
                while ($current <= $endDate) {
                    $label = $current->format('M d');
                    $labels[] = $label;
                    $value[] = $dateMap[$label] ?? 0;
                    $current = $current->modify('+1 day');
                }

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode(compact('labels', 'value')));
        }

        public function overviewData(): Response
        {
            $maleCount = $this->Patients->find()->where(['gender' => 'Male' , 'age >' => 14])->count();
            $femaleCount = $this->Patients->find()->where(['gender' => 'Female', 'age >' => 14])->count();
            $childCount = $this->Patients->find()->where(['age <' => 14])->count(); // adjust age as needed
            $otherCount = $this->Patients->find()->where(['gender' => 'Other'])->count();

            $values = [$maleCount, $femaleCount, $childCount, $otherCount];

            return $this->response->withType('application/json')
                ->withStringBody(json_encode(['values' => $values]));
        }


        public function patients(){
            // Get total counts
            $totalPatients = $this->Patients->find()->count();
            $totalStaff = $this->Nurses->find()->count();
            $totalTechnicians = $this->Technicians->find()->count();
            $totalRooms = $this->ImagingRooms->find()->count();
            $patientHistory = $this->Patients->find()
                ->distinct(['Patients.id'])
                ->matching('Exams', function ($q) {
                    return $q->where(['Exams.status' => 'Ongoing']);
                })
                ->limit(5)
                ->order(['Patients.id' => 'DESC']) // Optional: for most recent
                ->all();
            $technicians = $this->Technicians->find()->limit(5);
            $rooms = $this->ImagingRooms->find()->all();
            $nurses = $this->Nurses->find()->all();
            $pendingexamCounts = $this->Exams->find()
                ->select(['patient_id'])
                ->distinct(['patient_id'])
                ->where([
                    'status' => 'Pending',
                ])
                ->count();
            $allPatients = $this->Patients->find()->all();
            $activeExamPatientsCount = $this->Exams->find()
                ->select(['patient_id'])
                ->distinct(['patient_id'])
                ->where([
                    'status' => 'Ongoing',
                    'scheduled_time_id IS NOT' => null
                ])
                ->count();
            $activeExamSpecialistCount = $this->Exams->find()
                ->select(['patient_id'])
                ->distinct(['patient_id'])
                ->where([
                    'status' => 'Ongoing',
                    'specialist_id IS NOT' => null
                ])
                ->count();

            $todayStart = FrozenTime::now()->startOfDay();
            $todayEnd = FrozenTime::now()->endOfDay();

            $statuses = ['Completed', 'Pending', 'Ongoing'];

            $examLists = [];

            foreach ($statuses as $status) {
                $exams = $this->Exams->find()
                    ->contain(['Patients', 'ScheduledTimes'])
                    ->where(['Exams.status' => $status])
                    ->matching('ScheduledTimes', function ($q) use ($todayStart, $todayEnd) {
                        return $q->where([
                            'ScheduledTimes.ScheduledTime >=' => $todayStart,
                            'ScheduledTimes.ScheduledTime <=' => $todayEnd,
                        ]);
                    })
                    ->all();

                $examLists[strtolower($status)] = [];

                foreach ($exams as $exam) {
                    $examLists[strtolower($status)][] = [
                        'patient' => $exam->patient->FirstName . ' ' . $exam->patient->LastName,
                        'time' => $exam->scheduled_time->ScheduledTime->format('H:i'),
                    ];
                }
            }

                
            $this->set(compact(
                'activeExamPatientsCount',
                'activeExamSpecialistCount',
                'pendingexamCounts',
                'allPatients',
                'patientHistory',
                'totalPatients',
                'totalTechnicians',
                'totalRooms',
                'technicians',
                'examLists',
                'nurses',
                'rooms'
            ));
        
        }


        public function patientsexamData(): Response
        {
            $start = FrozenTime::parse($this->request->getQuery('start'));
            $end = FrozenTime::parse($this->request->getQuery('end'));

            $labels = $ongoing = $completed = [];

            while ($start <= $end) {
                $labels[] = $start->format('M d');

                $dayStart = (clone $start)->setTime(0, 0, 0);
                $dayEnd = (clone $start)->setTime(23, 59, 59);

                $ongoingCount = $this->Exams->find()
                    ->matching('ScheduledTimes', function ($q) use ($dayStart, $dayEnd) {
                        return $q->where([
                            'ScheduledTimes.ScheduledTime >=' => $dayStart,
                            'ScheduledTimes.ScheduledTime <=' => $dayEnd
                        ]);
                    })
                    ->where(['Exams.status' => 'Ongoing'])
                    ->distinct(['Exams.patient_id'])
                    ->count();

                $completedCount = $this->Exams->find()
                    ->matching('ScheduledTimes', function ($q) use ($dayStart, $dayEnd) {
                        return $q->where([
                            'ScheduledTimes.ScheduledTime >=' => $dayStart,
                            'ScheduledTimes.ScheduledTime <=' => $dayEnd
                        ]);
                    })
                    ->where(['Exams.status' => 'Completed'])
                    ->distinct(['Exams.patient_id'])
                    ->count();

                $ongoing[] = $ongoingCount;
                $completed[] = $completedCount;

                $start = $start->modify('+1 day');
            }

            return $this->response->withType('application/json')
                ->withStringBody(json_encode(compact('labels', 'ongoing', 'completed')));
        }


        public function technicians(){
            // Get total counts
            $totalPatients = $this->Patients->find()->count();
            $totalStaff = $this->Nurses->find()->count();
            $totalTechnicians = $this->Technicians->find()->count();
            $totalRooms = $this->ImagingRooms->find()->count();
            $patientHistory = $this->Patients->find()
                ->distinct(['Patients.id'])
                ->matching('Exams', function ($q) {
                    return $q->where(['Exams.status' => 'Ongoing']);
                })
                ->limit(5)
                ->order(['Patients.id' => 'DESC']) // Optional: for most recent
                ->all();
            $technicians = $this->Technicians->find()->limit(5);
            $rooms = $this->ImagingRooms->find()->limit(5);
            $pendingexamCounts = $this->Exams->find()
                ->select(['patient_id'])
                ->distinct(['patient_id'])
                ->where([
                    'status' => 'Pending',
                ])
                ->count();
            $allPatients = $this->Patients->find()->all();
            $activeExamPatientsCount = $this->Exams->find()
                ->select(['patient_id'])
                ->distinct(['patient_id'])
                ->where([
                    'status' => 'Ongoing',
                    'scheduled_time_id IS NOT' => null
                ])
                ->count();
            $activeExamTechnicianCount = $this->Exams->find()
                ->select(['patient_id'])
                ->distinct(['patient_id'])
                ->where([
                    'status' => 'Ongoing',
                    'technician_id IS NOT' => null
                ])
                ->count();

            $todayStart = FrozenTime::now()->startOfDay();
            $todayEnd = FrozenTime::now()->endOfDay();

            $statuses = ['Completed', 'Pending', 'Ongoing'];

            $examLists = [];

            foreach ($statuses as $status) {
                $exams = $this->Exams->find()
                    ->contain(['Patients', 'ScheduledTimes', 'Technicians']) // Include Technicians
                    ->where(['Exams.status' => $status])
                    ->matching('ScheduledTimes', function ($q) use ($todayStart, $todayEnd) {
                        return $q->where([
                            'ScheduledTimes.ScheduledTime >=' => $todayStart,
                            'ScheduledTimes.ScheduledTime <=' => $todayEnd,
                        ]);
                    })
                    ->all();

                $examLists[strtolower($status)] = [];

                foreach ($exams as $exam) {
                    $examLists[strtolower($status)][] = [
                        'patient' => $exam->patient->FirstName . ' ' . $exam->patient->LastName,
                        'time' => $exam->scheduled_time->ScheduledTime->format('H:i'),
                        'technician' => $exam->technician ? $exam->technician->name : 'Not Assigned'
                    ];
                }
            }

                
            $this->set(compact(
                'activeExamPatientsCount',
                'activeExamTechnicianCount',
                'pendingexamCounts',
                'allPatients',
                'patientHistory',
                'totalPatients',
                'totalTechnicians',
                'totalRooms',
                'technicians',
                'examLists'
            ));
        
        }

        public function specialists(){
            // Get total counts
            $totalPatients = $this->Patients->find()->count();
            $totalStaff = $this->Nurses->find()->count();
            $totalSpecialists = $this->Specialists->find()->count();
            $totalRooms = $this->ImagingRooms->find()->count();
            $patientHistory = $this->Patients->find()
                ->distinct(['Patients.id'])
                ->matching('Exams', function ($q) {
                    return $q->where(['Exams.status' => 'Ongoing']);
                })
                ->limit(5)
                ->order(['Patients.id' => 'DESC']) // Optional: for most recent
                ->all();
            $specialists = $this->Specialists->find()->limit(5);
            $rooms = $this->ImagingRooms->find()->limit(5);
            $pendingexamCounts = $this->Exams->find()
                ->select(['patient_id'])
                ->distinct(['patient_id'])
                ->where([
                    'status' => 'Pending',
                ])
                ->count();
            $allPatients = $this->Patients->find()->all();
            $activeExamPatientsCount = $this->Exams->find()
                ->select(['patient_id'])
                ->distinct(['patient_id'])
                ->where([
                    'status' => 'Ongoing',
                    'scheduled_time_id IS NOT' => null
                ])
                ->count();
            $activeExamSpecialistCount = $this->Exams->find()
                ->select(['patient_id'])
                ->distinct(['patient_id'])
                ->where([
                    'status' => 'Ongoing',
                    'specialist_id IS NOT' => null
                ])
                ->count();

            $todayStart = FrozenTime::now()->startOfDay();
            $todayEnd = FrozenTime::now()->endOfDay();

            $statuses = ['Completed', 'Pending', 'Ongoing'];

            $examLists = [];

            foreach ($statuses as $status) {
                $exams = $this->Exams->find()
                    ->contain(['Patients', 'ScheduledTimes', 'Specialists']) // Include Technicians
                    ->where(['Exams.status' => $status])
                    ->matching('ScheduledTimes', function ($q) use ($todayStart, $todayEnd) {
                        return $q->where([
                            'ScheduledTimes.ScheduledTime >=' => $todayStart,
                            'ScheduledTimes.ScheduledTime <=' => $todayEnd,
                        ]);
                    })
                    ->all();

                $examLists[strtolower($status)] = [];

                foreach ($exams as $exam) {
                    $examLists[strtolower($status)][] = [
                        'patient' => $exam->patient->FirstName . ' ' . $exam->patient->LastName,
                        'time' => $exam->scheduled_time->ScheduledTime->format('H:i'),
                        'specialist' => $exam->specialist ? $exam->specialist->name : 'Not Assigned'
                    ];
                }
            }

                
            $this->set(compact(
                'activeExamPatientsCount',
                'activeExamSpecialistCount',
                'pendingexamCounts',
                'allPatients',
                'patientHistory',
                'totalPatients',
                'totalSpecialists',
                'totalRooms',
                'specialists',
                'examLists'
            ));
        
        }


        public function chartData()
        {
            $this->request->allowMethod(['get', 'ajax']);

            // Get params
            $modelName = $this->request->getQuery('model');
            $start = $this->request->getQuery('start');
            $end = $this->request->getQuery('end');

            // Validate model name
            $allowedModels = ['Patients', 'Specialists', 'Technicians', 'Exams', 'Nurses'];
            if (!in_array($modelName, $allowedModels)) {
                return $this->response->withStatus(400)->withType('application/json')->withStringBody(json_encode([
                    'error' => 'Invalid model name'
                ]));
            }

            // Load dynamic table
            $Table = TableRegistry::getTableLocator()->get($modelName);

            // Date range
            $startDate = $start ? FrozenTime::parse($start)->startOfDay() : FrozenTime::now()->subDays(6)->startOfDay();
            $endDate = $end ? FrozenTime::parse($end)->endOfDay() : FrozenTime::now()->endOfDay();

            // Fetch grouped results
            $query = $Table->find()
                ->select([
                    'day' => 'DATE(created_at)',
                    'total' => $Table->find()->func()->count('*')
                ])
                ->where([
                    'created_at >=' => $startDate,
                    'created_at <=' => $endDate
                ])
                ->group('day')
                ->enableHydration(false)
                ->toArray();

            // Map results
            $dateMap = [];
            foreach ($query as $row) {
                $label = (new FrozenTime($row['day']))->format('M d');
                $dateMap[$label] = (int)$row['total'];
            }

            // Fill full date range
            $labels = [];
            $values = [];
            $current = clone $startDate;   // ✅ CORRECT

            while ($current <= $endDate) {
                $label = $current->format('M d');
                $labels[] = $label;
                $values[] = $dateMap[$label] ?? 0;
                $current = $current->modify('+1 day');
            }

            // $this->set([
            //     'labels' => $labels,
            //     'value' => $values,
            //     '_serialize' => ['labels', 'value']
            // ]);
             return $this->response->withType('application/json')
                ->withStringBody(json_encode(compact('labels', 'values')));
        }

        public function imagingroomsChartData()
        { 
            $this->request->allowMethod(['get', 'ajax']);

            // Get params
            $start = $this->request->getQuery('start');
            $end = $this->request->getQuery('end');

            // Load dynamic table
            $Table = TableRegistry::getTableLocator()->get($modelName);

            // Date range
            $startDate = $start ? FrozenTime::parse($start)->startOfDay() : FrozenTime::now()->subDays(6)->startOfDay();
            $endDate = $end ? FrozenTime::parse($end)->endOfDay() : FrozenTime::now()->endOfDay();

            // Fetch grouped results
            $query = $Table->find()
                ->select([
                    'day' => 'DATE(created_at)',
                    'total' => $Table->find()->func()->count('*')
                ])
                ->where([
                    'created_at >=' => $startDate,
                    'created_at <=' => $endDate
                ])
                ->group('day')
                ->enableHydration(false)
                ->toArray();

            // Map results
            $dateMap = [];
            foreach ($query as $row) {
                $label = (new FrozenTime($row['day']))->format('M d');
                $dateMap[$label] = (int)$row['total'];
            }

            // Fill full date range
            $labels = [];
            $values = [];
            $current = clone $startDate;   // ✅ CORRECT

            while ($current <= $endDate) {
                $label = $current->format('M d');
                $labels[] = $label;
                $values[] = $dateMap[$label] ?? 0;
                $current = $current->modify('+1 day');
            }

            // $this->set([
            //     'labels' => $labels,
            //     'value' => $values,
            //     '_serialize' => ['labels', 'value']
            // ]);
             return $this->response->withType('application/json')
                ->withStringBody(json_encode(compact('labels', 'values')));
        }

        public function filterGraphData()
        {
            $this->request->allowMethod(['get', 'ajex']);

            $daterange = $this->request->getQuery('daterange');
            $start = $daterange ? explode(' - ', $daterange)[0] : null;
            $end = $daterange ? explode(' - ', $daterange)[1] : null;

            $startDate = $start ? FrozenTime::parse($start)->startOfDay() : FrozenTime::now()->subDays(6)->startOfDay();
            $endDate = $end ? FrozenTime::parse($end)->endOfDay() : FrozenTime::now()->endOfDay();

            $conditions = [
                'Patients.created_at >=' => $startDate,
                'Patients.created_at <=' => $endDate,
            ];

            if ($this->request->getQuery('room')) {
                $conditions['Exams.imaging_room_id'] = $this->request->getQuery('room');
            }
            if ($this->request->getQuery('status')) {
                $conditions['Exams.status'] = $this->request->getQuery('status');
            }

            if ($this->request->getQuery('gender')) {
                $conditions['Patients.gender'] = $this->request->getQuery('gender');
            }

            // if ($this->request->getQuery('nurse')) {
            //     $conditions['Exams.nurse'] = $this->request->getQuery('nurse'); // Adjust if nurse is in another table
            // }

            if ($this->request->getQuery('age')) {
                $range = explode('-', $this->request->getQuery('age'));
                if (count($range) === 2) {
                    $conditions['Patients.age >='] = (int)$range[0];
                    $conditions['Patients.age <='] = (int)$range[1];
                }
            }

            // Query with join to Patients
            // Query with join to Patients
            $query = $this->Exams->find()
            ->select([
                'day' => 'DATE(Exams.created_at)',
                'total' => $this->Exams->find()->func()->count('*'),
                'Exams.patient_id' // ✅ add this line
            ])
            ->contain(['Patients'])
            ->matching('Patients', function ($q) use ($conditions) {
                return $q->where($conditions);
            })
            ->group('day')
            ->enableHydration(false)
            ->toArray();

            // Format result
            $dateMap = [];
            foreach ($query as $row) {
                $label = (new FrozenTime($row['day']))->format('M d');
                $dateMap[$label] = (int)$row['total'];
            }

            $labels = [];
            $values = [];
            $current = clone $startDate;

            while ($current <= $endDate) {
                $label = $current->format('M d');
                $labels[] = $label;
                $values[] = $dateMap[$label] ?? 0;
                $current = $current->modify('+1 day');
            }

            return $this->response->withType('application/json')
                ->withStringBody(json_encode(compact('labels', 'values')));
        }

    }
