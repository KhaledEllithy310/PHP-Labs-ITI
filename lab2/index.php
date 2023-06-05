<?php
include 'validate.php'
?>
<!-- customer_form.php -->
<!DOCTYPE html>
<html>

<head>
  <title>User Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1 class="my-4">User Form</h1>
    <form method="post" action="">
      <div class="form-group">
        <label for="firstName">First Name:</label>
        <input type="text" class="form-control" id="firstName" name="firstName">
      </div>
      <?= "<p style='color:red'> $firstNameErr " ?? '' . " </p>" ?>
      <div class="form-group">
        <label for="lastName">Last Name:</label>
        <input type="text" class="form-control" id="lastName" name="lastName">
      </div>
      <?= "<p style='color:red'> $lastNameErr " ?? ''  . " </p>" ?>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <?= "<p style='color:red'> $emailErr" ?? '' . " </p>" ?>
      <div class="form-group">
        <label for="gender">Gender:</label>
        <select class="form-control" id="gender" name="gender">
          <option value="">Please select</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      <?= "<p style='color:red'> $genderErr " ?? ''  . "</p>" ?>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>