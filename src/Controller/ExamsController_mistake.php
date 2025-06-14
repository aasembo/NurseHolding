<?php
declare( strict_types = 1 );

namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;

/**
* Exams Controller
*
* @property \App\Model\Table\ExamsTable $Exams
*/

class ExamsController extends AppController {
    /**
    * Index method
    *
    * @return \Cake\Http\Response|null|void Renders view
    */

    public function index() {
        $query = $this->Exams->find()
        ->contain( [ 'Patients', 'Locations', 'ScheduledTimes', 'ImagingRooms', 'Technicians', 'Specialists' ] );
        $exams = $this->paginate( $query );

        $this->set( compact( 'exams' ) );
    }

    /**
    * View method
    *
    * @param string|null $id Exam id.
    * @return \Cake\Http\Response|null|void Renders view
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */

    public function view( $id = null ) {
        $exam = $this->Exams->get( $id, contain: [ 'Patients', 'Locations', 'ScheduledTimes', 'ImagingRooms', 'Technicians', 'Specialists', 'Diagnosis', 'ExamStatusUpdates', 'ExamTimings', 'PatientLogs', 'Reporting', 'Sedations' ] );
        $this->set( compact( 'exam' ) );
    }

    /**
    * Add method
    *
    * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
    */

    public function add() {
        $exam = $this->Exams->newEmptyEntity();

        if ( $this->request->is( 'post' ) ) {
            $data = $this->request->getData();

            // Ensure sedation has the correct exam_id after saving the exam
            $exam = $this->Exams->patchEntity( $exam, $data, [ 'associated' => [ 'Sedations' ] ] );

            if ( $this->Exams->save( $exam ) ) {
                // Assign exam_id to sedations and save them separately
                if ( !empty( $data[ 'sedations' ] ) ) {
                    foreach ( $data[ 'sedations' ] as &$sedation ) {
                        $sedation[ 'exam_id' ] = $exam->id;
                        // Ensure exam_id is assigned
                    }

                    $sedationEntities = $this->Exams->Sedations->newEntities( $data[ 'sedations' ] );
                    $this->Exams->Sedations->saveMany( $sedationEntities );
                }

                $this->Flash->success( __( 'The exam and sedation have been saved.' ) );
                return $this->redirect( [ 'action' => 'index' ] );
            }

            $this->Flash->error( __( 'The exam could not be saved. Please, try again.' ) );
        }
        $patients = $this->Exams->Patients->find( 'list', [ 'limit' => 200 ] )->all();
        $locations = $this->Exams->Locations->find( 'list', [ 'limit' => 200 ] )->all();
        $scheduledTimes = $this->Exams->ScheduledTimes->find( 'list', [ 'limit' => 200 ] )->all();
        $imagingRooms = $this->Exams->ImagingRooms->find( 'list', [ 'limit' => 200 ] )->all();
        $sedations = $this->Exams->Sedations->find( 'list', [
            'keyField' => 'id',
            'valueField' => 'sedation_type', // Ensure this matches your actual column name
        ] )->all();
        $technicians = $this->Exams->Technicians->find( 'list', [ 'limit' => 200 ] )->all();
        $specialists = $this->Exams->Specialists->find( 'list', [ 'limit' => 200 ] )->all();
        $this->set( compact( 'exam', 'patients', 'locations', 'scheduledTimes', 'imagingRooms', 'technicians', 'specialists', 'sedations' ) );
    }

    /**
    * Edit method
    *
    * @param string|null $id Exam id.
    * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */

