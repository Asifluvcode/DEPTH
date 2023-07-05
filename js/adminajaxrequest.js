// ajax call for admin Login verification

function checkAdmin() {
    console.log("button clicked");
    var adminLogEmail = $("#adminLogemail").val();
    var adminLogPass = $("#adminLogpass").val();
    $.ajax({
        url: "admin/admin.php",
        method: "POST",
        data:{
            checkLogemail: "checklogmail",
            adminLogEmail:adminLogEmail,
            adminLogPass:adminLogPass,
        },
        success: function (data) {
            if(data == 0){
                $("#statusAdminLogMsg").html('<small class="alert alert-danger">Invalid Email id</small>');
            }else if(data == 1){
                $("#statusAdminLogMsg").html('<div class="spinner-border text-danger" role="status"></div>');
                setTimeout(() => {
                    window.location.href = "admin/adminDashboard.php";
                }, 1000);
            }
        },
    });
}
