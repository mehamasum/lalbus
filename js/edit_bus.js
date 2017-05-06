/**
 * Created by USER on 5/7/2017.
 */
var buses=[];
function addBus()
{
    window.location.href='bus_editor?id=0&m=1&r=&name=';
}

function deleteBus(busid)
{
    if (confirm("Are you sure you want to delete this Route ?\nYour name will be logged") == true) {
        document.getElementById('row_'+busid).innerHTML = "";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //this.responseText;
                var reply = this.responseText;
                alert("Your Delete Request is pending admin approval. Thanks for your update.");
                console.log(reply);
            }
        };
        xhttp.open("POST", "backend/bus_editor_handler.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //console.log(bus);
        xhttp.send("id="+busid+"&mode="+2+"&route="+buses[busid-1].route+"&remarks=&name=");
    }
}

function initialize()
{
    var bus_input = document.getElementById("table_body");
    var xhttp = new XMLHttpRequest();
    NProgress.start();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            NProgress.done();
            var reply = JSON.parse(this.responseText);
            bus_input.innerHTML="";
            reply[0].forEach(function(item) {
                var obj={"id":item["id"], "name":item["name"], "route":item["route"]};
                buses.push(obj);
                var link='bus_editor?id='+obj.id+'&m=0&r='+buses[obj.id-1].route+'&name='+buses[obj.id-1].name;
                bus_input.innerHTML+="<tr id=row_"+obj.id+"><td>"+obj.name+"</td><td>"+obj.route+"</td><td><a href="+link+" class='btn btn-xs btn-info'>Edit</a></td><td><button class=\"btn-xs btn-danger pull-right\" onclick=deleteBus("+obj.id+")>Delete</button></td></tr>";
            });

        } else {
            bus_input.innerHTML="Couldn't load List of buses :(";
        }
    };
    xhttp.open("POST", "backend/bus_list.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}