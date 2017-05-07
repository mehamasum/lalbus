/**
 * Created by USER on 4/25/2017.
 */

var users=[];
var buses=[];
var depts=[];

function toggleStatus(id, state) {
    console.log("toggle Status:"+ state);
    var btnr,btna;

    btnr=document.getElementById("btn_r"+id);
    btna=document.getElementById("btn_a"+id);

    NProgress.start();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            NProgress.done();
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
    xhttp.open("POST", "backend/member_auth_changer.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+users[id].id+"&state="+state);

}

function initialize(sid)
{
    console.log(sid);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var parent = document.getElementById("usertable_body");
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
                parent.innerHTML+="<tr><td>"+obj.name+"</td><td>"+obj.reg_no+"</td><td>"+obj.mob+"</td><td>"+obj.email+"</td><td>"+obj.dept+"</td><td>"+obj.bus+"</td><td><button onclick='toggleStatus("+i+","+1+")' id='btn_a"+i+"' class='btn btn-success pull-right'>Accept</button></td><td><button onclick='toggleStatus("+i+","+0+")' id='btn_r"+i+"' class='btn btn-danger pull-right'>Reject</button></td></tr>";
            }

        }

    };
    xhttp.open("POST", "backend/member_auth_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+sid);
}
