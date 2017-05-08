/**
 * Created by USER on 5/6/2017.
 */

function validatePassword()
{

    var newpass=document.getElementsByName('password')[0].value;
    var confirmpass=document.getElementsByName('newpass')[0].value;

    var content = document.getElementById("errorMessageContent");
    var errors = document.getElementById("errorMessages");
    var found=false;
    if(newpass.length<5) {
        found = true;
        errors.innerHTML+= "Password must be at least 5 characters"+"<br>";
    }

    if(newpass!=confirmpass)
    {
        found=true;
        errors.innerHTML+="Password didn't Match"+"<br>";
    }

    if(found)
        content.style.display = "block";
    else {
        content.style.display = "none";
        NProgress.start();
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            NProgress.done();
            if (this.readyState == 4 && this.status == 200) {
                //this.responseText;
                var reply = this.responseText;

                errors.innerHTML="";
                console.log(reply)
;
                if (reply.indexOf("ZERO") != -1) {
                    found = true;
                    errors.innerHTML += "Please Try again.Error Occured." + "<br>";
                }
                else if (reply.indexOf("ONE") != -1) {
                    showAlert();
                }

                if (found)
                    content.style.display = "block";
                else {
                    content.style.display = "none";
                }
            }
        };
        xhttp.open("POST", "backend/change_pass_handler.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //console.log(bus);

        xhttp.send("p=" + newpass +"&e="+email);
    }



}

function showAlert() {
    $("#success-alert").alert();
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        window.location.href = "home";
    });
}