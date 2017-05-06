
var buses=[];
var modal;
var span;
var bus_list_btn;
var schedule_up=[];
var schedule_down=[];
function init_bus()
{
    modal= document.getElementById('myModal');
    span = document.getElementsByClassName("close")[0];
    bus_list_btn=document.getElementById('bus_list');
/*<li class="list-group-item">One</li>
    <li class="list-group-item">Two</li>
    <li class="list-group-item">Three</li>*/
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
    bus_list_btn.innerHTML=""
    bus_list.innerHTML="";
    modal.style.display = "block";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var reply = JSON.parse(this.responseText);
            reply[0].forEach(function(item) {
                var b_id=item.id;
                bus_list.innerHTML+="<button type=\"button\" class=\"btn btn-primary btn-md\" onclick='setSchedule("+b_id+")'>"+item.name+"</button>";
               // bus_list_btn.innerHTML+="<li class=\"list-group-item btn btn-primary btn-md\" onclick='setSchedule("+b_id+")'>"+item.name+"</li>";
                bus_list_btn.innerHTML+="<div class=\"btn-group\"><button type=\"button\" class=\"btn btn-primary btn-md\" onclick='setSchedule("+b_id+")'>"+item.name+"</button></div>";

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

    console.log(busid+" ");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //this.responseText;
            var reply = JSON.parse(this.responseText);
            schedule_up=[];
            schedule_down=[];
            var idx=0;
            for(idx=0; idx<reply[0].length; idx++) {
                var d = reply[0][idx];
                var bus_id=d["bus_id"];
                var trip_type=d['trip_type'];
                var obj={"id":d["id"], "bus_id":bus_id, "trip_type":d["trip_type"],"time":d["time"],"endpoint":d["endpoint"],"driver":d["driver"],"bus_number":d["bus_number"],"comment":d["comment"]};
                if(trip_type==0)
                    schedule_up.push(obj);
                else if(trip_type==1)
                    schedule_down.push(obj);
            }

            var data=reply[1]['item'];
            var bus_name=data['bus_name'];
            var up_name=document.getElementById("bus_name_up");
            up_name.innerHTML="Up Trip : "+bus_name;
            var i=0;
            var slot=document.getElementById("up_table");
            slot.innerHTML="";
            for(i=0; i<schedule_up.length; i++) {
                var d=schedule_up[i];
                slot.innerHTML+="<tr ><td>"+d.time+"</td><td>"+d.endpoint+"</td><td>"+d.driver+"</td><td>"+d.bus_number+"</td><td>"+d.comment+"</td></tr>";
            }

            var down_name=document.getElementById("bus_name_down");
            down_name.innerHTML="Down Trip : "+bus_name;
            var slot=document.getElementById("down_table");
            slot.innerHTML="";
            for(i=0; i<schedule_down.length; i++) {
                var d=schedule_down[i];
                slot.innerHTML+="<tr><td>"+d.time+"</td><td>"+d.endpoint+"</td><td>"+d.driver+"</td><td>"+d.bus_number+"</td><td>"+d.comment+"</td></tr>";
            }
            //slot.innerHTML=reply;

        }
    };
    xhttp.open("POST", "backend/schedule_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("bus_id="+busid);
}

