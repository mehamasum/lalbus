/**
 * Created by USER on 4/27/2017.
 */

// add data

    var buses=[];
    var schedule=[];
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        //console.log(this.responseText);

        var parent = document.getElementById("table_body");

        var reply = JSON.parse(this.responseText);

        for(idx=0; idx<reply[0].length; idx++) {
            var d = reply[0][idx];
            var obj={"id":d["id"], "name":d["name"], "route":d["route"]};
            buses.push(obj);
        }

        for(idx=0; idx<reply[1].length; idx++) {
            var d = reply[1][idx];
            var bus_id=d["bus_id"];
            var obj={"id":d["id"], "bus_id":bus_id,"bus_name":buses[bus_id-1].name, "trip_type":d["trip_type"],"time":d["time"],"endpoint":d["endpoint"],"driver":d["driver"],"bus_number":d["bus_number"],"comment":d["comment"]};
            schedule.push(obj);
        }

        var i=0;

        for(i=0; i<schedule.length; i++) {
            var d=schedule[i];
            var trip='up';
            var bus_id=d.bus_id;
            var link='schedule_editor.php?id=4&m=0&b='+bus_id;
            if(d.trip_type==1)
                trip='down';
            parent.innerHTML+="<tr><td>"+d.bus_name+"</td><td>"+trip+"</td><td>"+d.time+"</td><td>"+d.endpoint+"</td><td>"+d.driver+"</td><td>"+d.bus_number+"</td><td>"+d.comment+"</td><td><a href="+link+" class='btn btn-xs btn-info'>Edit</a></td></tr>";
        }

    }
};
xhttp.open("POST", "backend/schedule_edit_handler.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("id="+ sid+"&b="+1);

