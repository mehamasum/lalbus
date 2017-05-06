/**
 * Created by USER on 5/7/2017.
 */


//Bus	Trip Type	Time	Endpoint	Driver	Bus Number	Remarks User	User Reputation	Suggested at

var users=[];
var buses=[];
var suggestion=[];

function toggleStatus(id, state,ref_id,update_mode) {
    console.log("toggle Status:"+ state+" "+update_mode);
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
        }
    };
    xhttp.open("POST", "backend/bus_auth_changer.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+id+"&state="+state+"&mode="+update_mode+"&ref="+ref_id);

}

function initialize()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var reply = JSON.parse(this.responseText);
            var parent = document.getElementById("bus_body");
            parent.innerHTML="";
            var obj={"id":0, "name":"", "route":""};
            buses.push(obj);

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
                var busname=d["name"];
                var index = users.map(function(o) {  return o.id; }).indexOf(d['user_id']);
                var username=users[index].name;
                var pos_repu=users[index].pos_repu;
                var user_level=users[index].level;
                var ref_id=d['old_id'];
                var ref_name=buses[ref_id].name;
                var update_types=["Update","New","Delete"];
                var update_type=update_types[d['update_type']];
                if(d['update_type']==1)
                {
                    ref_id=0;
                }
                var trip_type="Up Trip";
                if(d.trip_type==1)
                    trip_type="Down Trip";
                var obj={"id":d['id'],"update_mode":d['update_type'],"update_type":update_type,"ref_id":ref_id,"ref_name":ref_name,"bus":busname,"route":d['route'],"remarks":d['remarks'],"username":username,"user_level":user_level,"pos_repu":pos_repu,"timestamp":d['timestamp']};
                suggestion.push(obj);
            }
            var levels=["Student","Committee","Admin"];
            var i=0;
            for(i=0; i<suggestion.length; i++) {
                var obj=suggestion[i];
                parent.innerHTML += "<tr><td>" + obj.update_type + "</td><td>" + obj.ref_name + "</td><td>" + obj.bus + "</td><td>" + obj.route + "</td><td>" + obj.remarks + "</td><td>" + obj.username + "</td><td>" + levels[obj.user_level] + "</td><td>" + obj.pos_repu + "</td><td>" + obj.timestamp + "</td><td><button onclick='toggleStatus(" + obj.id + "," + 1 + "," + obj.ref_id +"," + obj.update_mode + ")' id='btn_a" + obj.id + "' class='btn btn-success pull-right'>Accept</button></td><td><button onclick='toggleStatus(" + obj.id + "," + 0 + "," + obj.ref_id +"," + obj.update_mode + ")' id='btn_r" + obj.id + "' class='btn btn-danger pull-right'>Reject</button></td></tr>";
            }

        }

    };
    xhttp.open("POST", "backend/bus_auth_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}
