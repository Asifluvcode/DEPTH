$(document).ready(function (){
      // Email already exists  while verification 
$("#stuemail").on("keypress blur", function (){
var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
var stuemail = $("#stuemail").val();
$.ajax({
    url:'users/adduser.php',
    method: 'POST',
    data:{
        checkemail: "checkmail",
        stuemail: stuemail,
    },
    success: function(data){
        // console.log(data);
        if(data != 0 && reg.test(stuemail)){
            $("#statusMsg2").html('<small style="color:red;">Email already exists</small>');
            $("#signup").attr("disabled", true);
        }else if (data == 0){
            $("#statusMsg2").html('<small style="color:green;">Their you Go</small>');
            $("#signup").attr("disabled", false);
        } else if(!reg.test(stuemail)){
            $("#statusMsg2").html('<small style="color:red;">Please enter valid Email</small>');
            $("#signup").attr("disabled", false);
        }
        if(stuemail == ""){
            $("#statusMsg2").html('<small style="color:red;">Please Enter your Email</small>');
        }
    },
    });
  });
});

function addStu(){
var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
var stuname = $("#stuname").val();
var stuemail = $("#stuemail").val();
var stupass = $("#stupass").val();

// checking form fields on form submission

if(stuname.trim() == ""){
    $("#statusMsg1").html('<small style="color:red;">Please Enter your Name !</small>');
    $("#stuname").focus();
    return false;
}else if(stuemail.trim() == ""){
    $("#statusMsg2").html('<small style="color:red;">Please Enter your Email !</small>');
    $("#stuemail").focus();
    return false;
} else if(stuemail.trim() != "" && !reg.test(stuemail)){
    $("#statusMsg2").html('<small style="color:red;">Please enter a valid Email</small>');
    $("#stuemail").focus();
} else if(stupass.trim() == ""){
    $("#statusMsg3").html('<small style="color:red;">Please Enter your Password !</small>');
    $("#stupass").focus();
    return false;
} else {
    $.ajax({
        url:'users/adduser.php',
        method: 'POST',
        dataType: "json",
        data:{
            stusignup: "stusignup",
            stuname: stuname,
            stuemail: stuemail,
            stupass: stupass,
        },
        success:function(data){
            // console.log(data);
            if(data == "OK") {
                $("#successMsg").html("<span class='alert alert-success'>Registration Successfull !</span>");
                clearStuRegField();
            }else if(data == "Failed"){
                $("#successMsg").html("<span class='alert alert-danger'>Unable to Register</span>");
            }
        },
    });    
  }
}

//To Empty all fields
function clearStuRegField(){
    $("#stuRegForm").trigger("reset");
    $("#ststusMsg1").html(" ");
    $("#ststusMsg2").html(" ");
    $("#ststusMsg3").html(" ");
}



// ajax call for student Login verification
function checkStuLogin() {
    var stuLogEmail = $("#stuLogemail").val();
    var stuLogPass = $("#stuLoginpass").val();
    $.ajax({
        url: "users/adduser.php",
        method: "POST",
        data:{
            checkLogemail: "checklogmail",
            stuLogEmail:stuLogEmail,
            stuLogPass:stuLogPass,
        },
        success: function (data) {
            if(data == 0){
                $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email id</small>');
            }else if(data == 1){
                $("#statusLogMsg").html('<div class="spinner-border text-success" role="status"></div>');
                setTimeout(() => {
                    window.location.href = "index.php";
                }, 1000);
            }
        },
    });
}

// testimonials carosil

$(document).ready(function() {

    $('.owl-carousel').owlCarousel({
        mouseDrag:false,
        loop:true,
        margin:2,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            }
        }
    }); 
    
    $('.owl-prev').click(function() {
        $active = $('.owl-item .item.show');
        $('.owl-item .item.show').removeClass('show');
        $('.owl-item .item').removeClass('next');
        $('.owl-item .item').removeClass('prev');
        $active.addClass('next');
        if($active.is('.first')) {
            $('.owl-item .last').addClass('show');
            $('.first').addClass('next');
            $('.owl-item .last').parent().prev().children('.item').addClass('prev');
        }
        else {
            $active.parent().prev().children('.item').addClass('show');
            if($active.parent().prev().children('.item').is('.first')) {
                $('.owl-item .last').addClass('prev');
            }
            else {
                $('.owl-item .show').parent().prev().children('.item').addClass('prev');
            }
        }
    });
    
    $('.owl-next').click(function() {
        $active = $('.owl-item .item.show');
        $('.owl-item .item.show').removeClass('show');
        $('.owl-item .item').removeClass('next');
        $('.owl-item .item').removeClass('prev');
        $active.addClass('prev');
        if($active.is('.last')) {
            $('.owl-item .first').addClass('show');
            $('.owl-item .first').parent().next().children('.item').addClass('prev');
        }
        else {
            $active.parent().next().children('.item').addClass('show');
            if($active.parent().next().children('.item').is('.last')) {
                $('.owl-item .first').addClass('next');
            }
            else {
                $('.owl-item .show').parent().next().children('.item').addClass('next');
            }
        }
    });
    
    });

