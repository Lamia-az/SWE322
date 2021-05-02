$('#passwordID').on('input', function() {
    var passwordID = $("#passwordID").val();
    let length = passwordID.length;

    if(length<8){
      $("#passwordWarn").html("Password must be at least 8 characters");
    }
    else{
      $("#passwordWarn").html("");
    }
   
});
$('#usernameID').on('input', function() {
    var usernameID = $("#usernameID").val();
    let length = usernameID.length;

    if(length<3){
      $("#userIdWarn").html("Username cann't be less than 3 letters");
    }
    else if(length>15){
      $("#userIdWarn").html("Username cann't be more than 15 letters");
    }
    else{
      $("#userIdWarn").html("");
    }
   

    
});

$('#new_password').on('input', function() {
    var passwordID = $("#new_password").val();
    let length = passwordID.length;

    if(length<8){
      $("#passwordWarnBox").html("Password must be at least 8 characters");
    }
    else{
      $("#passwordWarnBox").html("");
    }
   
});

$('#confirmpassID').on('input', function() {
    var confirmPass = $("#confirmpassID").val();
    var newPass = $("#new_password").val();

    if(confirmPass === newPass){
      $("#passwordWarnBox2").html("Password match");
    }
    else{
      $("#passwordWarnBox2").html("Password don't match");
    }
   
});

