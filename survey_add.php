<html>
<head>
    <title>Survey Form</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("survey_connect.php");
 
if(isset($_POST['Submit'])) {    
    $survey_form = array (
                'timestamp' => date("D M j G:i:s"),
                'geo_coordinates' => $_POST['geo_coordinates'],
                'shop_name' => $_POST['shop_name'],
                'availability' => $_POST['availability'],
                'position' => $_POST['position'],
                'prominence' => $_POST['prominence'],
                'image' => $_POST['image']            );
        
    // checking empty fields
    $errorMessage = '';
    foreach ($survey_form as $key => $value) {
        if (empty($value)) {
            $errorMessage .= $key . ' field is empty<br />';
        }
    }
    
    if ($errorMessage) {
        // print error message & link to the previous page
        echo '<span style="color:red">'.$errorMessage.'</span>';
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";    
    } else {
        //insert data to database table/collection named 'users'
        $db->survey_form->insert($survey_form);
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>survey_form.php</a>";
    }
}
?>
</body>
</html>