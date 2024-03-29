<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $aadhar = $_POST['aadhar'];
    $address = $_POST['address'];
    
    // Handle file upload
    $target_dir = "uploads/"; // Directory where you want to store the uploaded files
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
    
    // Open a file in append mode to store the form data
    $file = fopen("student_data.txt", "a");
    
    // Write the form data to the file
    fwrite($file, "Name: " . $name . "\n");
    fwrite($file, "Father's Name: " . $father_name . "\n");
    fwrite($file, "Email: " . $email . "\n");
    fwrite($file, "Phone: " . $phone . "\n");
    fwrite($file, "Aadhar Number: " . $aadhar . "\n");
    fwrite($file, "Address: " . $address . "\n");
    fwrite($file, "Photo Uploaded: " . $target_file . "\n\n");
    
    // Close the file
    fclose($file);
    
    // Redirect back to the form page with a success message
    header("Location: stu reg.html?status=success");
    exit;
} else {
    // If the form is not submitted, redirect back to the form page
    header("Location: stu reg.html");
    exit;
}
?>
