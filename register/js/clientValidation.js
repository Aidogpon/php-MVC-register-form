document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  form.addEventListener("submit", function (event) {
    const email = form.querySelector('input[name="email"]').value;
    const username = form.querySelector('input[name="name"]').value;
    const password = form.querySelector('input[name="password"]').value;

    let isValid = true;
    let messages = [];

    if (!email.includes("@")) {
      isValid = false;
      messages.push("Your email must be in a valid format.");
    }

    if (username.length < 5) {
      isValid = false;
      messages.push("Your username must be at least 5 characters long.");
    }

    if (password.length < 8) {
      isValid = false;
      messages.push("Your password must be at least 8 characters long.");
    }

    if (!isValid) {
      event.preventDefault(); // Prevent form submission
      alert(messages.join("\n"));
    }
  });
});
