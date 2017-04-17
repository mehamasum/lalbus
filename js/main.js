function isInteger(n) {
    return !isNaN(parseInt(n));
}

function isDuReg(n) {
    if(n.length==10) return true;
    else return false;
}

function isBDMob(n) {
    if(n.length==11) return true;
    else return false;
}