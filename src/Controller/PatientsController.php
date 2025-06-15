<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use DateTimeImmutable;


$examsTable = TableRegistry::getTableLocator()->get('Exams');


/**
 * Patients Controller
 *
 * @property \App\Model\Table\PatientsTable $Patients
 */
class PatientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Patients->find();
        $patients = $this->paginate($query);

        $this->set(compact('patients'));
    }

    /**
     * View method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patient = $this->Patients->get($id, contain: ['CareAssignments', 'Exams', 'NursingIntervention', 'PatientVisits']);
        $this->set(compact('patient'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patient = $this->Patients->newEmptyEntity();
        if ($this->request->is('post')) {
            $patient = $this->Patients->patchEntity($patient, $this->request->getData());
            if ($this->Patients->save($patient)) {
                $this->Flash->success(__('The patient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patient could not be saved. Please, try again.'));
        }
        $this->set(compact('patient'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patient = $this->Patients->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patient = $this->Patients->patchEntity($patient, $this->request->getData());
            if ($this->Patients->save($patient)) {
                $this->Flash->success(__('The patient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patient could not be saved. Please, try again.'));
        }
        $this->set(compact('patient'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patient = $this->Patients->get($id);
        if ($this->Patients->delete($patient)) {
            $this->Flash->success(__('The patient has been deleted.'));
        } else {
            $this->Flash->error(__('The patient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function patientSchedule()
{
    $query = $this->Patients->find()
        ->contain(['CareAssignments'=>['Nurses'],'Exams'=>['ScheduledTimes',
        'Sedations' => function ($q) { // Ensure it's correctly joined
                return $q;
            }
        ]
    ]); // Ensure association name is correct (case-sensitive)

    $query = $this->Patients->find()
        ->contain(['CareAssignments'=>['Nurses'],'Exams'=>['ScheduledTimes',"Diagnosis", "PatientLogs", "ImagingRooms","Technicians",
        'Sedations' => function ($q) { // Ensure it's correctly joined
                return $q;
            }
        ]
    ]);

    $patients = $this->paginate($query);
    //debug($query);
    $this->set(compact('patients')); // Pass data to the view
    //debug($patients);
}

public function update($tableName = null, $id = null){
    $this->log('Update method called: ', 'debug');
    $this->autoRender = false; // No view rendering
    //$this->request->allowMethod(['post']); // Only allow POST

    $response = ['success' => false];
    
    try {
        $data = $this->request->getData();
        
        // Validate required fields
        $missingParams = [];
        if (empty($tableName)) {
            $missingParams[] = 'tableName';
        }
        if (empty($id)) {
            $missingParams[] = 'id';
        }
        if (empty($data['column'])) { // Corrected to match the AJAX 'column' field
            $missingParams[] = 'column';
        }
        if (!array_key_exists('value', $data)) { // Ensure 'value' is present, even if empty
            $missingParams[] = 'value';
        }
        if (!empty($missingParams)) {
            throw new \InvalidArgumentException('Missing required parameters: ' . implode(', ', $missingParams));
        }

        // Security: Only allow certain tables to be modified
        $allowedTables = ['Patients', 'Diagnosis','RelatedTable','imaging_rooms','Nurses','scheduled_time']; // Add your allowed tables
        if (!in_array($tableName, $allowedTables)) {
            throw new \InvalidArgumentException('Unauthorized table access');
        }

        // Load the appropriate table
        $table = $this->fetchTable($tableName);
        
        // Get the record
        $record = $table->get($id);
        
        if ($data['column'] === 'ScheduledTime' || $data['column'] === 'start_time' || $data['column'] === 'end_time') {
            try {
                // Step 1: Parse using correct format (US style with 2-digit year and AM/PM)
                $date = DateTimeImmutable::createFromFormat('n/j/y, g:i A', $data['value']);

                if (!$date) {
                    throw new \Exception('Invalid format');
                }

                // Step 2: Convert to MySQL DATETIME format
                $value = $date->format('Y-m-d H:i:s');
            } catch (\Throwable $e) {
                $value = null;
            }
        } else {
            $value = $data['value'];
        }
        if($value === null && in_array($data['column'], ['ScheduledTime', 'start_time', 'end_time'])) {
            throw new \InvalidArgumentException('Invalid value for ' . $data['column']);
        }
        // add validation for out of range values
        if (in_array($data['column'], ['ScheduledTime', 'start_time', 'end_time'])) {
            // Validate input format strictly: n/j/y, g:i A
            $pattern = '/^(0?[1-9]|1[0-2])\/(0?[1-9]|[12][0-9]|3[01])\/\d{2},\s(0?[1-9]|1[0-2]):([0-5][0-9])\s(AM|PM)$/i';
            // if (!preg_match($pattern, $data['value'])) {
            // throw new \InvalidArgumentException('Invalid date/time format. Use M/D/YY, h:mm AM/PM');
            // }

            // Parse date
            $date = DateTimeImmutable::createFromFormat('n/j/y, g:i A', $data['value']);
            $errors = DateTimeImmutable::getLastErrors();
            if (!$date || $errors['warning_count'] > 0 || $errors['error_count'] > 0) {
            throw new \InvalidArgumentException('Invalid date/time value.');
            }

            // Range check: year, month, day, hour, minute
            $year = (int)$date->format('Y');
            $month = (int)$date->format('n');
            $day = (int)$date->format('j');
            $hour = (int)$date->format('G'); // 0-23
            $minute = (int)$date->format('i');

            if ($year < 2000 || $year > 2030) {
            throw new \InvalidArgumentException('Year must be between 2000 and 2030.');
            }
            if ($month < 1 || $month > 12) {
            throw new \InvalidArgumentException('Month must be between 1 and 12.');
            }
            if ($day < 1 || $day > 31) {
            throw new \InvalidArgumentException('Day must be between 1 and 31.');
            }
            if ($hour < 0 || $hour > 23) {
            throw new \InvalidArgumentException('Hour must be between 1 and 12 (AM/PM).');
            }
            if ($minute < 0 || $minute > 59) {
            throw new \InvalidArgumentException('Minute must be between 0 and 59.');
            }
        }

        if ($tableName === "Nurses" && $data['column'] === 'FirstName') {
            $fullName = trim($data['value']);

            // Split on first space
            [$firstName, $lastName] = array_pad(explode(' ', $fullName, 2), 2, null);

            $table->patchEntity($record, [
                'FirstName' => $firstName,
                'LastName' => $lastName
            ]);
        } else {
            // Default field update
            //$value = $data['value'];

            $table->patchEntity($record, [
                $data['column'] => $value
            ]);
        }
                
        // Save with validation
        if ($table->save($record)) {
            $response = [
                'success' => true,
                'value'=>$value,
                'message' => 'Field updated successfully',
                'newValue' => $data['value']
            ];
            $this->Flash->success(__('Data updated successfully.'));
        } else {
            $response['error'] = 'Validation failed: ' . json_encode($record->getErrors());
              $this->Flash->error(__('The patient data could not be saved. Please, try again.'));
        }
    } catch (\Exception $e) {
        $response['error'] = $e->getMessage();
    }

    return $this->response
        ->withType('application/json')
        ->withStringBody(json_encode($response));
}

}
