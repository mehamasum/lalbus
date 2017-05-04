function search(busid) {

    var slot=document.getElementById("received_table");
    var lastButton=document.getElementById(activeButton);
    if(lastButton!=null)
    {
        lastButton.classList.remove('btn-danger');
    }
    activeButton='btn_'+busid;
    var currentButton=document.getElementById(activeButton);
    currentButton.classList.add('btn-danger');

    console.log(busid+" ");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //this.responseText;
            var reply = this.responseText;

            //console.log(reply);
            slot.innerHTML=reply;

        }
    };
    xhttp.open("POST", "backend/schedule_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("bus_id="+busid);
}


var buses=[];
function bus_list() {

    var buslist = document.getElementById('bus');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var reply = JSON.parse(this.responseText);
            reply[0].forEach(function(item) {

                var btn = document.createElement("BUTTON");
                btn.setAttribute('text',item['name']);
                btn.setAttribute('class','btn btn-primary');
                btn.setAttribute('id','btn_'+item['id']);
                btn.onclick=function() { search(item['id'])};
/*                var button='<button class="btn btn-primary" id="btn_'
                            +item['id']
                            +'">'+item['name']+'</button>';*/

                buslist.append(btn);
            });
        } else {
            console.log("Failed");
        }
    };
    xhttp.open("POST", "backend/bus_list.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

}