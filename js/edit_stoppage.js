/**
 * Created by USER on 5/6/2017.
 */
/**
 * Created by USER on 4/27/2017.
 */

// add data

var buses=[];
var stoppage=[];
var modal = document.getElementById('myModal');
var span = document.getElementsByClassName("close")[0];
function init_stoppage(bid)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

           // console.log(this.responseText);

            var parent = document.getElementById("table_body");
            var reply = JSON.parse(this.responseText);
            parent.innerHTML="";

            for(idx=0; idx<reply[0].length; idx++) {
                var d = reply[0][idx];
                var obj={"id":d["id"], "name":d["name"], "route":d["route"]};
                buses.push(obj);
            }
            stoppage=[];
            for(idx=0; idx<reply[1].length; idx++) {
                var d = reply[1][idx];
                var bus_id=d["bus_id"];
                var stoppage_mode=d["stoppage_type"];
                var stoppage_type="Up Trip Only";
                if(stoppage_mode==1)
                    stoppage_type="Down Trip Only";
                else if(stoppage_mode==2)
                    stoppage_type="Both Trips";
                var obj={"id":d["id"], "stoppage_name":d["stoppage_name"],"bus_id":bus_id,"bus_name":buses[bus_id-1].name, "stoppage_type":stoppage_type,"stoppage_mode":stoppage_mode,"remarks":d["remarks"]};
                stoppage.push(obj);
            }

            var i=0;

            for(i=0; i<stoppage.length; i++) {
                var d=stoppage[i];
                var trip='up';
                var bus_id=d.bus_id;
                var link='update_stoppage?id='+d.id+'&m=0&b='+bus_id;
                if(d.trip_type==1)
                    trip='down';
                parent.innerHTML+="<tr id=row_"+d.id+"><td>"+d.stoppage_name+"</td><td>"+d.bus_name+"</td><td>"+d.stoppage_type+"</td><td>"+d.remarks+"</td><td><a href="+link+" class='btn btn-xs btn-info'>Edit</a></td><td><button class=\"btn-xs btn-danger pull-right\" onclick=deleteStoppage("+d.id+")>Delete</button></td></tr>";
            }

        }
    };
    xhttp.open("POST", "backend/edit_stoppage_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("b="+bid);

}
function addStoppage(busid)
{
    //console.log("BUS : "+busid);
    window.location.href='stoppage_editor?id='+0+'&m=1&b='+busid;
}

function deleteStoppage(s_id)
{
    //console.log(stoppage);
    var index = stoppage.map(function(o) {  return o.id; }).indexOf( s_id.toString());
    var obj=stoppage[index];
    if (confirm("Are you sure you want to delete this trip ?\nYour name will be logged") == true) {
        document.getElementById('row_'+s_id).innerHTML = "";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //this.responseText;
                var reply = this.responseText;
                alert("Your Delete Request is pending admin approval. Thanks for your update.");
                console.log(reply);
            }
        };
        xhttp.open("POST", "backend/stoppage_editor_handler.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //console.log(bus);
        xhttp.send("bus_id="+obj.bus_id+"&stoppage_name="+obj.stoppage_name+"&lat="+obj.latitude+"&lng="+obj.longitude+"&stoppage_type="+obj.stoppage_type+"&remarks="+obj.remarks+"&update_type=2");
    }

}



function initModal()
{

    span.onclick = function() {
        setStoppage(1);
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            setStoppage(1);
        }
    }

    var bus_list=document.getElementsByName("list_bus")[0];
    modal.style.display = "block";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var reply = JSON.parse(this.responseText);
            reply[0].forEach(function(item) {
                var b_id=item.id;
                bus_list.innerHTML+="<button type=\"button\" class=\"btn btn-primary btn-md\" onclick='setStoppage("+b_id+")'>"+item.name+"</button>";
            });

        }
    };
    xhttp.open("POST", "backend/bus_list.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

}

function setStoppage(selectedBus)
{
    bid=selectedBus;
    console.log(bid);
    init_stoppage(bid);
    modal.style.display = "none";
}