
function validateSignUp() {

    var name = document.getElementsByName("name")[0].value;
    var reg_no = document.getElementsByName("reg_no")[0].value;
/*    var mob_no = document.getElementsByName("mob_no")[0].value;*/
    var email = document.getElementsByName("email")[0].value.toLowerCase();
    var password = document.getElementsByName("password")[0].value;
    var comm = document.getElementsByName("committee")[0].value;
    var bus = document.getElementsByName("bus")[0].value;

    var content = document.getElementById("errorMessageContent");
    var errors = document.getElementById("errorMessages");
    var found = false;

    errors.innerHTML="";

    if(name.length<3) {
        found = true;
        errors.innerHTML+= "Name too short"+"<br>";
    }

    if(!isInteger(reg_no) || !isDuReg(reg_no)) {
        found = true;
        errors.innerHTML+= "Invalid DU Registration Number"+"<br>";
    }


/*    if(!isInteger(mob_no) || !isBDMob(mob_no)) {
        found = true;
        errors.innerHTML+= "Invalid Mobile Number"+"<br>";
    }*/

    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(email)) {
        found = true;
        errors.innerHTML+= "Invalid Email"+"<br>";
    }

    if(password.length<5) {
        found = true;
        errors.innerHTML+= "Password must be at least 5 characters"+"<br>";
    }

    if(found)
        content.style.display = "block";
    else {
        content.style.display = "none";
        NProgress.start();
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //this.responseText;
                var reply = this.responseText;
                NProgress.done();
                console.log(reply);
                console.log(reply.indexOf("ZERO"));
                console.log(reply.indexOf("ONE"));


                if (reply.indexOf("ZERO") != -1) {
                    found = true;
                    errors.innerHTML += "Registration or Mobile already in use" + "<br>";
                }
                else if(reply.indexOf("INVALID")!=-1)
                {
                    found=true;
                    errors.innerHTML+="Invalid Email Address"+"<br>";
                }
                else if (reply.indexOf("ERR") != -1){
                    found = true;
                    errors.innerHTML += "Something went wrong" + "<br>";
                }
                else  {

                }

                if (found)
                    content.style.display = "block";
                else {
                    content.style.display = "none";
                    showAlert();
                }
            }
        };
        xhttp.open("POST", "backend/signup_handler.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //console.log(bus);

        xhttp.send("n="+name+"&r="+reg_no+"&e="+email+"&p="+password+"&c="+comm+"&b="+bus);
    }
}

function showAlert() {
    $("#success-alert").alert();
    $("#success-alert").fadeTo(800, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        window.location.href = "following";
    });
}


