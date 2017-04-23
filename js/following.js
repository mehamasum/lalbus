function toggleFollow(id, state) {
    console.log("toogle folow:"+ id);

    var btn = document.getElementById("btn_"+id);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);

            var reply = this.responseText;
            if (reply.indexOf("ONE") != -1) {

             if(state==1) { //following
                 btn.innerHTML="Unfollow";
                 btn.className = "btn btn-danger pull-right";
                 btn.setAttribute("onClick", "toggleFollow("+id+","+0+")");
             }
             else if(state ==0) {
                 btn.innerHTML="Follow";
                 btn.className = "btn btn-success pull-right";
                 btn.setAttribute("onClick", "toggleFollow("+id+","+1+")");
             }
            }
        }
    };
    xhttp.open("POST", "backend/follow_changer.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+id+"&state="+state);

}
