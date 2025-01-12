<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Merged Form Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" type="text/javascript"></script>
  </head>
  <body> 
    <div class="form-container">
    <div class="outer-logo">Be-Techy</div>

<div class="form-container">
      <form id="mergedForm" action="submit.html">
        <!-- Logo -->
        <div class="logo-container">
          <img src="logo.png" alt="Logo" class="logo"> <!-- Make sure to replace "logo.png" with your actual logo file -->
        </div>
        
        <!-- <h2>Sign Up</h2> -->

        <!-- Name Field -->
        <div class="form-group">
          <label for="nameInput" class="form-label-decorative">Full Name</label>
          <input type="text" class="form-control" id="nameInput" placeholder="Enter your full name" maxlength="30" onclick="resetBtn()">
        </div>

        <!-- Email Field -->
        <div class="form-group">
          <label for="emailInput" class="form-label-decorative">Email Address</label>
          <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="Enter email" onclick="resetBtn()">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <!-- Password Field with Eye Icon -->
        <div class="form-group password-container">
          <label for="passwordInput" class="form-label-decorative">Password</label>
          <input type="password" class="form-control" id="passwordInput" placeholder="Password" onclick="resetBtn()" minlength="8">
          <span id="togglePassword" class="eye-icon" onclick="togglePasswordVisibility()">👁️</span>
        </div>


        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="agreementCheck" onclick="resetBtn()onclick="toggleSubmitButton()">
          <label class="form-check-label" for="agreementCheck">I agree to the <a href="#" class="terms-link">terms and policies</a></label>
        </div>

        <!-- Checkbox 
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="agreementCheck" onclick="resetBtn()">
          <label class="form-check-label" for="agreementCheck">I agree to the <a href="#" class="terms-link">terms and policies</a></label>
        </div> 
        -->

        <!-- Submit Button -->
        <button type="submit" id="submit" class="btn btn-primary" onmouseover="handleMouseOver()">Submit</button>
      </form>
    </div>
  </body>
</html>
