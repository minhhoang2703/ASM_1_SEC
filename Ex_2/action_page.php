<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptchaSecret = '6LczZSkqAAAAABCLLozOIzuT-gzFhBdkAEPOR6Ay';
    $recaptchaToken = $_POST['recaptcha_token'];

    // Verify the token
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaToken");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        die("reCAPTCHA verification failed. Please try again.");
    } else {
        // The reCAPTCHA was successfully validated
        // Handle form submission here
        echo "reCAPTCHA verification successful.";
    }
} else {
    echo "Invalid request method.";
}
?>