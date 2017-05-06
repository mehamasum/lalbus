
var buses=[];
var modal;
var span;
function init_bus()
{
    modal= document.getElementById('myModal');
    span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        setSchedule(1);
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            setSchedule(1);
        }
    }

    var bus_list=document.getElementsByName("list_bus")[0];
    bus_list.innerHTML="";
    modal.style.display = "block";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var reply = JSON.parse(this.responseText);
            reply[0].forEach(function(item) {
                var b_id=item.id;
                bus_list.innerHTML+="<button type=\"button\" class=\"btn btn-primary btn-md\" onclick='setSchedule("+b_id+")'>"+item.name+"</button>";
            });

        }
    };
    xhttp.open("POST", "backend/bus_list.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

}

function setSchedule(selectedBus)
{
    search(selectedBus);
    modal.style.display = "none";
}

function search(busid) {

    var slot=document.getElementById("received_table");
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

