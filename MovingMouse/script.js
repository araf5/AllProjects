var buttonState = 0;

function handleMouseOver() {
  const name = document.getElementById("nameInput").value;
  const email = document.getElementById("emailInput").value;
  const password = document.getElementById("passwordInput").value;
  const agreementChecked = document.getElementById("agreementCheck").checked;
  const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (
    name === "" ||
    !email.match(emailRegex) ||
    password === "" ||
    !agreementChecked
  ) {
    moveButton();
    return false;
  } else {
    document.getElementById("submit").style.cursor = "pointer";
    return true;
  }
}

function moveButton() {
  const button = document.getElementById("submit");

  const xMovement = Math.floor(Math.random() * 200 - 100);
  const yMovement = Math.floor(Math.random() * 200 - 100);
  const rotateDegree = Math.floor(Math.random() * 360);

  button.style.transform = `translate(${xMovement}px, ${yMovement}px) rotate(${rotateDegree}deg)`;
}

function resetBtn() {
  const button = document.getElementById("submit");
  button.style.transform = "translate(0, 0) rotate(0deg)";
}

function togglePasswordVisibility() {
  const passwordInput = document.getElementById("passwordInput");
  const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
  passwordInput.setAttribute("type", type);
}

function toggleSubmitButton() {
    const checkbox = document.getElementById("agreementCheck");
    const submitButton = document.getElementById("submit");
    submitButton.disabled = !checkbox.checked;
}
