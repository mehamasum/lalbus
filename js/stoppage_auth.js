/**
 * Created by USER on 5/5/2017.
 */



//Update Type	Stoppage Name	Bus	Stoppage Type	Remarks	User	User Level	User Reputation	Suggested at

var users=[];
var buses=[];
var stoppage=[];

function toggleStatus(id, state,update_mode) {
    var btnr,btna;

    btnr=document.getElementById("btn_r"+id);
    btna=document.getElementById("btn_a"+id);

    NProgress.start();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            NProgress.done();
            var reply = this.responseText;
            console.log(reply);
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
    xhttp.open("POST", "backend/stoppage_auth_changer.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+id+"&state="+state+"&mode="+update_mode);

}

function initialize(sid)
{
    console.log("Stoppage");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var parent = document.getElementById("stoppage_body");
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

            for( idx=0; idx<reply[0].length; idx++) {
                var d=reply[0][idx];
                var busname=buses[d["bus_id"]-1].name;
                var index = users.map(function(o) {  return o.id; }).indexOf(d['user_id']);
                var username=users[index].name;
                var levels=["Student","Committee","Admin"];
                var user_level=users[index].level;
                var pos_repu=users[index].pos_repu;
                var update_type="Update";
                if(d['update_type']==0)
                {
                    update_type="Update";
                }
                else if(d['update_type']==1)
                {
                    update_type="Add New";
                }
                else if(d['update_type']==2)
                {
                    update_type="Delete";
                }

                var stoppage_type="Up Trip";
                if(d.stoppage_type==1)
                    stoppage_type="Down Trip";
                else if(d.stoppage_type==2)
                    stoppage_type="Both Trip";
                var obj={"id":d['id'],"update_mode":d['update_type'],"update_type":update_type,"stoppage_name":d['stoppage_name'],"bus":busname,"stoppage_type_val":d['stoppage_type'],"stoppage_type":stoppage_type,"remarks":d['remarks'],"username":username,"pos_repu":pos_repu,"user_level":user_level,"timestamp":d['requested_on']};
                stoppage.push(obj);
            }


//Update Type	Stoppage Name	Bus	Stoppage Type	Remarks	User	User Level	User Reputation	Suggested at


            var i=0;
            for(i=0; i<stoppage.length; i++) {
                var obj=stoppage[i];
                parent.innerHTML += "<tr><td>" + obj.update_type + "</td><td>" + obj.stoppage_name + "</td><td>" + obj.bus + "</td><td>" + obj.stoppage_type + "</td><td>" + obj.remarks + "</td><td>" + obj.username + "</td><td>" + levels[obj.user_level] + "</td><td>" + obj.pos_repu + "</td><td>" + obj.timestamp + "</td><td><button onclick='toggleStatus(" + obj.id + "," + 1 + "," + obj.update_mode + ")' id='btn_a" + obj.id + "' class='btn btn-success pull-right'>Accept</button></td><td><button onclick='toggleStatus(" + obj.id + "," + 0 +"," + obj.update_mode + ")' id='btn_r" + obj.id + "' class='btn btn-danger pull-right'>Reject</button></td></tr>";
            }

        }

    };
    xhttp.open("POST", "backend/stoppage_auth_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+sid);
}
