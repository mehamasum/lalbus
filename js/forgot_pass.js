/**
 * Created by USER on 5/6/2017.
 */

function validateRequest() {
    var email = document.getElementsByName("email")[0].value;
    var reg_no = document.getElementsByName("reg_no")[0].value;

    var content = document.getElementById("errorMessageContent");
    var errors = document.getElementById("errorMessages");

    var selected=0; //1 = reg_no, 2 = email
    var found = false;
    errors.innerHTML="";

    if(email!='')
        selected=2;
    else if(reg_no!='')
        selected=1;
    else
    {
        found=true;
        errors.innerHTML+="Enter either your Registration Number or Email";
    }

    if(selected==1)
    {
        if(!isInteger(reg_no) || !isDuReg(reg_no)) {
            found = true;
            errors.innerHTML+= "Invalid DU Registration Number"+"<br>";
        }
    }
    else if(selected==2)
    {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!re.test(email)) {
            found = true;
            errors.innerHTML+= "Invalid Email"+"<br>";
        }
    }

    if(found)
        content.style.display = "block";
    else {
        content.style.display = "none";
        var xhttp = new XMLHttpRequest();
        NProgress.start();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //this.responseText;
                NProgress.done();
                var reply = this.responseText;

                if (reply.indexOf("ZERO") != -1) {
                    found = true;
                    errors.innerHTML += "Wrong Email or Registration Number" + "<br>";
                }
                else {
                    showAlert();
                }

                if (found)
                    content.style.display = "block";
                else {
                    content.style.display = "none";

                }
            }
        };

        xhttp.open("POST", "backend/forgot_pass_handler.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //console.log(bus);

        xhttp.send("e="+email+"&p="+reg_no+"&s="+selected);
    }
}

function showAlert() {
    $("#success-alert").alert();
    $("#success-alert").fadeTo(2200, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        //window.location.href = "home";
    });
}