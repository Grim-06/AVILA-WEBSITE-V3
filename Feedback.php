<!DOCTYPE html>
<html lang="en">
<?php
                require_once "database.php";

                if (isset($_POST["submit feedback"])) {
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $message = $_POST["message"];

                    $errors = array();

                    if (empty($name) || empty($email)  || empty($message)) {
                        array_push($errors, "All fields are required");
                    }
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        array_push($errors, "Email is not valid");
                    }

                    if (count($errors) > 0) {
                        foreach ($errors as $error) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    } else {
                        $sqlInsertInfo = "INSERT INTO contact_details_db (name, email, message) VALUES (?, ?, ?)";
                        $stmtInsertInfo = mysqli_stmt_init($conn);

                        if (mysqli_stmt_prepare($stmtInsertInfo, $sqlInsertInfo)) {
                            mysqli_stmt_bind_param($stmtInsertInfo, "ssss", $name, $email, $message);
                            mysqli_stmt_execute($stmtInsertInfo);
                            echo "<div class='alert alert-success success-alert w-50 mx-auto text-center'>Your message has been submitted successfully.</div>";

                            // Get the AccountID of the inserted user
                            $accountID = mysqli_insert_id($conn);
                        } else {
                            die("Error in preparing SQL statement to insert user account");
                        }
                    }
                }
            ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Feed.css">
    <title>Feedback Form</title>
</head>
<body>
     <div class="background-wrapper">
        <div class="container">
            <h2>Feedback Form</h2>
            <form id="feedbackForm" action="submit_feedback.php" method="POST">
				<div class="form-group">
                    <label for="email">Email:</label>
					<br>
                    <input type="email" id="email" name="email">
                </div>
				
                <div class="form-group">
                    <label for="name">Name:</label>
					<br>
                    <input type="text" id="name" name="name" required>
                </div>
				
                <div class="form-group">
                    <label for="message">Message:</label>
					<br>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <input type="submit" value="Submit Feedback">
            </form>
        </div>
    </div>
</body>
</html>
