$('.login_button').on('click',function(){

    $('#registerModal').modal('hide');
    $('#loginModal').modal('show');
});

$('.register_button').on('click',function(){

     $('#loginModal').modal('hide');
     $('#registerModal').modal('show');
});

function recaptchaDataCallbackRegister(response){
    $('#hiddenRecaptchaRegister').val(response);
    $('#hiddenRecaptchaRegisterError').html('');
  }
  
  function recaptchaExpireCallbackRegister(){
   $('#hiddenRecaptchaRegister').val('');
  }
  
  
  function recaptchaDataCallbackLogin(response){
    $('#hiddenRecaptchaLogin').val(response);
    $('#hiddenRecaptchaLoginError').html('');
  }
  
  function recaptchaExpireCallbackLogin(){
   $('#hiddenRecaptchaLogin').val('');
  }


$('#regitration_form').validate({
//    ignore:'.ignore',
//   errorClass:'invalid',
//   validClass:'success',
//   rules:{
//    first_name:{
//      required:true,
//      minlength:2,
//      maxlength:100
//    },
//    last_name:{
//      required:true,
//      minlength:2,
//      maxlength:100
//    },
//    email:{
//      required:true,
//      email:true,
//       remote: {
//           url: baseUrl+"/auth/check_email_unique",
//           type: "post",
//           data: {
//             email: function() {
//               return $( "#email" ).val();
//             },
//             '_token':$('meta[name="csrf-token"]').attr('content')
//           }
//       }
      
//    },
//    password:{
//      required:true,
//      minlength:6,
//      maxlength:10
//    },
//    confirm_password:{
//      required:true,
//      equalTo:'#password'
//    },
//     terms:"required",
//     grecaptcha:"required"

//   },
//  messages: {
//     first_name: {
//       required:"Please enter first name"
//     },
//     last_name: {
//       required:"Please enter last name"
//     },
//     email: {
//       required: "Please enter your email address",
//       email: "Enter valid email address",
//       remote:"User already exsixt. Try with different email"
//     },
//     password:{
//       required:"Enter your password"
//     },
//     confirm_password:{
//       required:"Re enter your password"
//     },
//     terms:"Please accept terms and conditions",
//     grecaptcha:"Captcha field is required"
//  },
//  errorPlacement:function(error,element){
//       if(element.attr('name')=='terms'){
//         error.appendTo($('#terms_error'));
//       }
//       else if(element.attr('name')=='grecaptcha'){
//           error.appendTo($('#hiddenRecaptchaRegisterError'));
//       }
//       else{
//         error.insertAfter(element);
//       }
//  },
   submitHandler:function(form){
      
      $.LoadingOverlay("show");
      form.submit();
   }

});

// $('#login_form').validate({
//   ignore:'.ignore',
//   errorClass:'invalid',
//   validClass:'success',
//   rules:{

//    email:{
//       required:true,
//       email:true,  
//    },
//    password:{
//       required:true,
//       minlength:6,
//       maxlength:100
//    },
//    grecaptcha:"required"

//   },
//    messages: {

//       email: {
//         required: "Email is required",
//         email: "Your email address must be in the format of name@domain.com",

//       },
//       password:{
//           required:"Enter your password"
//       },
//       grecaptcha:"Captcha field is required"
//    },
//    errorPlacement:function(error,element){
//       if(element.attr('name')=='grecaptcha'){
//           error.appendTo($('#hiddenRecaptchaLoginError'));
//       }
//       else{
//           error.insertAfter(element);
//       }
//    },
//    submitHandler:function(form){
      
//       $.LoadingOverlay("show");
//       form.submit();
//    }

// });
