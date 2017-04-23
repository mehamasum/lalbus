function toggleFollow(id, state) {
    console.log("toogle folow:"+ id);

    var btn = document.getElementById("btn_"+id);
    if(state==0) {
        btn.innerHTML="Follow";
        btn.className = "btn btn-success pull-right";
        btn.setAttribute("onClick", "toggleFollow("+id+","+1+")");
        //TODO : send to db
    }
    else if(state==1) {
        btn.innerHTML="Unfollow";
        btn.className = "btn btn-danger pull-right";
        btn.setAttribute("onClick", "toggleFollow("+id+","+0+")");
        //TODO : send to db
    }
}