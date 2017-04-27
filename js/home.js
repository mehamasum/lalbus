function findMyBus(busId) {
    console.log("find my bus with " + busId);
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            console.log(this.responseText);

            // get reportid, time, upvote, downvote, user, user reputation

            // add upvote btn, down vote btn, report btn

            var div = $("#resultDetails");
            div.html('');

            if(this.responseText.indexOf("EMPTY")!=-1) {
                div.html("<div style='margin: 10px'><span>No data found</span></div>");
                div.append('<hr style="margin-bottom: 10px">');
                div.append('<button onclick="add_report('+ busId+ ')" class="btn btn-primary">New Location</button>');
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

                // Split timestamp into [ Y, M, D, h, m, s ]
                var t = time.split(/[- :]/);

                // Apply each element to the Date function
                var d = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));

                console.log(d);

                /*var rel_time = timeSince(d);
                console.log(rel_time);*/

                div.html('<div>'+
                    '<span id>'+time+'</span><span style="margin-left: 10px" class="circle-green"></span><small>'+pos+'</small>'+
                    '<span style="margin-left: 10px" class="circle-red">'+
                    '</span><small>'+neg+'</small>'+
                    '<hr><div><div style="color: grey">'+
                    '<span>'+user+'</span><span class="star"></span><small>'+posrepu+'</small>'+
                    '</div></div></div>'+
                    '<hr style="margin-bottom: 10px">'+
                    '<button onclick="upvote('+ reportId+ ')" class="btn btn-success">Upvote</button>'+
                    '<button style="margin-left: 5px" onclick="downvote('+ reportId+ ')" class="btn btn-danger">Downvote</button>'+
                    '<button style="margin-left: 5px" onclick="add_report('+ busId+ ')" class="btn btn-primary">New Location</button>');

            }



            // add marker and zoom in
            //L.marker([38.913184, -77.031952]).addTo(mapLeaflet);

        }
    };
    xhttp.open("POST", "backend/find_my_bus.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("busId="+busId);
}

function upvote(reprtId) {
    console.log("UP "+ reprtId);
}

function downvote(reprtId) {
    console.log("DOWN "+ reprtId);
}

function add_report(busId) {
    console.log("add report bus id :" + busId);
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