    public function edit( $id = null ) {
        $exam = $this->Exams->get( $id, [
            'contain' => [ 'ScheduledTimes', 'Sedations' ], // Include Sedations
        ] );

        if ( $this->request->is( [ 'patch', 'post', 'put' ] ) ) {
            $data = $this->request->getData();
            //debug( $data );
            // Ensure Sedation entities are updated correctly
            $exam = $this->Exams->patchEntity( $exam, $data, [ 'associated' => [ 'Sedations' ] ] );

            if ( $this->Exams->save( $exam ) ) {
                $this->Flash->success( __( 'The exam has been updated.' ) );

                return $this->redirect( [ 'action' => 'index' ] );
            }
            $this->Flash->error( __( 'The exam could not be updated. Please, try again.' ) );
        }
        $patients = $this->Exams->Patients->find( 'list', limit: 200 )->all();
        $locations = $this->Exams->Locations->find( 'list', limit: 200 )->all();
        //$scheduledTimes = $this->Exams->ScheduledTimes->find( 'list', limit: 200 )->all();
        $scheduledTimes = $this->Exams->ScheduledTimes->find( 'list', [
            'keyField' => 'id',
            'valueField' => 'ScheduledTime', // Adjust based on your column name
            'limit' => 200
        ] )->all();
        //debug( $scheduledTimes );
        //debug( $exam->scheduled_time->ScheduledTime );
        $imagingRooms = $this->Exams->ImagingRooms->find( 'list', limit: 200 )->all();
        $technicians = $this->Exams->Technicians->find( 'list', limit: 200 )->all();
        $specialists = $this->Exams->Specialists->find( 'list', limit: 200 )->all();
        $this->set( compact( 'exam', 'patients', 'locations', 'scheduledTimes', 'imagingRooms', 'technicians', 'specialists' ) );
        //debug( $scheduledTimes->toArray() );
        exit;
    }

    /**
    * Delete method
    *
    * @param string|null $id Exam id.
    * @return \Cake\Http\Response|null Redirects to index.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */

    public function delete( $id = null ) {
        $this->request->allowMethod( [ 'post', 'delete' ] );
        $exam = $this->Exams->get( $id );
        if ( $this->Exams->delete( $exam ) ) {
            $this->Flash->success( __( 'The exam has been deleted.' ) );
        } else {
            $this->Flash->error( __( 'The exam could not be deleted. Please, try again.' ) );
        }

        return $this->redirect( [ 'action' => 'index' ] );
    }

    public function upload() {
        $this->request->allowMethod( [ 'get', 'post' ] );
        $this->log( 'Starting upload!', 'debug' );

        if ( $this->request->is( 'post' ) ) {
            $uploadedFile = $this->request->getData( 'csv_file' );
            // dd($uploadedFile);
            if ( $uploadedFile && $uploadedFile->getError() === UPLOAD_ERR_OK ) {
                // Define the path to store the uploaded file temporarily
                $filePath = TMP . $uploadedFile->getClientFilename();
                $uploadedFile->moveTo( $filePath );

                // Call the importCsv method to process the file
                if ( $this->importCsv( $filePath ) ) {
                    $this->Flash->success( __( 'The CSV file has been imported successfully.' ) );
                } else {
                    $this->Flash->error( __( 'There was an error importing the CSV file.' ) );
                }

                // Delete the temporary file
                unlink( $filePath );

                return $this->redirect( [ 'action' => 'index' ] );
            } else {
                $this->Flash->error( __( 'Please upload a valid CSV file.' ) );
            }
        }
    }

