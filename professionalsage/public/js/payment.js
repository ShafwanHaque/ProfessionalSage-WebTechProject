function changeType() {
    var elements = document.getElementsByClassName("typeForm");

    for (var i = 0; i < elements.length; i++) {
        elements[i].style.display = "none";
    }
    let type = document.getElementById("paymentType").value;

    if(type === 'card') {
        document.getElementById("card").style.display = "block";
        let cardError = document.getElementById("cardError");
        let pinError = document.getElementById("pinError");
        cardError.innerHTML = "";
        pinError.innerHTML = "";
    } else if(type === 'bkash' || type === 'nagad') {
        document.getElementById("bkash").style.display = "block";
        let mobileError = document.getElementById("mobileError");
        let bkashPinError = document.getElementById("bkashPinError");
        mobileError.innerHTML = "";
        bkashPinError.innerHTML = "";
    }
}

function purchase(){
    let type = document.getElementById("paymentType").value;
    let errorInput = false;
    if(type == "card") {
        let cardNo = document.getElementById("cardNo").value;
        let pinNo = document.getElementById("pinNo").value;
        let cardError = document.getElementById("cardError");
        let pinError = document.getElementById("pinError");
        cardError.innerHTML = "";
        pinError.innerHTML = "";
        if(cardNo == "") {
            cardError.innerHTML = "Please enter card no";
            errorInput = true;
        } else if(cardNo.length < 16 || cardNo.length > 16) {
            cardError.innerHTML = "Please enter valid card no";
            errorInput = true;
        }
        if(pinNo == "") {
            pinError.innerHTML = "Please enter pin no";
            errorInput = true;
        } else if(pinNo.length < 4 || pinNo.length > 4) {
            pinError.innerHTML = "Please enter valid pin no";
            errorInput = true;
        }
    } else if(type === 'bkash' || type === 'nagad') {
        let mobileNo = document.getElementById("mobileNo").value;
        let bkashPinNo = document.getElementById("bkashPinNo").value;
        let mobileError = document.getElementById("mobileError");
        let bkashPinError = document.getElementById("bkashPinError");
        mobileError.innerHTML = "";
        bkashPinError.innerHTML = "";
        if(mobileNo == "") {
            mobileError.innerHTML = "Please enter mobile no";
            errorInput = true;
        } else if(mobileNo.length < 11 || mobileNo.length > 11) {
            mobileError.innerHTML = "Please enter valid mobile no";
            errorInput = true;
        }
        if(bkashPinNo == "") {
            bkashPinError.innerHTML = "Please enter pin no";
            errorInput = true;
        } else if(bkashPinNo.length < 4 || bkashPinNo.length > 4) {
            bkashPinError.innerHTML = "Please enter valid pin no";
            errorInput = true;
        }
    }
    if (!errorInput) {
        let fileName = document.getElementById("fileName").value;
        let currentPath = window.location.pathname;
        let segments = currentPath.split('/');
        segments = segments.filter(segment => segment !== '');
        let firstSegment = segments[0];

        let hostname = window.location.hostname;
        console.log(hostname);
        // Define the file URL
        let fileURL = "http://"+hostname+"/"+firstSegment+"/vendor/documents/"+fileName; // Replace with the actual file URL

        // Create a hidden anchor element
        let link = document.createElement('a');
        link.style.display = 'none';
        link.href = fileURL;

        // Set the download attribute to prompt the browser to download the file
        link.setAttribute('download', fileName); // Replace 'file.pdf' with the desired filename

        // Append the anchor element to the document
        document.body.appendChild(link);

        // Trigger a click event on the anchor element
        link.click();

        // Clean up by removing the anchor element
        document.body.removeChild(link);
    } 
}