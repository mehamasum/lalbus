function toggleFollow(id, state) {
    console.log("toogle folow:"+ id);

    var btn = document.getElementById("btn_"+id);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);

            var reply = this.responseText;
            if (reply.indexOf("ONE") != -1) {

             if(state==1) { //following
                 btn.innerHTML="Unfollow";
                 btn.className = "btn btn-danger pull-right";
                 btn.setAttribute("onClick", "toggleFollow("+id+","+0+")");
             }
             else if(state ==0) {
                 btn.innerHTML="Follow";
                 btn.className = "btn btn-success pull-right";
                 btn.setAttribute("onClick", "toggleFollow("+id+","+1+")");
             }
            }
        }
    };
    xhttp.open("POST", "backend/follow_changer.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+id+"&state="+state);

}

function initialize_following()
{

// add data
    var busses = [];
    var following = [];

    Array.prototype.contains = function (need) {
        for(idx in this) {
            if(this[idx]==need) return true;
        }
        return false;
    }
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            //console.log(this.responseText);

            var parent = document.getElementById("table_body");

            var reply = JSON.parse(this.responseText);
            //console.log(reply[0]);

            var idx;
            for( idx=0; idx<reply[0].length; idx++) {
                following.push(reply[0][idx]["bus_id"]);
            }


            // console.log(reply[1]);

            for(idx=0; idx<reply[1].length; idx++) {
                var d = reply[1][idx];
                var obj={"id":d["id"], "name":d["name"], "route":d["route"]};
                busses.push(obj);
            }


            // echo "var obj=$bus_id; following.push(obj);\n";
            // echo "var obj={\"id\":$id, \"name\":'$name', \"route\":'$route'}; busses.push(obj); \n";

            // then add this

            var i=0;

            for(i=0; i<following.length; i++) {
                console.log(following[i]);
            }

            console.log(busses.length);

            for(i=0; i<busses.length; i++) {
                //console.log(busses[i]);
                //console.log(i);
                //console.log(busses.length);
                var b_id = busses[i]["id"];
                var b_name = busses[i]["name"];
                var b_route = busses[i]["route"];
                if(following.contains(b_id)) {
                    parent.innerHTML+="<tr><td>"+b_name+"</td><td>"+b_route+"</td><td><button onclick='toggleFollow("+b_id+","+0+")' id='btn_"+b_id +"' class='btn btn-danger pull-right'>Unfollow</button></td></tr>";
                } else {
                    parent.innerHTML+="<tr><td>"+b_name+"</td><td>"+b_route+"</td><td><button onclick='toggleFollow("+b_id+","+1+")' id='btn_"+b_id +"' class='btn btn-success pull-right'>Follow</button></td></tr>";
                }
            }

        }
    };
    xhttp.open("POST", "backend/following_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+ id);
    console.log("Session " +id);

}