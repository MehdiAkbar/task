jQuery.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[a-z\s]+$/i.test(value);
  });
  
  $.validator.addMethod("customemail", 
      function(value) {
          return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
      }, 
      "Not valid,Please enter full email"
  );
  
  $(function () {
    $("form[name='login']").validate({
  
      rules: {
        
        email: {
          required: true,
          email: true,
          customemail:true
        },
        password: {
          required: true,
          minlength: 6
        },
        
      },
      messages: {
        
  
        email: {
          required: "please enter your email.",
          email: "Please enter a valid email id.",
          
  
        },
        password: {
          required: "Please provide a password.",
          minlength: "Your password must be at least 6 characters."
        },
  
        
      },
  
      submitHandler: function (form) {
        form.submit();
      }
    });
  });