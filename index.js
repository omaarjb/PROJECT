// Show password
const togglePassword = document.getElementById("togglePassword");
const password = document.getElementById("password");

togglePassword.addEventListener("click", function () {
  if (password.type == "password") {
    password.type = "text";
  } else password.type = "password";
});

/************************************************** DARK MODE **************************************************/
const toggleSwitch = document.querySelector(
  '.theme-switch input[type="checkbox"]'
);
const currentTheme = localStorage.getItem("theme");

// Set initial theme based on user's preference in localStorage
if (currentTheme) {
  document.documentElement.setAttribute("data-theme", currentTheme);
  // Update the toggle switch state
  toggleSwitch.checked = currentTheme === "dark";
}

function switchTheme(e) {
  const theme = e.target.checked ? "dark" : "light";
  document.documentElement.setAttribute("data-theme", theme);
  // Save the user's preference in localStorage
  localStorage.setItem("theme", theme);
}

toggleSwitch.addEventListener("change", switchTheme, false);
