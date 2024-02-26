<?php 

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $mysqli = require __DIR__ . "/database.php";

  $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));

  $result = $mysqli->query($sql);

  $user = $result->fetch_assoc();

  if ($user) {
      if (password_verify($_POST["password"], $user["password_hash"])) {
        die("Login successful!");
      }
  }

$is_invalid = true;

//note to self - stopped at 28:13

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="text-light">
  <div class="container mt-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-6">
      <div class="card square p-4">
      <h2 class="text-center">Login</h2>
        <div class="card-body">
          <form method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button class="btn btn-primary">Login</button>
            <?php if ($is_invalid): ?>
              <br><br><em class="text-danger h4">Invalid login information.</em>
            <?php endif; ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>