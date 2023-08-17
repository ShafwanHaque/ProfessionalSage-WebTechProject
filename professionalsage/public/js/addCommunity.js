function validationCommunity(){
    let erroFlag = false;

    let communityError = document.getElementById("communityError");
    communityError.innerHTML = "";
    let communityValue = document.getElementById("community").value;
    if(communityValue==""){
        communityError.innerHTML="Select Community";
        erroFlag = true;
    }
    return erroFlag ? false : true;
}
function emptyError(){
    let communityError = document.getElementById("communityError");
    communityError.innerHTML = "";
}