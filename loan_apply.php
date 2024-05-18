<?php
include ("connection.php");

if (isset($_POST['apply'])) {
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
    $amount = isset($_POST['amount']) ? $_POST['amount'] : '';
    $loan_plan = isset($_POST['loan_plan']) ? $_POST['loan_plan'] : '';
    $loan_type = isset($_POST['loan_type']) ? $_POST['loan_type'] : '';

    // Check if any of the fields are empty
    if (empty($user_id) || empty($amount) || empty($loan_plan) || empty($loan_type)) {
        echo "<script>alert('Fill all the fields properly')</script>";
    } else {
        $loan_query = "INSERT INTO loan(user_id, loan_amount, loan_plan, loan_type) VALUES('$user_id', '$amount', '$loan_plan', '$loan_type')";
        $loan_data = mysqli_query($conn, $loan_query);
        if ($loan_data) {
            echo "<script>alert('Successfully Applied')</script>";
        } else {
            echo "Failed to apply: " . mysqli_error($conn);
        }
    }
}
?>