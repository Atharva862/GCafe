// validation.js

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    
    form.addEventListener("submit", function (event) {
      // Validate Full Name
      const fullName = document.getElementById("fullName").value.trim();
      if (fullName.length > 20) {
        alert("Full name must be less than or equal to 20 characters.");
        event.preventDefault(); // Prevent form submission
        return false;
      }
  
      // Validate Email
      const email = document.getElementById("email").value.trim();
      if (email.length > 20) {
        alert("Email must be less than or equal to 20 characters.");
        event.preventDefault(); // Prevent form submission
        return false;
      }
  
      // If all validations pass, allow form submission
      return true;
    });
  });
  