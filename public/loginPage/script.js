document.getElementById('show-register').addEventListener('click', function() {
    document.getElementById('login-form').classList.remove('active');
    document.getElementById('register-form').classList.add('active');
  });
  
  document.getElementById('show-login').addEventListener('click', function() {
    document.getElementById('register-form').classList.remove('active');
    document.getElementById('login-form').classList.add('active');
  });


// document.getElementById('show-register').addEventListener('click', function() {
//     // Hide the login form with rotation
//     document.getElementById('login-form').classList.remove('active');
//     setTimeout(function() {
//       document.getElementById('register-form').classList.add('active');
//     }, 500); // Delay to ensure a smooth transition
//   });
  
//   document.getElementById('show-login').addEventListener('click', function() {
//     // Hide the register form with rotation
//     document.getElementById('register-form').classList.remove('active');
//     setTimeout(function() {
//       document.getElementById('login-form').classList.add('active');
//     }, 500); // Delay to ensure a smooth transition
//   });