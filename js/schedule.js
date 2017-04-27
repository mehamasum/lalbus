function search(busid) {

    var slot=document.getElementById("received_table");
    var lastButton=document.getElementById(activeButton);
    if(lastButton!=null)
    {
        lastButton.classList.remove('btn-danger');
    }
    activeButton='btn_'+busid;
    var currentButton=document.getElementById(activeButton);
    currentButton.classList.add('btn-danger');

    console.log(busid+" ");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //this.responseText;
            var reply = this.responseText;

            //console.log(reply);
            slot.innerHTML=reply;

        }
    };
    xhttp.open("POST", "backend/schedule_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("bus_id="+busid);
}
