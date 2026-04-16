<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = isset($_POST["email"]) ? $_POST["email"] : "";

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $file = fopen("emails.txt", "a");

        if ($file) {
            fwrite($file, date("Y-m-d H:i:s") . " | " . $email . "\n");
            fclose($file);
            echo "OK";
        } else {
            echo "Blad zapisu pliku";
        }

    } else {
        echo "Niepoprawny email";
    }

} else {
    echo "Brak danych";
}
?>
