jQuery.validator.addMethod("lettersonly", function (value, element) {
  return this.optional(element) || /^[a-z\s]+$/i.test(value);
});


$.validator.addMethod("customemail",
  function (value, element) {
    return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
  },
  "Not valid,Please enter full email"
);

$(function () {
  $("form[name='registration']").validate({

    rules: {
      username: {
        required: true,
        lettersonly: true
      },
      mobile: {
        required: true,
        number: true,
        minlength: 10,
        maxlength: 10

      },
      email: {
        required: true,
        email: true,
        customemail: true
      },
      password: {
        required: true,
        minlength: 6
      },
      cpassword: {
        required: true,
        minlength: 6,
        equalTo: "#password"
      }
    },
    messages: {
      username: {
        required: "Please enter your firstname",
        lettersonly: "Please enter alphabets only."
      },
      mobile: {
        required: "Please enter your Mobile No.",
        number: "Please enter  Numbers only.",
        minlength: "Please enter  10 digit Number .",
        maxlength: "Please enter 10 digit Number."


      },

      email: {
        required: "please enter your email.",
        email: "Please enter a valid email id.",


      },
      password: {
        required: "Please provide a password.",
        minlength: "Your password must be at least 6 characters."
      },

      cpassword: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters.",
        equalTo: "password didn't match."
      }
    },

    submitHandler: function (form) {
      form.submit();
    }
  });
});