    private function importCsv( $filePath ) {
        $file = new \SplFileObject( $filePath );
        $file->setFlags( \SplFileObject::READ_CSV | \SplFileObject::READ_AHEAD | \SplFileObject::SKIP_EMPTY );

        // Get table instances
        $examsTable = $this->Exams;
        $patientsTable = TableRegistry::getTableLocator()->get( 'Patients' );
        $diagnosisTable = TableRegistry::getTableLocator()->get( 'Diagnosis' );
        $sedationsTable = TableRegistry::getTableLocator()->get( 'Sedations' );
        $patientVisitsTable = TableRegistry::getTableLocator()->get( 'PatientVisits' );
        $nursingInterventionTable = TableRegistry::getTableLocator()->get( 'NursingIntervention' );
        $scheduledTimeTable = TableRegistry::getTableLocator()->get('ScheduledTime');
        $techniciansTable = TableRegistry::getTableLocator()->get('technicians');

        // Read headers from first row
        $headers = $file->current();
        $file->next();
        $headerMap = array_flip( $headers );

        $imported = 0;
        $skipped = 0;

        foreach ( $file as $row ) {
            try {
                // Skip incomplete rows
                if ( count( $row ) < 2 ) {
                    $skipped++;
                    continue;
                }

                // Get medical_record_number - required field
                $medicalRecordNumber = $this->getCsvValue( $row, $headerMap, 'MRN' );
                if ( empty( $medicalRecordNumber ) ) {
                    $this->log( 'Skipping row - missing medical_record_number', 'debug' );
                    $skipped++;
                    continue;
                }

                // Split name
                $fullName = $row[$headerMap['Name']] ?? null;
                $nameParts = explode(' ', $fullName, 2);
                $firstName = $nameParts[0] ?? null;
                $lastName = $nameParts[1] ?? null;
            

                // ===  ===  ===  = PATIENT HANDLING ===  ===  ===  =
                $patient = $patientsTable->find()
                ->where( [ 'medical_record_number' => $medicalRecordNumber ] )
                ->first();

                if ( !$patient ) {
                    $patientData = [
                        'medical_record_number' => $medicalRecordNumber,
                        'FirstName' => $firstName,
                        'LastName' => $lastName,
                        'gender' => $this->getCsvValue( $row, $headerMap, 'gender' ) ?? ( rand( 0, 1 ) ? 'Male' : 'Female' ),
                        'age' => $this->getCsvValue( $row, $headerMap, 'age' ),
                    ];

                    $patient = $patientsTable->newEntity( $patientData );
                    if ( !$patientsTable->save( $patient ) ) {
                        $this->log( 'Failed to save patient: ' . json_encode( $patient->getErrors() ), 'error' );
                        $skipped++;
                        continue;
                    }
                }

                // ===  ===  ===  = PATIENT VISITS ===  ===  ===  =
                if ( $this->hasCsvColumn( $headerMap, 'Accession' ) || $this->hasCsvColumn( $headerMap, 'Visit Number' ) ) {
                    $visitData = [
                        'patient_id' => $patient->id,
                        'accession' => $this->getCsvValue( $row, $headerMap, 'accession' ),
                        'visit_number' => $this->getCsvValue( $row, $headerMap, 'visit_number' ),
                    ];

                    $visit = $patientVisitsTable->newEntity( $visitData );
                    if ( !$patientVisitsTable->save( $visit ) ) {
                        $this->log( 'Failed to save patient visit: ' . json_encode( $visit->getErrors() ), 'error' );
                    }
                }
                $technician = null;
                // ===  ===  ===  = TECHNICIANS ===  ===  ===  =
                if ( $this->hasCsvColumn( $headerMap, 'Technician' ) ) {
                    $technicians = $this->getCsvValue( $row, $headerMap, 'Technician' );
                    if ( $technicians ) {
                        $technician = $techniciansTable->find()
                        ->where( [ 'name' => $technicians ] )
                        ->first();
                        if ( !$technician ) {
                            $this->log( 'Technician with ID ' . $technicians . ' not found.', 'error' );
                                           
                            //create a new technician if not fund
                            //if email and phone are not provided, set mail make from mail with @gmail.com
                            $email = $this->getCsvValue( $row, $headerMap, 'technician_email' );
                            if ( !$email ) {
                                $email = strtolower( str_replace( ' ', '.', $technicians ) ) . '@gmail.com';
                            }
                            $technicianData = [
                                'name' => $technicians,
                                'email' => $email ?? null,
                                'phone' => $this->getCsvValue( $row, $headerMap, 'technician_phone' ) ?? null,
                            ];
                            $technician = $techniciansTable->newEntity( $technicianData );
                            if ( !$techniciansTable->save( $technician ) ) {
                                $this->log( 'Failed to save technician: ' . json_encode( $technician->getErrors() ), 'error' );
                                continue;
                            }
                        }
                        $this->log( 'Technician created: ' . $technician->name, 'debug' );
                    }
                }


                // ===  ===  ===  = EXAMS ===  ===  ===  =
                if ( $this->hasCsvColumn( $headerMap, 'Exam' ) ) {
                    $examData = [
                        'patient_id' => $patient->id,
                        'exam_type' => $this->getCsvValue( $row, $headerMap, 'Exam' ),
                        'status' => $this->getCsvValue( $row, $headerMap, 'Exam Code' ) ?? 'Pending',
                        'imaging_room_id' => $this->getCsvValue( $row, $headerMap, 'imaging_room_id' ) ?? null,
                        'technician_id' => $technician ? $technician->id : null,
                        'specialist_id' => $this->getCsvValue( $row, $headerMap, 'specialist_id' ) ?? null,
                    ];

                    // Handle location if provided
                    if ( $this->hasCsvColumn( $headerMap, 'location_name' ) ) {
                        $locationName = $this->getCsvValue( $row, $headerMap, 'location_name' );
                        $location = TableRegistry::getTableLocator()->get( 'Locations' )
                        ->find()
                        ->where( [ 'name' => $locationName ] )
                        ->first();
                        if ( $location ) {
                            $examData[ 'location_id' ] = $location->id;
                        }
                    }

                    $exam = $examsTable->newEntity( $examData );
                    if ( !$examsTable->save( $exam ) ) {
                        $this->log( 'Failed to save exam: ' . json_encode( $exam->getErrors() ), 'error' );
                    } else {
                        // ===  ===  ===  = DIAGNOSIS ===  ===  ===  =
                        if ( $this->hasCsvColumn( $headerMap, 'Diagnosis' ) ) {
                            $diagnosisData = [
                                'exam_id' => $exam->id,
                                'diagnosis_text' => $this->getCsvValue( $row, $headerMap, 'Diagnosis' ),
                            ];

                            $diagnosis = $diagnosisTable->newEntity( $diagnosisData );
                            if ( !$diagnosisTable->save( $diagnosis ) ) {
                                $this->log( 'Failed to save diagnosis: ' . json_encode( $diagnosis->getErrors() ), 'error' );
                            }
                        }

                        // ===  ===  ===  = SEDATIONS ===  ===  ===  =
                        if ( $this->hasCsvColumn( $headerMap, 'sedation_type' ) ) {
                            $sedationData = [
                                'exam_id' => $exam->id,
                                'sedation_type' => $this->getCsvValue( $row, $headerMap, 'sedation_type' ),
                                'dose' => $this->getCsvValue( $row, $headerMap, 'dose' ),
                            ];

                            $sedation = $sedationsTable->newEntity( $sedationData );
                            if ( !$sedationsTable->save( $sedation ) ) {
                                $this->log( 'Failed to save sedation: ' . json_encode( $sedation->getErrors() ), 'error' );
                            }
                        }
                    }
                }

                // ========== SCHEDULED TIME HANDLING ==========
                $scheduledTimeId = null;
                if ($this->hasCsvColumn($headerMap, 'Scheduled Time') || $this->hasCsvColumn($headerMap, 'Completed Time')) {
                    $startTime = $this->getCsvValue($row, $headerMap, 'Begin Time') ?? $this->getCsvValue($row, $headerMap, 'Ordered-Begin');
                    $endTime = $this->getCsvValue($row, $headerMap, 'Completed Time') ?? $this->getCsvValue($row, $headerMap, 'Finalized Time');
                    $scheduledTime = $this->getCsvValue($row, $headerMap, 'Scheduled Time') ?? $this->getCsvValue($row, $headerMap, 'Ordered Time'); 
                    
                    if ($startTime && $endTime) {
                        // Try to find existing scheduled time
                        $scheduledTime = $scheduledTimeTable->find()
                            ->where([
                                'start_time' => $startTime,
                                'end_time' => $endTime

                            ])
                            ->first();
                        
                        if (!$scheduledTime) {
                            $scheduledTime = $scheduledTimeTable->newEntity([
                                'id'=> $patient->id,
                                'scheduledTime' => $scheduledTime,
                                'start_time' => $startTime,
                                'end_time' => $endTime
                            ]);
                            
                            if (!$scheduledTimeTable->save($scheduledTime)) {
                                $this->log("Failed to save scheduled time: " . json_encode($scheduledTime->getErrors()), 'error');
                            } else {
                                $scheduledTimeId = $scheduledTime->id;
                            }
                        } else {
                            $scheduledTimeId = $scheduledTime->id;
                        }
                    }
                }

                // ===  ===  ===  = NURSING INTERVENTION ===  ===  ===  =
                if ( $this->hasCsvColumn( $headerMap, 'child_life' ) ||
                $this->hasCsvColumn( $headerMap, 'piv' ) ||
                $this->hasCsvColumn( $headerMap, 'comments' ) ) {

                    $interventionData = [
                        'patient_id' => $patient->id,
                        'intervention_date' => $this->getCsvValue( $row, $headerMap, 'intervention_date' ) ?? date( 'Y-m-d' ),
                        'child_life' => $this->getCsvValue( $row, $headerMap, 'child_life' ) ?? 0,
                        'piv' => $this->getCsvValue( $row, $headerMap, 'piv' ) ?? 0,
                        'picc_team' => $this->getCsvValue( $row, $headerMap, 'picc_team' ) ?? 0,
                        'port_access' => $this->getCsvValue( $row, $headerMap, 'port_access' ) ?? 0,
                        'foley' => $this->getCsvValue( $row, $headerMap, 'foley' ) ?? 0,
                        'circulating_monitoring' => $this->getCsvValue( $row, $headerMap, 'circulating_monitoring' ) ?? 0,
                        'labs' => $this->getCsvValue( $row, $headerMap, 'labs' ) ?? 0,
                        'ekg' => $this->getCsvValue( $row, $headerMap, 'ekg' ) ?? 0,
                        'meds' => $this->getCsvValue( $row, $headerMap, 'meds' ) ?? 0,
                        'comments' => $this->getCsvValue( $row, $headerMap, 'comments' ),
                    ];

                    $intervention = $nursingInterventionTable->newEntity( $interventionData );
                    if ( !$nursingInterventionTable->save( $intervention ) ) {
                        $this->log( 'Failed to save nursing intervention: ' . json_encode( $intervention->getErrors() ), 'error' );
                    }
                }

                $imported++;

            } catch ( \Exception $e ) {
                $this->log( 'Error processing row: ' . $e->getMessage(), 'error' );
                $skipped++;
            }
        }

        $this->Flash->success( "Import completed. {$imported} records imported, {$skipped} skipped." );
        return true;
    }

