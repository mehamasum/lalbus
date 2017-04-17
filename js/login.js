function validateLogin() {


    var mob_no = document.getElementsByName("mob_no")[0].value;
    var password = document.getElementsByName("password")[0].value;

    var content = document.getElementById("errorMessageContent");
    var errors = document.getElementById("errorMessages");

    var found = false;

    errors.innerHTML="";

    if(!isInteger(mob_no) || !isBDMob(mob_no)) {
        found = true;
        errors.innerHTML+= "Invalid Mobile Number"+"<br>";
    }

    if(password.length<8) {
        found = true;
        errors.innerHTML+= "Password must be at least 8 characters"+"<br>";
    }

    if(found)
        content.style.display = "block";
    else {
        content.style.display = "none";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //this.responseText;
                var reply = this.responseText;

                console.log(reply);
                console.log(reply.indexOf("ZERO"));
                console.log(reply.indexOf("ONE"));


                if (reply.indexOf("ZERO") != -1) {
                    found = true;
                    errors.innerHTML += "Registration or Mobile already in use" + "<br>";
                }
                else if (reply.indexOf("ONE") != -1) {
                    window.location.href = "following.php";
                }
                else {
                    found = true;
                    errors.innerHTML += "Something went wrong" + "<br>";
                }

                if (found)
                    content.style.display = "block";
                else {
                    content.style.display = "none";

                }
            }
        };
        xhttp.open("POST", "backend/signup_handler.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //console.log(bus);

        xhttp.send("n="+name+"&r="+reg_no+"&m="+mob_no+"&p="+password+"&c="+comm+"&b="+bus);
    }
}


function isInteger(n) {
    return !isNaN(parseInt(n));
}

function isDuReg(n) {
    if(n.length==10) return true;
    else return false;
}

function isBDMob(n) {
    if(n.length==11) return true;
    else return false;
}




