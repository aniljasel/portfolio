<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    // Define the file path
    $file = "contact_data.csv";

    // Check if the file exists, if not create it with headers
    if (!file_exists($file)) {
        $headers = ["Full Name", "Email", "Mobile", "Address"];
        $handle = fopen($file, "w");
        fputcsv($handle, $headers);
        fclose($handle);
    }

    // Append the new data
    $handle = fopen($file, "a");
    $data = [$fullname, $email, $mobile, $address];
    fputcsv($handle, $data);
    fclose($handle);

    // Success message
    echo "Data saved successfully!";
} else {
    echo "Invalid request.";
}
?>



