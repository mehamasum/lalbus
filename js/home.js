// add data
function initData()
{

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            console.log(this.responseText);
            var reply = JSON.parse(this.responseText);

            var idx;
            for (idx = 0; idx < reply.length; idx++) {
                console.log(reply[idx]["bus_id"]);
                var obj = "<option value='"+reply[idx]['id']+"'>"+reply[idx]['name']+"</option>";
                console.log(obj);
                $("#followingList").append(obj);
            }

            if(reply.length>0) {
                findMyBus(reply[0]["id"], reply[0]['name']);
            }

        }
    };
    xhttp.open("POST", "backend/following_list_for_user.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+ id);
}

window.initMap = function()  {
    var dhaka = {lat: 23.7315, lng: 90.3925};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
        center: dhaka
    });
};



function findMyBus(busId, name) {
    console.log("find my bus with " + busId + " name "+name);
    NProgress.start();
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        NProgress.done();
        if (this.readyState == 4 && this.status == 200) {


            console.log(this.responseText);

            // get reportid, time, upvote, downvote, user, user reputation

            // add upvote btn, down vote btn, report btn

            // get prev votes true or false

            var div = $("#resultDetails");
            div.html('');

            if(this.responseText.indexOf("EMPTY")!=-1) {
                div.html("<div style='margin: 10px'><span>No data found</span></div>");
                div.append('<hr style="margin-bottom: 10px">');
                div.append('<button id="reporter"  data-id="'+busId+'" onclick="add_report('+ busId+ ')" class="btn btn-primary">New Location</button>');
            }
            else {
                var reply = JSON.parse(this.responseText);

                var reportId = reply['reportId'];
                var time = reply['time'];
                var lat = reply['lat'];
                var lng = reply['lng'];
                var pos = reply['pos_cnt'];
                var neg = reply['neg_cnt'];
                var user = reply['user'];
                var posrepu = reply['pos_repu'];

                var voted = reply['voted'];

                // Split timestamp into [ Y, M, D, h, m, s ]
                var t = time.split(/[- :]/);

                // Apply each element to the Date function
                var d = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));

                console.log(d);

                /*var rel_time = timeSince(d);
                console.log(rel_time);*/

                div.html('<div>'+
                    '<span id>'+time+'</span><span style="margin-left: 10px" class="circle-green"></span><span id="green">'+pos+'</span>'+
                    '<span style="margin-left: 10px" class="circle-red">'+
                    '</span><span id="red">'+neg+'</span>'+
                    '<hr><div><div style="color: grey">'+
                    '<span>'+user+'</span><span class="star"></span><span id="star">'+posrepu+'</span>'+
                    '</div></div></div>'+
                    '<hr style="margin-bottom: 10px">'+
                    '<button id="plus" onclick="upvote('+ reportId+ ')" class="btn btn-success">Upvote</button>'+
                    '<button id="minus" style="margin-left: 5px" onclick="downvote('+ reportId+ ')" class="btn btn-danger">Downvote</button>'+
                    '<button id="reporter"  data-id="'+busId+'" style="margin-left: 5px" onclick="add_report('+ busId+ ')" class="btn btn-primary">New Location</button>');


                // add marker and zoom in
                var myLatlng = new google.maps.LatLng(lat,lng);
                var mapOptions = {
                    zoom: 18,
                    center: myLatlng
                };
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);

                var marker = new google.maps.Marker({
                    position: myLatlng,
                    title: name
                });


                var contentString = '<div style="padding: 10px">'+ name+ '</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                // To add the marker to the map, call setMap();
                marker.setMap(map);
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });

                //map.panTo(myLatlng);
                //map.setZoom( data[2]);

                if(voted.indexOf("true")!=-1) {
                    $("#plus").prop('disabled', true);
                    $("#minus").prop('disabled', true);
                }

            }

        }
    };
    xhttp.open("POST", "backend/find_my_bus.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("busId="+busId);
}

function upvote(reprtId) {
    console.log("UP "+ reprtId);
    sendVote(reprtId, "POS");
}

function downvote(reprtId) {
    console.log("DOWN "+ reprtId);
    sendVote(reprtId, "NEG");
}

function sendVote(reprtId, type) {

    var busId = $("#reporter").data('id');

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);

            var reply = this.responseText;

            console.log(reply.indexOf("ONE"));
            if(reply.indexOf("ONE")!=-1) {

                var green = $("#green");
                var red = $("#red");
                var star = $("#star");

                var old = 0;

                if(type==="POS") {
                    old = parseInt(green.html());
                    old++;
                    green.html(""+ old);

                    old = parseInt(star.html());
                    old++;
                    star.html(""+ old);

                }
                else {
                    old = parseInt(red.html());
                    old++;
                    red.html(""+ old);

                }

                $("#plus").prop('disabled', true);
                $("#minus").prop('disabled', true);

            }
            else {
                alert("Sorry! Something went wrong!");
            }


        }
    };
    xhttp.open("POST", "backend/vote_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("b="+busId+"&r="+reprtId+"&type="+type);

}

function add_report(busId) {
    console.log("add report bus id :" + busId);
    getLocation();
}

function timeSince(timeStamp) {
    var now = new Date(),
        secondsPast = (now.getTime() - timeStamp.getTime()) / 1000;
    if(secondsPast < 60){
        return parseInt(secondsPast) + 's';
    }
    if(secondsPast < 3600){
        return parseInt(secondsPast/60) + 'm';
    }
    if(secondsPast <= 86400){
        return parseInt(secondsPast/3600) + 'h';
    }
    if(secondsPast > 86400){
        day = timeStamp.getDate();
        month = timeStamp.toDateString().match(/ [a-zA-Z]*/)[0].replace(" ","");
        year = timeStamp.getFullYear() == now.getFullYear() ? "" :  " "+timeStamp.getFullYear();
        return day + " " + month + year;
    }
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {

    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    var bus = $("#reporter").data('id');

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //this.responseText;
            var reply = this.responseText;

            console.log(reply);

            if (reply.indexOf("ONE") != -1) {
                window.location.href = "home";
            }
            else {
                alert("Sorry. Something went wrong.");
            }

        }
    };
    xhttp.open("POST", "backend/report_receiver.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("b="+bus+"&lat="+lat+"&lng="+lng);
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            alert("User denied the request for Geolocation.");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("Location information is unavailable.");
            break;
        case error.TIMEOUT:
            alert("The request to get user location timed out.");
            break;
        case error.UNKNOWN_ERROR:
            alert("An unknown error occurred.");
            break;
    }
}


// add data
