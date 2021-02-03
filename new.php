<?php 

    // Include and initialize DB class
    require_once 'DB.class.php';
    $db = new DB();

    // Fetch the users data
    $users = $db->getRows('grade_sheet_tbl');
    $Connect = new mysqli("localhost","root","","qcu");

    if ($Connect -> connect_errno) {
        echo "Failed to connect to MySQL: " . $Connect -> connect_error;
        exit();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8" />

        <meta   
                name="viewport" 
                content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <meta   
                http-equiv="x-ua-compatible" 
                content="ie=edge" />

        <title>SECTION SBIT-3O - QCU</title>

        <link   
                rel="icon" 
                href="../../../img/qcu logo.png" 
                type="image/x-icon" />


        <link 
                rel="stylesheet" 
                href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />


        <link
                rel="stylesheet"
                href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>


        <link   
                rel="stylesheet" 
                href="../../../css/compiled.min.css" />

        <link 
                rel="stylesheet" 
                href="../../../css/addons/nav-bar.css" />

        <link 
                rel="stylesheet" 
                href="../../../css/addons/fonts.css" />

        <link rel="stylesheet" type="text/css" href="http://localhost/petshop/css/addons/datatables2.min.css">

        <style type="text/css">

            .navbar {
                background-color: #2c3e4e !important;
            }

            .bg-custom-primary {
                background-color: #2c3e4e !important;
            }

            .active-tab {
                background-color: #F93154;
                width: auto;
                color: white;
            }


            .dataTables_filter {
                display: none !important;
            }


        </style>

    </head>

<body>

<header>

        <div
            style="color: white !important;"
            id="sidenav-1"
            class="sidenav bg-custom-primary shadow-5-strong"
            role="navigation"
            data-accordion="true"
            data-mode="side"
            data-hidden="false"
            data-scroll-container="#scrollContainer"
            data-content="#content">
          
        <div class="mt-4">
            <div id="header-content" class="text-center">
                <img
                    src="../../../img/student/leo2x2.png"
                    alt="avatar"
                    class="rounded-circle img-fluid mb-3"
                    style="max-width: 150px;"/>
                <h4>
                    <span style="white-space: nowrap;">Leo Ignacio</span>
                </h4>
                <p>leo.a.ignacio@gmail.com</p>
            </div>
            <hr class="mb-0" />
        </div>

        <div id="scrollContainer">
            <ul class="sidenav-menu ">
                <li class="sidenav-item">
                    <a class="sidenav-link" href="../../"> <i class="fas fa-home pr-3"></i>Dashboard</a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link" href="../../class-list/"><i class="fas fa-clipboard-list pr-3"></i>Class List</a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link active-tab" href="../"><i class="fas fa-file-signature pr-3"></i>Grading Sheet</a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link" href="../../notes/"> <i class="fas fa-sticky-note pr-3"></i>Notes</a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link" href="../../grading-system/"> <i class="fas fa-cogs pr-3"></i>Grading System</a>
                </li>
            </ul>

            <hr class="m-0" />

            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="settings/" class="sidenav-link"> <i class="fas fa-cogs pr-3"></i>Settings</a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link"> <i class="fas fa-user pr-3"></i>Profile</a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link"> <i class="fas fa-shield-alt pr-3"></i>Privacy</a>
                </li>
                <li class="sidenav-item">
                    <a class="sidenav-link"> <i class="fas fa-user-astronaut pr-3"></i>Log out</a>
                </li>
            </ul>
        </div>

            <div class="text-center" style="height: 100px;">
                <hr class="mb-4 mt-0" />
                <p>qcu.edu.ph</p>
            </div>
        </div>

    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container-fluid">

                <a class="navbar-brand title-fonts" data-toggle="sidenav" data-target="#sidenav-1">
                    <img
                        src="../../../img/qcu logo.png"
                        class="img-fluid"
                        style="max-width: 60px;"
                    />
                </a>

                <!--
                <ul class="navbar-nav ml-auto d-flex flex-row">
                    <li class="nav-item">
                        <a class="navbar-brand" href="#">
                            <div class="mr-3" style="font-size: 15px; text-align: right; color: white;">Leo Ignacio <br><span style=" text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"> Team Leader - Product Development</span></div>
                          <img
                            src="../img/student/leo2x2.png"
                            height="50"
                            class="rounded-circle"
                            alt=""
                          />

                        </a>
                    </li>
                </ul>
            -->
        </div>
    </nav>

</header>

<main id="content" class="pt-2">
    <div class="container-fluid mdb-page-content page-intro bg-light py-5 mt-5">

        <h3>
            <i class="fas fa-user-friends"></i> Section <span style="color: blue;">BSIT-3O</span>
        </h3>
        <hr class="mb-3" />


        <div class="card pt-3 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div >
                            <form method="POST">
                                <select class="select select_class" name="set_grading" id="set_grading">
                                    
                            <?php
                                $set_grade = "SELECT * FROM grading_computation_tbl";
                                $result = $Connect->query($set_grade);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['grade_system_ID'] ?>"><?php echo $row['criteria_name'] ?></option>
                                <?php 
                                    }
                                }
                                ?>
                                </select>
                                <label class="form-label select-label">Select Grading System</label>
                        </div>
                    </div>


                    <div class="" id="show_data_grade" style="display: none;">
                        <input type="hidden" name="criteria1" id="tbCriteria1" class="typed" value="">
                        <div id="p_criteria_1"></div>
                        <input type="hidden" name="criteria2" id="tbCriteria2" class="typed" value="">
                        <input type="hidden" name="criteria3" id="tbCriteria3" class="typed" value="">
                        <input type="hidden" name="criteria4" id="tbCriteria4" class="typed" value="">
                        <input type="hidden" name="criteria5" id="tbCriteria5" class="typed" value="">
                        <input type="hidden" name="criteria6" id="tbCriteria6" class="typed" value="">
                        <input type="hidden" name="criteria7" id="tbCriteria7" class="typed" value="">
                    </div>

                    <div class="col-md mb-3">
                        <button type="submit" name="btn_set_grading" class="btn btn-primary" style="width: 12rem"><i class="fas fa-sync-alt pr-1"></i> SET</button>
                    </form>
                        
                    </div>
                    
                    <div class="col-md-3 mb-3">
                        SIA101 - Thursday 9:00AM-11:00AM (Lecture) / 1:00PM-4:00:PM (Laboratory)
                    </div>
                </div>
            </div>
        </div>


        <div class="">
            <div class="d-flex mb-3">
                <div class="me-auto w-100 p-2" ><h3 class="font-codebolds  font-monospace"><button class="btn btn-danger btn-sm" id="button-excel"> Download <i class="fas fa-download"></i></button></h3></div>
                    <div class="p-2">
                        <div class="form-outline ">
                            <input
                                type="text"
                                id="datatable-search-input"
                                class="form-control" />
                            <label class="form-label" for="datatable-search-input">Search</label>
                        </div>
                </div>
            </div>
        </div>

        <hr />

        <div style="border-top: 10px green;" class="card font-monospace">
            <div class="card-body">
                <div id="" class=" table-responsive-sm">
                    <table class="table" id="student_information_tbl" data-cols-width="20,50,15,15,15,15,10,55,20,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15">
                        <thead>
                            <tr data-height="50" >
                                <td style="text-align: center; display: none;"  data-a-wrap="true" colspan="26" data-a-h="center" data-a-v="middle">Quezon City University <br> San Bartolome | San Francisco | Batasan</td>
                            </tr>
                            <tr>
                                <th>Student Number</th>
                                <th>Name</th>
                                <th style="display: none;">Yr Lvl</th>
                                <th style="display: none;">Semester</th>
                                <th style="display: none;">SY</th>
                                <th style="display: none;">Subj Code</th>
                                <th style="display: none;">Unit</th>
                                <th style="display: none;">Schedule</th>
                                <th style="display: none;">Campus</th>
                                <th data-fill-color="2962ff" data-f-color="FFFFFFFF">Midterm</th>
                                <th style="display: none;">Quizzes</th>
                                <th style="display: none;">Activities</th>
                                <th style="display: none;">Report</th>
                                <th style="display: none;">Project</th>
                                <th style="display: none;">Assignment</th>
                                <th style="display: none;">Practical</th>
                                <th style="display: none;">Written</th>

                                <th data-fill-color="2962ff" data-f-color="FFFFFFFF">Final</th>
                                <th style="display: none;">Quizzes</th>
                                <th style="display: none;">Activities</th>
                                <th style="display: none;">Report</th>
                                <th style="display: none;">Project</th>
                                <th style="display: none;">Assignment</th>
                                <th style="display: none;">Practical</th>
                                <th style="display: none;">Written</th>
                                <th>Remark</th>

                                <th data-exclude="true">Action</th>
                            </tr>
                        </thead>
                        <tbody id="studentData">
                            <?php if(!empty($users)){ foreach($users as $row){ 
                                ?>

                                <tr>
                                    <td><?php echo $row['student_number'] ?></td>
                                    <td><?php echo $row['student_LName'] . ", " .  $row['student_FName'] . " " . $row['student_MName'] ?></td>
                                    <td style="display: none;"><?php echo $row['student_year_lvl'] ?></td>
                                    <td style="display: none;"><?php echo $row['student_semester'] ?></td>
                                    <td style="display: none;"><?php echo $row['student_school_year'] ?></td>
                                    <td style="display: none;"><?php echo $row['subject_code'] ?></td>
                                    <td style="display: none;" data-t="n"><?php echo $row['student_unit'] ?></td>
                                    <td style="display: none;"><?php echo $row['schedule'] ?></td>
                                    <td style="display: none;"><?php echo $row['campus'] ?></td>
                                    <td data-t="n"><?php echo $row['student_mid_grade'] ?></td>
                                    <td style="display: none;" data-t="n" data-a-h="center" data-a-v="middle"><?php echo $row['mid_criteria_1'] ?></td>
                                    <td style="display: none;" data-t="n" data-a-h="center" data-a-v="middle"><?php echo $row['mid_criteria_2'] ?></td>
                                    <td style="display: none;" data-t="n" data-a-h="center" data-a-v="middle"><?php echo $row['mid_criteria_3'] ?></td>
                                    <td style="display: none;" data-t="n" data-a-h="center" data-a-v="middle"><?php echo $row['mid_criteria_4'] ?></td>
                                    <td style="display: none;" data-t="n" data-a-h="center" data-a-v="middle"><?php echo $row['mid_criteria_5'] ?></td>
                                    <td style="display: none;" data-t="n" data-a-h="center" data-a-v="middle"><?php echo $row['mid_criteria_6'] ?></td>
                                    <td style="display: none;" data-t="n" data-a-h="center" data-a-v="middle"><?php echo $row['mid_criteria_7'] ?></td>

                                    <td data-t="n" id="final_grade"><?php echo $row['studnet_final_grade'] ?></td>
                                    <td style="display: none;" data-t="n" data-a-h="center" data-a-v="middle"><?php echo $row['final_criteria_1'] ?></td>
                                    <td style="display: none;" data-t="n" data-a-h="center" data-a-v="middle"><?php echo $row['final_criteria_2'] ?></td>
                                    <td style="display: none;" data-t="n" data-a-h="center" data-a-v="middle"><?php echo $row['final_criteria_3'] ?></td>
                                    <td style="display: none;" data-t="n" data-a-h="center" data-a-v="middle"><?php echo $row['final_criteria_4'] ?></td>
                                    <td style="display: none;" data-t="n" data-a-h="center" data-a-v="middle"><?php echo $row['final_criteria_5'] ?></td>
                                    <td style="display: none;" data-t="n" data-a-h="center" data-a-v="middle"><?php echo $row['final_criteria_6'] ?></td>
                                    <td style="display: none;" data-t="n" data-a-h="center" data-a-v="middle"><?php echo $row['final_criteria_7'] ?></td>
                                    <td><?php echo $row['student_final_remark'] ?></td>

                                    <td data-exclude="true">
                                        <a href="javascript:void(0);" class="btn btn-primary" rowID="<?php echo $row['student_number']; ?>" data-type="edit" data-toggle="modal" data-target="#MidtermGrades_Modal">Update</a>
                                        
                                    </td>
                                </tr>
                                <?php } }else{ ?>
                                <tr><td colspan="21">No user(s) found...</td></tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="toast fade mx-auto" id="success-update"  role="alert"  aria-live="assertive"  aria-atomic="true"  data-autohide="false" 
                  data-delay="2000"  data-position="top-right" data-append-to-body="true" data-stacking="true" data-width="350px" data-color="primary" > 
                <div class="toast-header text-white"> 
                <strong class="me-auto">Quezon City University</strong> <small style="margin-left: 200px;"></small> 
                <button type="button" class="btn-close btn-close-white" data-dismiss="toast" aria-label="Close"></button> 
                </div> <div class="toast-body text-white">Successfully Updated</div> </div>




                <div class="modal fade" id="MidtermGrades_Modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Student Grades</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" ></button>
                            </div>

                            <div class="modal-body">

                                <div class="statusMsg"></div>
                                <form role="form" id="form">
                                    <div class="row">
                                        <div class="col-md">
                                              <div class="form-outline mb-4">
                                                    <input type="text" name="student_number" id="student_number" class="form-control"/>
                                                    <label class="form-label" for="student_number">Student #</label>
                                              </div>
                                          </div>
                                      </div>

                                     <div class="row">
                                        <div class="col-md">
                                              <div class="form-outline mb-4">
                                                    <input type="text" id="student_Lname" class="form-control" />
                                                    <label class="form-label" for="student_name">Last Name</label>
                                              </div>
                                          </div>
                                          <div class="col-md">
                                              <div class="form-outline mb-4">
                                                    <input type="text" id="student_Fname" class="form-control" />
                                                    <label class="form-label" for="student_name">First Name</label>
                                              </div>
                                          </div>
                                          <div class="col-md">
                                              <div class="form-outline mb-4">
                                                    <input type="text" id="student_Mname" class="form-control" />
                                                    <label class="form-label" for="student_name">Middle Name</label>
                                              </div>
                                          </div>
                                     </div>

                                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a  class="nav-link active"
                                            id="tab-MidTerm"
                                            data-toggle="pill"
                                            href="#pills-MidTerm"
                                            role="tab"
                                            aria-controls="pills-MidTerm"
                                            aria-selected="true">MidTerm</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a  class="nav-link"
                                            id="tab-Finals"
                                            data-toggle="pill"
                                            href="#pills-Finals"
                                            role="tab"
                                            aria-controls="pills-Finals"
                                            aria-selected="false">Finals</a>
                                    </li>
                                </ul>
                                <!-- Pills navs -->

                                <!-- Pills content -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="pills-MidTerm" role="tabpanel" aria-labelledby="tab-MidTerm">
                                

                                            <div class="row">
                                                <div class="col-md">
                                                      <div class="form-outline mb-4">
                                                            <input type="text" name="midterm_criteria1" id="midterm_criteria1" class="form-control miterm_computation" />
                                                            <label class="form-label" for="midterm_criteria1">Quizes</label>
                                                      </div>
                                                  </div>
                                                  <div class="col-md">
                                                        <div class="form-outline mb-4">
                                                            <input type="text"  name="midterm_criteria2" id="midterm_criteria2" class="form-control miterm_computation" />
                                                            <label class="form-label" for="midterm_criteria2">Activities</label>
                                                      </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">
                                                        <div class="form-outline mb-4">
                                                            <input type="text" name="midterm_criteria3" id="midterm_criteria3" class="form-control miterm_computation" />
                                                            <label class="form-label" for="midterm_criteria3">Recitation</label>
                                                        </div>
                                                </div>
                                                <div class="col-md">
                                                        <div class="form-outline mb-4">
                                                            <input type="text" name="midterm_criteria4" id="midterm_criteria4" class="form-control miterm_computation" />
                                                            <label class="form-label" for="midterm_criteria4">Project</label>
                                                      </div>
                                                  </div>
                                             </div>

                                            <div class="row">
                                                  <div class="col-md">
                                                      <div class="form-outline mb-4">
                                                            <input type="text" name="midterm_criteria5" id="midterm_criteria5" class="form-control miterm_computation" />
                                                            <label class="form-label" for="midterm_criteria5">Assignment</label>
                                                      </div>
                                                  </div>
                                                  <div class="col-md">
                                                        <div class="form-outline mb-4">
                                                            <input type="text" name="midterm_criteria6" id="midterm_criteria6" class="form-control miterm_computation" />
                                                            <label class="form-label" for="midterm_criteria6">Practical Exam</label>
                                                      </div>
                                                  </div>
                                            </div>

                                            <div class="row">
                                                  <div class="col-md">
                                                      <div class="form-outline mb-4">
                                                            <input type="text" name="midterm_criteria7" id="midterm_criteria7" class="form-control miterm_computation" />
                                                            <label class="form-label" for="midterm_criteria7">Written Exam</label>
                                                      </div>
                                                  </div>
                                                  <div class="col-md">
                                                        <div class="form-outline mb-4">
                                                            <input type="text" name="midterm_criteria_total" id="midterm_criteria_total" class="form-control"/>
                                                            <label class="form-label" for="midterm_criteria_total">Total</label>
                                                      </div>
                                                  </div>
                                            </div>

                                    </div>
                                    
                                    <div class="tab-pane fade" id="pills-Finals" role="tabpanel" aria-labelledby="tab-Finals" >
                                       

                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-outline mb-4">
                                                            <input type="text" name="final_criteria1" id="final_criteria1" class="form-control final_computation" />
                                                            <label class="form-label" for="final_criteria1">Quizes</label>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-outline mb-4">
                                                            <input type="text"  name="final_criteria2" id="final_criteria2" class="form-control final_computation" />
                                                            <label class="form-label" for="final_criteria2">Activities</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-outline mb-4">
                                                            <input type="text" name="final_criteria3" id="final_criteria3" class="form-control final_computation" />
                                                            <label class="form-label" for="final_criteria3">Recitation</label>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                        <div class="form-outline mb-4">
                                                            <input type="text" name="final_criteria4" id="final_criteria4" class="form-control final_computation" />
                                                            <label class="form-label" for="final_criteria4">Project</label>
                                                      </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-outline mb-4">
                                                            <input type="text" name="final_criteria5" id="final_criteria5" class="form-control final_computation" />
                                                            <label class="form-label" for="final_criteria5">Assignment</label>
                                                      </div>
                                                </div>
                                                <div class="col-md">
                                                        <div class="form-outline mb-4">
                                                            <input type="text" name="final_criteria6" id="final_criteria6" class="form-control final_computation" />
                                                            <label class="form-label" for="final_criteria6">Practical Exam</label>
                                                      </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">
                                                      <div class="form-outline mb-4">
                                                            <input type="text" name="final_criteria7" id="final_criteria7" class="form-control final_computation" />
                                                            <label class="form-label" for="final_criteria7">Written Exam</label>
                                                      </div>
                                                </div>
                                                <div class="col-md">
                                                        <div class="form-outline mb-4">
                                                            <input type="text" name="final_criteria_total" id="final_criteria_total" class="form-control active" />
                                                            <label class="form-label" for="final_criteria_total">Total</label>
                                                      </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="student_numbers" id="student_number">

                                            <div class="form-outline mb-4">
                                                <input type="text" name="final_remarks" id="final_remarks" class="form-control">
                                                <label class="form-label" for="final_remarks">Remark</label>
                                            </div>
                                      
                                    </div>
                                </div>
                                            <!-- Pills content -->
                            

                             </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" name="finals_submit" id="ProfessorSubmit" class="btn btn-success">Submit</button>
                               
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>


    </div>

    <input type="hidden" name="section" id="try" value="SBIT-3O">

</main>

    <script     
            type="text/javascript" 
            src="../../../js/jquery.min.js">
    </script>

    <script 
            type="text/javascript" 
            src="../../../js/compiled.min.js">
    </script>

    <script 
            type="text/javascript" 
            src="../../../plugins/all.min.js">
    </script>

    <script 
            type="text/javascript" 
            src="../../../dist/tableToExcel.js">   
    </script>

    <script 
            type="text/javascript" 
            src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js">
    </script>

    <script 
            type="text/javascript" 
            src="../../../js/addons/cookie.js">
    </script>

    <script 
            type="text/javascript" 
            src="../../../js/addons/inputStore.jquery.js">            
    </script>

    <!-- hidden data -->
    <?php
    if (isset($_POST['btn_set_grading'])) {
        $get_grading = $_POST['set_grading'];
        $grade = "SELECT * FROM grading_computation_tbl WHERE grade_system_ID ='$get_grading'";
        $result = $Connect->query($grade);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
    ?>
    <input type="hidden" name="criteria1" id="tbCriteria1" class="typed" value="<?php echo $row['criteria_1'] ?>">
    <input type="hidden" name="criteria2" id="tbCriteria2" class="typed" value="<?php echo $row['criteria_2'] ?>">
    <input type="hidden" name="criteria3" id="tbCriteria3" class="typed" value="<?php echo $row['criteria_3'] ?>">
    <input type="hidden" name="criteria4" id="tbCriteria4" class="typed" value="<?php echo $row['criteria_4'] ?>">
    <input type="hidden" name="criteria5" id="tbCriteria5" class="typed" value="<?php echo $row['criteria_5'] ?>">
    <input type="hidden" name="criteria6" id="tbCriteria6" class="typed" value="<?php echo $row['criteria_6'] ?>">
    <input type="hidden" name="criteria7" id="tbCriteria7" class="typed" value="<?php echo $row['criteria_7'] ?>">
    <?php 
            }
        }
    //echo "<script>$('#GradingSystem').modal('show');</script>";
    }
    ?>
    <!-- end of hidden data -->

    <script type="text/javascript">


    var section = $('#try').val();
    let button = document.querySelector("#button-excel");

    button.addEventListener("click", e => {
       let table = document.querySelector("#student_information_tbl");
       
    TableToExcel.convert(document.getElementById("student_information_tbl"), {
      name: section + ".xlsx",
      sheet: {
        name: section
      }
    });

    });



    // Update the users data list
    function getUsers(){
        $.ajax({
            type: 'POST',
            url: 'userAction.php',
            data: 'action_type=view',
            success:function(html){
                $('#studentData').html(html);
            }
        });
    }

    // Send CRUD requests to the server-side script
    function userAction(type, student_number){
        student_number = (typeof student_number == "undefined")?'':student_number;
        var studentData = '', frmElement = '';
        if(type == 'add'){
            frmElement = $("#MidtermGrades_Modal");
            studentData = frmElement.find('form').serialize()+'&action_type='+type+'&student_number='+student_number;
        }else if (type == 'edit'){
            frmElement = $("#MidtermGrades_Modal");
            studentData = frmElement.find('form').serialize()+'&action_type='+type;
        }else{
            frmElement = $(".row");
            studentData = 'action_type='+type+'&student_number='+student_number;
        }
        frmElement.find('.statusMsg').html('');
        $.ajax({
            type: 'POST',
            url: 'userAction.php',
            dataType: 'JSON',
            data: studentData,
            beforeSend: function(){
                
            },
            success:function(resp){
                frmElement.find('.statusMsg').html(resp.msg);
                if(resp.status == 1){
                    if(type == 'add'){
                        frmElement.find('form')[0].reset();
                    }
                    getUsers();
                }
                frmElement.find('form').css("opacity", "");
            }
        });
    }

    //
    // Fill the student grade data in the edit form
    function editUser(student_number){
        $.ajax({
            type: 'POST',
            url: 'userAction.php',
            dataType: 'JSON',
            data: 'action_type=data&student_number='+student_number,
            success:function(data){
                $('#student_number').val(data.student_number);
                $('#student_Lname').val(data.student_LName);
                $('#student_Fname').val(data.student_FName);
                $('#student_Mname').val(data.student_MName);
                $('#midterm_criteria1').val(data.mid_criteria_1);
                $('#midterm_criteria2').val(data.mid_criteria_2);
                $('#midterm_criteria3').val(data.mid_criteria_3);
                $('#midterm_criteria4').val(data.mid_criteria_4);
                $('#midterm_criteria5').val(data.mid_criteria_5);
                $('#midterm_criteria6').val(data.mid_criteria_6);
                $('#midterm_criteria7').val(data.mid_criteria_7);
                $('#midterm_criteria_total').val(data.student_mid_grade);
                $('#final_criteria1').val(data.final_criteria_1);
                $('#final_criteria2').val(data.final_criteria_2);
                $('#final_criteria3').val(data.final_criteria_3);
                $('#final_criteria4').val(data.final_criteria_4);
                $('#final_criteria5').val(data.final_criteria_5);
                $('#final_criteria6').val(data.final_criteria_6);
                $('#final_criteria7').val(data.final_criteria_7);
                $('#final_criteria_total').val(data.studnet_final_grade);
                $('#final_remarks').val(data.student_final_remark);
            }
        });
    }

    // Actions on modal show and hidden events
    $(function(){
        $('#MidtermGrades_Modal').on('show.bs.modal', function(e){
            var type = $(e.relatedTarget).attr('data-type');
            var userFunc = "userAction('add');";
            if(type == 'edit'){
                userFunc = "userAction('edit');";
                var rowId = $(e.relatedTarget).attr('rowID');
                editUser(rowId);
            }
            $('#ProfessorSubmit').attr("onclick", userFunc);
        });
        
        $('#MidtermGrades_Modal').on('hidden.bs.modal', function(){
            $('#ProfessorSubmit').attr("onclick", "");
            $(this).find('form')[0].reset();
            $(this).find('.statusMsg').html('');
        });
    });

    //

    $(document).ready(function(){  
        // code to get all records from table via select box
        $("#set_grading").change(function() {    
            var grade_system_ID = $(this).find(":selected").val();
            var dataString = 'grade_system_ID='+ grade_system_ID;    
            $.ajax({
                url: 'load_data_set.php',
                dataType: "json",
                data: dataString,  
                cache: false,
                success: function(gradeSetData) {
                   if(gradeSetData) {
                        $('#tbCriteria1').val(gradeSetData.criteria_1);
                        $('#tbCriteria2').val(gradeSetData.criteria_2);
                        $('#tbCriteria3').val(gradeSetData.criteria_3);
                        $('#tbCriteria4').val(gradeSetData.criteria_4);
                        $('#tbCriteria5').val(gradeSetData.criteria_5);
                        $('#tbCriteria6').val(gradeSetData.criteria_6);
                        $('#tbCriteria7').val(gradeSetData.criteria_7);
                    }     
                } 
            });
        }) 
    });

    //

    // Cookie
    //checks if the cookie has been set

    if($.cookie('remember_select') != null) {
        // set the option to selected that corresponds to what the cookie is set to
        $('.select_class option[value="' + $.cookie('remember_select') + '"]').attr('selected', 'selected');
    }
    // when a new option is selected this is triggered
    $('.select_class').change(function() {
        // new cookie is set when the option is changed
        $.cookie('remember_select', $('.select_class option:selected').val(), { expires: 90, path: '/'});
    });


    if ($.cookie('remember_type') != null) {

        $('.typed input[value="' + $.cookie('remember_type') + '"]').class('active');

    }

    $('.typed').change(function() {
        
        $('.remember_type', $('.typed value:active').val(), { expires: 90, path: '/'});
    });
    // end of cookie


    // Computation of midterm grade
    $('.form-outline').on('input','.miterm_computation', function(){
        var grade01 = $('#midterm_criteria1').val() * $('#tbCriteria1').val();
        var grade02 = $('#midterm_criteria2').val() * $('#tbCriteria2').val();
        var grade03 = $('#midterm_criteria3').val() * $('#tbCriteria3').val();
        var grade04 = $('#midterm_criteria4').val() * $('#tbCriteria4').val();
        var grade05 = $('#midterm_criteria5').val() * $('#tbCriteria5').val();
        var grade06 = $('#midterm_criteria6').val() * $('#tbCriteria6').val();
        var grade07 = $('#midterm_criteria7').val() * $('#tbCriteria7').val();
        var total = grade01 + grade02 + grade03 + grade04 + grade05 + grade06 + grade07;
        var setTotal = total.toFixed(0);
        $('#midterm_criteria_total').val(setTotal);
    });
    // end of Computation of midterm grade

    // Computation of final grade
    $('.form-outline').on('input','.final_computation', function(){
        var grade01 = $('#final_criteria1').val() * $('#tbCriteria1').val();
        var grade02 = $('#final_criteria2').val() * $('#tbCriteria2').val();
        var grade03 = $('#final_criteria3').val() * $('#tbCriteria3').val();
        var grade04 = $('#final_criteria4').val() * $('#tbCriteria4').val();
        var grade05 = $('#final_criteria5').val() * $('#tbCriteria5').val();
        var grade06 = $('#final_criteria6').val() * $('#tbCriteria6').val();
        var grade07 = $('#final_criteria7').val() * $('#tbCriteria7').val();
        var total = grade01 + grade02 + grade03 + grade04 + grade05 + grade06 + grade07;
        var setTotal = total.toFixed(0);
        $('#final_criteria_total').val(setTotal);


        let final_grade = $('#final_criteria_total').val();

        const autoSetRemarks = (final_grade >= 75) ? "Passed" : "Failed";

        $('#final_remarks').val(autoSetRemarks); 
        $('#select_final_remarks').val(autoSetRemarks);

    });
    // end of Computation of final grade

    //



    // Datatables & Search
    $(document).ready(function() {
    $('#student_information_tbl').DataTable( {
        
        "bInfo": false,
        "scrollY": "500px",
        "scrollCollapse": true,
        "paging": false,
        "aaSorting": [[0,'desc']],
        "autoWidth": true,
            responsive: true
        });
    var search = $('#student_information_tbl').DataTable();
    $('#datatable-search-input').on('keyup change', function () {
        search.search(this.value).draw();
        });
    });
    // end of Datatables & Search


    // Side Navigation Bar
    const sidenav = document.getElementById('sidenav-1');
    const instance = mdb.Sidenav.getInstance(sidenav);
    let innerWidth = null;
    const setMode = (e) => {
    if (window.innerWidth === innerWidth) {
        return;
    }
    innerWidth = window.innerWidth;
    if (window.innerWidth < 1400) {
        instance.changeMode('over');
        instance.hide();
    } else {
        instance.changeMode('side');
        instance.show();
        }
    };
    setMode();
    window.addEventListener('resize', setMode);
    // End of Side Navigation Bar

    </script>
    
</body>
</html>