/**
 * Created by USER on 5/5/2017.
 */


//Bus	Trip Type	Time	Endpoint	Driver	Bus Number	Comment	User	User Reputation	Suggested at

var users=[];
var buses=[];
var schedule=[];

function toggleStatus(id, state,ref_schedule,update_mode) {
   // console.log("toggle Status:"+ state+" "+update_mode);
    var btnr,btna;

    btnr=document.getElementById("btn_r"+id);
    btna=document.getElementById("btn_a"+id);


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);

            var reply = this.responseText;
            if (reply.indexOf("ONE") != -1) {

                if(state===1) { //Accepted
                    btna.innerHTML="Accepted";
                    btna.className = "btn btn-success pull-right";
                    btna.setAttribute('disabled','true');
                    btnr.setAttribute('disabled','true');
                }
                else if(state ===0) {
                    btnr.innerHTML="Rejected";
                    btnr.className = "btn btn-danger pull-right";
                    btnr.setAttribute('disabled','true');
                    btna.setAttribute('disabled','true');
                }
            }
            else if(reply.indexOf("ZERO")!=-1)
            {
                alert("This Stoppage Doesn't Exist Anymore !");
                btna.setAttribute('disabled','true');
                btnr.setAttribute('disabled','true');
            }
        }
    };
    xhttp.open("POST", "backend/schedule_auth_changer.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+id+"&state="+state+"&mode="+update_mode+"&ref="+ref_schedule);

}

function initialize(sid)
{
    console.log("Schedule");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var parent = document.getElementById("schedule_body");
            parent.innerHTML="";

            var reply = JSON.parse(this.responseText);

            for(idx=0; idx<reply[2].length; idx++) {
                var d = reply[2][idx];
                var obj={"id":d["id"], "name":d["name"], "route":d["route"]};
                buses.push(obj);
            }

            for( idx=0; idx<reply[1].length; idx++) {
                var d=reply[1][idx];
                var obj={"id":d["id"],"name":d["name"],"level":d["level"],"pos_repu":d["pos_repu"],"neg_repu":d["neg_repu"]};
                users.push(obj);
            }


            //Update type Bus 	Trip Type	Time	Endpoint	Driver	Bus Number	Comment	User	User Reputation	Suggested at
            for( idx=0; idx<reply[0].length; idx++) {
                var d=reply[0][idx];
                var busname=buses[d["bus_id"]-1].name;
                var index = users.map(function(o) {  return o.id; }).indexOf(d['user_id']);
                var username=users[index].name;
                var pos_repu=users[index].pos_repu;
                var user_level=users[index].level;
                var update_type="Update";
                var ref_schedule=d['old_schedule'];
                if(d['update_type']==0)
                {
                    update_type="Update";
                }
                else if(d['update_type']==1)
                {
                    update_type="New";
                    ref_schedule=0;
                }
                else if(d['update_type']==2)
                {
                    update_type="Delete";
                }

                var trip_type="Up Trip";
                if(d.trip_type==1)
                    trip_type="Down Trip";
                var obj={"id":d['id'],"update_mode":d['update_type'],"update_type":update_type,"ref_schedule":ref_schedule,"bus":busname,"trip_type":trip_type,"time":d['time'],"endpoint":d['endpoint'],"driver":d['driver'],"bus_number":d['bus_number'],"comment":d['comment'],"username":username,"user_level":user_level,"pos_repu":pos_repu,"timestamp":d['timestamp']};
                schedule.push(obj);
            }
            var levels=["Student","Committee","Admin"];
            var i=0;
            for(i=0; i<schedule.length; i++) {
                var obj=schedule[i];
                parent.innerHTML += "<tr><td>" + obj.update_type + "</td><td>" + obj.bus + "</td><td>" + obj.trip_type + "</td><td>" + obj.time + "</td><td>" + obj.endpoint + "</td><td>" + obj.driver + "</td><td>" + obj.bus_number + "</td><td>" + obj.comment + "</td><td>" + obj.username + "</td><td>" + levels[obj.user_level] + "</td><td>" + obj.pos_repu + "</td><td>" + obj.timestamp + "</td><td><button onclick='toggleStatus(" + obj.id + "," + 1 + "," + obj.ref_schedule +"," + obj.update_mode + ")' id='btn_a" + obj.id + "' class='btn btn-success pull-right'>Accept</button></td><td><button onclick='toggleStatus(" + obj.id + "," + 0 + "," + obj.ref_schedule +"," + obj.update_mode + ")' id='btn_r" + obj.id + "' class='btn btn-danger pull-right'>Reject</button></td></tr>";
            }

        }

    };
    xhttp.open("POST", "backend/schedule_auth_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+sid);
}
