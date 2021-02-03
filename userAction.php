<?php
// Include and initialize DB class
require_once 'DB.class.php';
$db = new DB();

// Database table name
$tblName = 'grade_sheet_tbl ';

// If the form is submitted
if(!empty($_POST['action_type'])){
    if($_POST['action_type'] == 'data'){
        // Fetch data based on row ID
        $conditions['where'] = array('student_number' => $_POST['student_number']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName, $conditions);
        
        // Return data as JSON format
        echo json_encode($user);
    }elseif($_POST['action_type'] == 'view'){
        // Fetch all records
        $users = $db->getRows($tblName);
        
        // Render data as HTML format
        if(!empty($users)){
            foreach($users as $row){
                echo '<tr>';
                echo '<td>'.$row['student_number'].'</td>';
                echo '<td>'.$row['student_LName']. ', ' . $row['student_FName'] . ' ' . $row['student_MName'] . '</td>';
                echo '<td style="display:none;">'.$row['student_year_lvl'].'</td>';
                echo '<td style="display:none;">'.$row['student_semester'].'</td>';
                echo '<td style="display:none;">'.$row['student_school_year'].'</td>';
                echo '<td style="display:none;">'.$row['subject_code'].'</td>';
                echo '<td style="display:none;">'.$row['student_unit'].'</td>';
                echo '<td style="display:none;">'.$row['schedule'].'</td>';
                echo '<td style="display:none;">'.$row['campus'].'</td>';
                echo '<td>'.$row['student_mid_grade'].'</td>';
                echo '<td style="display:none;">'.$row['mid_criteria_1'].'</td>';
                echo '<td style="display:none;">'.$row['mid_criteria_2'].'</td>';
                echo '<td style="display:none;">'.$row['mid_criteria_3'].'</td>';
                echo '<td style="display:none;">'.$row['mid_criteria_4'].'</td>';
                echo '<td style="display:none;">'.$row['mid_criteria_5'].'</td>';
                echo '<td style="display:none;">'.$row['mid_criteria_6'].'</td>';
                echo '<td style="display:none;">'.$row['mid_criteria_7'].'</td>';
                echo '<td>'.$row['studnet_final_grade'].'</td>';
                echo '<td style="display:none;">'.$row['final_criteria_1'].'</td>';
                echo '<td style="display:none;">'.$row['final_criteria_2'].'</td>';
                echo '<td style="display:none;">'.$row['final_criteria_3'].'</td>';
                echo '<td style="display:none;">'.$row['final_criteria_4'].'</td>';
                echo '<td style="display:none;">'.$row['final_criteria_5'].'</td>';
                echo '<td style="display:none;">'.$row['final_criteria_6'].'</td>';
                echo '<td style="display:none;">'.$row['final_criteria_7'].'</td>';
                echo '<td>'.$row['student_final_remark'].'</td>';
                echo '<td><a href="javascript:void(0);" class="btn btn-primary" rowID="'.$row['student_number'].'" data-type="edit" data-toggle="modal" data-target="#MidtermGrades_Modal">Update</a>
                </td>';
                echo '</tr>';
            }
        }else{
            echo '<tr><td colspan="5">No user(s) found...</td></tr>';
        }
    }elseif($_POST['action_type'] == 'edit'){
        $msg = '';
        $status = $verr = 0;
        
        if(!empty($_POST['student_number'])){

            // Get input

            $student_number = $_POST['student_number'];
            $criteria1_mid = $_POST['midterm_criteria1'];
            $criteria2_mid = $_POST['midterm_criteria2'];
            $criteria3_mid = $_POST['midterm_criteria3'];
            $criteria4_mid = $_POST['midterm_criteria4'];
            $criteria5_mid = $_POST['midterm_criteria5'];
            $criteria6_mid = $_POST['midterm_criteria6'];
            $criteria7_mid = $_POST['midterm_criteria7'];
            $criteria_mid_total = $_POST['midterm_criteria_total'];

            $criteria1_final = $_POST['final_criteria1'];
            $criteria2_final = $_POST['final_criteria2'];
            $criteria3_final = $_POST['final_criteria3'];
            $criteria4_final = $_POST['final_criteria4'];
            $criteria5_final = $_POST['final_criteria5'];
            $criteria6_final = $_POST['final_criteria6'];
            $criteria7_final = $_POST['final_criteria7'];
            $criteria_final_grade = $_POST['final_criteria_total'];

            $final_remark = $_POST['final_remarks'];
            
            
            if($verr == 0){
                // Update data in the database
                $studentData = array(
                    'student_mid_grade' => $criteria_mid_total,
                    'mid_criteria_1' => $criteria1_mid,
                    'mid_criteria_2' => $criteria2_mid,
                    'mid_criteria_3' => $criteria3_mid,
                    'mid_criteria_4' => $criteria4_mid,
                    'mid_criteria_5' => $criteria5_mid,
                    'mid_criteria_6' => $criteria6_mid,
                    'mid_criteria_7' => $criteria7_mid,
                    'final_criteria_1' => $criteria1_final,
                    'final_criteria_2' => $criteria2_final,
                    'final_criteria_3' => $criteria3_final,
                    'final_criteria_4' => $criteria4_final,
                    'final_criteria_5' => $criteria5_final,
                    'final_criteria_6' => $criteria6_final,
                    'final_criteria_7' => $criteria7_final,
                    'studnet_final_grade' => $criteria_final_grade,
                    'student_final_remark' => $final_remark
                );
                $condition = array('student_number' => $_POST['student_number']);
                $update = $db->update($tblName, $studentData, $condition);
                
                if($update){
                    $status = 1;
                    $msg .= 'Student Grade has been updated successfully.';
                }else{
                    $msg .= 'Some problem occurred, please try again.';
                }
            }
        }else{
            $msg .= 'Some problem occurred, please try again.';
        }
        
        // Return response as JSON format
        $alertType = ($status == 1)?'alert-success':'alert-danger';
        $statusMsg = '<p class="alert '.$alertType.'">'.$msg.'</p>';
        $response = array(
            'status' => $status,
            'msg' => $statusMsg
        );
        echo json_encode($response);
    }
}

exit;
?>