/**
 * Created by USER on 4/23/2017.
 */
function validateLogin() {

    var email = document.getElementsByName("email")[0].value;
    var password = document.getElementsByName("password")[0].value;

    var content = document.getElementById("errorMessageContent");
    var errors = document.getElementById("errorMessages");

    var found = false;

    errors.innerHTML="";
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(email)) {
        found = true;
        errors.innerHTML+= "Invalid Email"+"<br>";
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
                    errors.innerHTML += "Wrong Email or Password" + "<br>";
                }
                else if (reply.indexOf("ERR") != -1) {
                    found = true;
                    errors.innerHTML += "Wrong Password" + "<br>";
                }
                else if( reply.indexOf("ADMIN")!=-1)
                {
                    console.log("Admin");
                    window.location.href = "member_auth";
                }
                else {
                    window.location.href = "home";
                }


                if (found)
                    content.style.display = "block";
                else {
                    content.style.display = "none";

                }
            }
        };

        xhttp.open("POST", "backend/login_handler.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //console.log(bus);

        xhttp.send("e="+email+"&p="+password);
    }
}




