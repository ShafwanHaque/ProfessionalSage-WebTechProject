function validationQuestion(){
    let erroFlag = false;
    document.getElementById("titleError").innerHTML= "";
    let communityError = document.getElementById("communityError");
    communityError.innerHTML = "";
    let communityValue = document.getElementById("community").value;
    if(communityValue==""){
        communityError.innerHTML="Select Community";
        erroFlag = true;
    }
    
    if(document.getElementById("title").value==""){
        document.getElementById("titleError").innerHTML="Select Title";
        erroFlag = true;
    }

    return erroFlag ? false : true;

}

function validationAnswer(){
    let erroFlag = false;
    let answerError = document.getElementById("answerError");
    answerError.innerHTML= "";
    let answerValue = document.getElementById("answer").value;

    var allowed_extensions = new Array("jpg", "png", "doc", "docx", "pdf");
    var file_extension = answerValue.split('.').pop().toLowerCase(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.

    let extensionError = true;
    for(var i = 0; i <= allowed_extensions.length; i++)
    {
        if(allowed_extensions[i]==file_extension)
        {
            extensionError = false; // valid file extension
            break;
        }
    }

    if(answerValue==""){
        answerError.innerHTML="Select File";
        erroFlag = true;
    } else if(extensionError){
        answerError.innerHTML="Allowed File Type: image, docs, pdf";
        erroFlag = true;
    }

    return erroFlag ? false : true;
}