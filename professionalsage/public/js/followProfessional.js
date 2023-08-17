function autoComplete() {
    let input = document.getElementById("followSearchKey").value;
    let table = document.getElementById("searchResults");
    // console.log('input', input);

    // Clear previous results
    table.innerHTML = "";

    // Make AJAX request to the PHP script
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let results = JSON.parse(this.responseText);

            // Populate the results in the list
            results.forEach(function(item) {
                let form = document.createElement("form");
                form.method = "POST";
                form.action = "follow.php";

                let followList = document.createElement("div");
                followList.classList.add("follow-list");

                let userDiv = document.createElement("div");
                let usernameLink = document.createElement("a");
                usernameLink.href = "profile_view.php?username=" + item['username'];
                usernameLink.innerText = item['username'];
                userDiv.appendChild(usernameLink);

                let hiddenInput = document.createElement("input");
                hiddenInput.type = "hidden";
                hiddenInput.name = "followUserName";
                hiddenInput.value = item['username'];

                let emailDiv = document.createElement("div");
                let emailSpan = document.createElement("span");
                emailSpan.innerText = item['email'];
                emailDiv.appendChild(emailSpan);

                let followButtonDiv = document.createElement("div");
                let followButton = document.createElement("input");
                followButton.type = "submit";
                followButton.value = "Follow";
                followButton.name = "follow";
                followButtonDiv.appendChild(followButton);

                followList.appendChild(userDiv);
                followList.appendChild(hiddenInput);
                followList.appendChild(emailDiv);
                followList.appendChild(followButtonDiv);

                form.appendChild(followList);
                searchResults.appendChild(form);
            });
        }
    };
    xmlhttp.open("GET", "../controller/followProfessionalCheck.php?followSearchKey=" + input, true);
    xmlhttp.send();
}