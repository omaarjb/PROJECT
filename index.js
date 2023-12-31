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

if (currentTheme) {
  document.documentElement.setAttribute("data-theme", currentTheme);

  toggleSwitch.checked = currentTheme === "dark";
}

function switchTheme(e) {
  const theme = e.target.checked ? "dark" : "light";
  document.documentElement.setAttribute("data-theme", theme);

  localStorage.setItem("theme", theme);
}

toggleSwitch.addEventListener("change", switchTheme, false);