    /**
    * Helper method to safely get CSV values
    */

    private function getCsvValue( $row, $headerMap, $columnName, $default = null ) {
        return isset( $headerMap[ $columnName ] ) && isset( $row[ $headerMap[ $columnName ] ] )
        ? $row[ $headerMap[ $columnName ] ]
        : $default;
    }

    /**
    * Helper method to check if CSV has a column
    */

    private function hasCsvColumn( $headerMap, $columnName ) {
        return isset( $headerMap[ $columnName ] );
    }

    public function export() {
        $this->response = $this->response->withDownload('exams_export.csv');
        $examsTable = $this->Exams;

        // Fetch data from the Exams table
        $exams = $examsTable->find('all', [
            'contain' => ['Patients', 'Technicians', 'Locations', 'ScheduledTime', 'Diagnosis', 'Sedations', 'NursingIntervention'] // Include all related tables
        ])->toArray();

        // Open a memory stream for the CSV
        $csvFile = fopen('php://output', 'w');

        // Write the header row
        $headers = [
            'Visit Number',
            'MRN',
            'Accession',
            'Exam Status',
            'Ordered Time',
            'Scheduled Time',
            'Begin Time',
            'Ordered-Begin',
            'Completed Time',
            'Finalized Time',
            'Reading Provider',
            'Scheduled to Begin',
            'Begin to Complete',
            'Comments',
            'Complete to Finalized',
            'Date of Service',
            'Name',
            'Exam',
            'Exam Room',
            'Diagnosis',
            'Patient Type (O or I)',
            'Technician',
            'Start or ASAP',
            'Site',
            'Exam',
            'Code',
            'Ordered By',
        ];
        fputcsv($csvFile, $headers);

        // Write data rows
        foreach ($exams as $exam) {
            $row = [
                $exam->patient->visit_number ?? 'N/A',
                $exam->patient->medical_record_number ?? 'N/A',
                $exam->patient->accession ?? 'N/A',
                $exam->status ?? 'N/A',
                $exam->ordered_time ? $exam->ordered_time->format('Y-m-d H:i:s') : 'N/A',
                $exam->scheduled_time ? $exam->scheduled_time->format('Y-m-d H:i:s') : 'N/A',
                $exam->begin_time ? $exam->begin_time->format('Y-m-d H:i:s') : 'N/A',
                $exam->ordered_time && $exam->begin_time ? $exam->ordered_time->diff($exam->begin_time)->format('%H:%I:%S') : 'N/A',
                $exam->completed_time ? $exam->completed_time->format('Y-m-d H:i:s') : 'N/A',
                $exam->finalized_time ? $exam->finalized_time->format('Y-m-d H:i:s') : 'N/A',
                $exam->reading_provider ? $exam->reading_provider->name : 'N/A',
                $exam->scheduled_to_begin ? $exam->scheduled_to_begin->format('Y-m-d H:i:s') : 'N/A',
                $exam->begin_to_complete ? $exam->begin_to_complete->format('Y-m-d H:i:s') : 'N/A',
                $exam->comments ?? 'N/A',
                $exam->complete_to_finalized ? $exam->complete_to_finalized->format('Y-m-d H:i:s') : 'N/A',
                $exam->date_of_service ? $exam->date_of_service->format('Y-m-d') : 'N/A',
                $exam->patient->FirstName . ' ' . $exam->patient->LastName,
                $exam->exam_type ?? 'N/A',
                $exam->imaging_room ? $exam->imaging_room->name : 'N/A',
                $exam->diagnosis ? $exam->diagnosis->diagnosis_text : 'N/A',
                $exam->patient->patient_type ?? 'N/A',
                $exam->technician ? $exam->technician->name : 'N/A',
                $exam->start_or_asap ? 'Start' : 'ASAP',
                $exam->location ? $exam->location->name : 'N/A',
                $exam->exam_type ?? 'N/A',
                $exam->status ?? 'N/A',
                $exam->ordered_by ? $exam->ordered_by->name : 'N/A',

            ];
            // Add sedations if available
            if ( !empty( $exam->sedations ) ) {
                foreach ( $exam->sedations as $sedation ) {
                    $row[] = $sedation->sedation_type . ' (' . $sedation->dose . ')';
                }
            } else {
                $row[] = 'N/A';
            }
            // Add nursing interventions if available
            if ( !empty( $exam->nursing_intervention ) ) {
                $nursingIntervention = $exam->nursing_intervention;
                $row[] = implode( ', ', [
                    'Child Life: ' . $nursingIntervention->child_life,
                    'PIV: ' . $nursingIntervention->piv,
                    'Comments: ' . $nursingIntervention->comments,
                ] );
            } else {
                $row[] = 'N/A';
            }
            // Write the row to the CSV file
            $row = array_map( function ( $value ) {
                return is_null( $value ) ? 'N/A' : $value;
            }, $row );
            // Ensure all values are strings for CSV compatibility
            $row = array_map( 'strval', $row );
            // Write the row to the CSV file
            $row = array_pad( $row, count( $headers ), 'N/A' ); // Ensure row has the same number of columns as headers
            $row = array_slice( $row, 0, count( $headers ) ); // Trim to match header count
            // Write the row to the CSV file
            $row = array_map( function ( $value ) {
                return is_null( $value ) ? 'N/A' : $value;
            }, $row );
            // Ensure all values are strings for CSV compatibility
                
            fputcsv($csvFile, $row);
        }

        fclose($csvFile);
        return $this->response;
    }
}
