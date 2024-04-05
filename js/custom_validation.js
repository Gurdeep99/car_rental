
  $(document).ready(function() {
    // Validate the form using jQuery Validation Plugin
    $("#job_form").validate({
      rules: {
        name: "required",
        email: {
          required: true,
          email: true
        },
        license: "required",
        message: "required"
      },
      messages: {
        name: "Please enter your full name",
        email: "Please enter a valid email address",
        license: "Please enter your license number",
        message: "Please enter a message"
      },
      submitHandler: function(form) {
        // Serialize form data
        var formData = $(form).serialize();

        // Submit the form via AJAX
        $.ajax({
          type: "POST",
          url: "assets/job.php",
          data: formData,
          success: function(response) {
            // Check if the response contains 'success'
            if (response.trim() == 'success') {
              // Display success message
              $("#job_form").html("<div class='form-group'><div class='alert alert-success' role='alert'>Your application has been submitted successfully.</div></div>");
            } else {
              // Display error message
              console.log(response);
            }
          },
          error: function(xhr, status, error) {
            // Display error message
            console.log(xhr.responseText);
          }
        });
      }
    });
  });