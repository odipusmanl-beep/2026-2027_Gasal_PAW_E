<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pemrosesan Form</title>
</head>
<body>

    <h3>Posted data:</h3>

    <?php
    foreach ($_POST as $key => $value) {
        if ($key == "password") {
            $value = "********";
        }

        if (is_array($value)) {
            $value = implode(", ", $value);
        }

        echo "(" . htmlspecialchars($key) . ") => (" .
             htmlspecialchars($value) . ")<br>";
    }
    ?>

</body>
</html>