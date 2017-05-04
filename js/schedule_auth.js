/**
 * Created by USER on 5/5/2017.
 * TODO :INCOMPLETE
 */


var users=[];
var buses=[];
var schedule=[];

function toggleStatus(id, state) {
    console.log("toggle Status:"+ state);

    var btn = document.getElementById("btn_"+id);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);

            var reply = this.responseText;
            if (reply.indexOf("ONE") != -1) {

                if(state===1) { //Accepted
                    btn.innerHTML="Reject";
                    btn.className = "btn btn-danger pull-right";
                    btn.setAttribute("onClick", "toggleStatus("+id+","+0+")");
                }
                else if(state ===0) {
                    btn.innerHTML="Accept";
                    btn.className = "btn btn-success pull-right";
                    btn.setAttribute("onClick", "toggleStatus("+id+","+1+")");
                }
            }
        }
    };
    xhttp.open("POST", "backend/schedule_auth_changer.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+schedule[id].id+"&state="+state);

}

function initialize(sid)
{
    console.log(sid);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var parent = document.getElementById("schedule_body");
            parent.innerHTML="";

            var reply = JSON.parse(this.responseText);


            for( idx=0; idx<reply[2].length; idx++) {
                var d=reply[2][idx];
                var obj={"id":d["id"],"name":d["name"],"short_name":d["short_name"]};
                depts.push(obj);
            }


            for(idx=0; idx<reply[1].length; idx++) {
                var d = reply[1][idx];
                var obj={"id":d["id"], "name":d["name"], "route":d["route"]};
                buses.push(obj);
            }

            for( idx=0; idx<reply[0].length; idx++) {
                var d=reply[0][idx];
                var busname=buses[d["bus_id"]-1].name;
                var deptid=depts[d["dept_id"]-1];
                if(deptid!=null)
                    var dept=deptid.name;
                if(dept ==null)
                    dept="";
                var email=d["email"];
                if(email==null)
                    email="";
                var obj={"id":d["id"],"name":d["name"],"reg_no":d["reg_no"],"mob":d["mob_no"],"email":email,"dept":dept,"bus":busname,"status":0};
                users.push(obj);
            }

            var i=0;

            for(i=0; i<users.length; i++) {
                var obj=users[i];
                if(users[i].status==1) {
                    parent.innerHTML+="<tr><td>"+obj.name+"</td><td>"+obj.reg_no+"</td><td>"+obj.mob+"</td><td>"+obj.email+"</td><td>"+obj.dept+"</td><td>"+obj.bus+"</td><td><button onclick='toggleStatus("+i+","+0+")' id='btn_"+i+"' class='btn btn-danger pull-right'>Reject</button></td></tr>";
                } else {
                    parent.innerHTML+="<tr><td>"+obj.name+"</td><td>"+obj.reg_no+"</td><td>"+obj.mob+"</td><td>"+obj.email+"</td><td>"+obj.dept+"</td><td>"+obj.bus+"</td><td><button onclick='toggleStatus("+i+","+1+")' id='btn_"+i+"' class='btn btn-success pull-right'>Accept</button></td></tr>";
                }
            }

        }

    };
    xhttp.open("POST", "backend/schedule_auth_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+sid);
}
