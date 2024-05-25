$(document).ready(function() {
  $('.header').height($(window).height());
})

$('.button').click(function() {
  $(this).toggleClass("click");
  $('.sidebar').toggleClass("show");
});

$('nav ul li').click(function(){
  $(this).addClass("active").siblings().removeClass("active");
});

const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");
signupBtn.onclick = (()=>{
  loginForm.style.marginLeft = "-50%";
  loginText.style.marginLeft = "-50%";
});
loginBtn.onclick = (()=>{
  loginForm.style.marginLeft = "0%";
  loginText.style.marginLeft = "0%";
});
signupLink.onclick = (()=>{
  signupBtn.click();
  return false;
});