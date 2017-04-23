function search(busid,name) {

    var slot=document.getElementById("received_table");
    var busname_top=document.getElementById("busname_top");
    busname_top.innerHTML=name+" "+"<span class=\"caret\"></span>";

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //this.responseText;
            var reply = this.responseText;

            console.log(reply);
            slot.innerHTML=reply;

        }
    };
    xhttp.open("POST", "backend/schedule_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("bus_id="+busid);
}