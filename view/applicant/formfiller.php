<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
<?php
include '../../include/php/navbar.php';
if (isset($_GET['form_biodata'])) {
    $form_number = $_GET['form_biodata'];
    $form = 'Applicant Bio-data Form';
    //Select Available Forms
    $tblName = 'application_tbl';
    $conditions = array(
        'return_type' => 'single',
        'where' => array(
            'form_number' =>  $form_number,
        )
    );
    $form_view = $model->getRows($tblName, $conditions);
    
    $include = "../../include/form/biodata.php";
}
if (isset($_GET['form_academic'])) {
    $form_number = $_GET['form_academic'];
    $form = 'Applicant Academic Form';
    //Select Available Forms
    $parent_ref = $_SESSION['uniqueid'];
    $tblName = 'application_tbl';
    $conditions = array(
        'return_type' => 'single',
        'where' => array(
            'form_number' =>  $form_number,
        )
    );
    $form_view = $model->getRows($tblName, $conditions);
    //Select Available State of Origin
    $tblName = 'location';
    $location = $model->getRows($tblName);
    $include = "../../include/form/academic.php";
}
if (isset($_GET['form_contact'])) {
    $form_number = $_GET['form_contact'];
    $form = 'Applicant Contact Information Form';
    //Select Available Forms
    $parent_ref = $_SESSION['uniqueid'];
    //Notes Counter
    $tblName = 'application_tbl';
    $conditions = array(
        'join' => 'tbl_users on application_tbl.parent_ref = tbl_users.user_phone',
        'return_type' => 'single',
        'where' => array(
            'application_tbl.form_number' =>  $form_number,
        )
    );
    $form_view = $model->getRows($tblName, $conditions);
    $include = "../../include/form/contact.php";
}
if (isset($_GET['form_health'])) {
    $form_number = $_GET['form_health'];
    $form = 'Applicant Health History Form';
    //Select Available Forms
    $parent_ref = $_SESSION['uniqueid'];
    //Notes Counter
    $tblName = 'application_tbl';
    $conditions = array(
        'join' => 'tbl_users on application_tbl.parent_ref = tbl_users.user_phone',
        'return_type' => 'single',
        'where' => array(
            'application_tbl.form_number' =>  $form_number,
        )
    );
    $form_view = $model->getRows($tblName, $conditions);
    //Select Available State of Origin
    $tblName = 'location';
    $location = $model->getRows($tblName);
    $include = "../../include/form/health.php";
}
if (isset($_GET['form_attest'])) {
    $form_number = $_GET['form_attest'];
    $form = 'Applicant Attestation Form';
    //Select Available Forms
    $parent_ref = $_SESSION['uniqueid'];
    //Notes Counter
    $tblName = 'application_tbl';
    $conditions = array(
        'join' => 'tbl_users on application_tbl.parent_ref = tbl_users.user_phone',
        'return_type' => 'single',
        'where' => array(
            'application_tbl.form_number' =>  $form_number,
        )
    );
    $form_view = $model->getRows($tblName, $conditions);
    //Select Available State of Origin
    $tblName = 'location';
    $location = $model->getRows($tblName);
    $include = "../../include/form/attestation.php";
}

if (isset($_GET['payment'])) {
    $form_number = $_GET['payment'];
    $form = 'Payment Record Form';
    //Select Available Forms
    $tblName = 'application_tbl';
    $conditions = array(
        'return_type' => 'single',
        'where' => array(
            'form_number' =>  $form_number,
        )
    );
    $form_view = $model->getRows($tblName, $conditions);
    $include = "../../include/form/payment.php";
}
if (isset($_GET['form_examschedule'])) {
    $form_number = $_GET['form_examschedule'];
    $form = 'Entrance Exam Scheduling Form';
    //Select Available Forms
    $tblName = 'application_tbl';
    $conditions = array(
        'return_type' => 'single',
        'where' => array(
            'form_number' =>  $form_number,
        )
    );
    $form_view = $model->getRows($tblName, $conditions);
    $include = "../../include/form/schedule.php";
}
if (isset($_GET['profile'])) {
    $profile = $_GET['profile'];
    $form = 'Parent Profile Update';
    $include = "../../include/form/profile.php";
}

?>
<div class="content-body">
    <div class="container-fluid">
        <!-- Create New Form -->
        <div class="form-head d-flex flex-wrap mb-sm-4 mb-3 align-items-center">
            <div class="mr-auto  d-lg-block mb-3">
                <a href="myform.php">
                    <h2 class="text-black mb-0 font-w700"> Form :: <?php echo $form ?></h2>
                </a>
            </div>
        </div>
        <div class="row page-titles mx-0">
            <?php
            if (isset($_SESSION['msg'])) {
                printf('<b>%s</b>', $_SESSION['msg']);
                unset($_SESSION['msg']);
            }
            ?>
        </div>
        <!-- row -->
        <?php include $include; ?>
    </div>
</div>
<?php
include '../../include/php/portalfoot.php';
?>