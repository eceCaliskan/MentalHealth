//THIS FUNCTION IS FOR USER TABLE PRINTING VALUES AND CALLING THE SEEUSER.PHP TO GET THE RESULT OF THE QUERY
function loadDoc() {
    var xhttp = new XMLHttpRequest();
    ic = document.getElementById("table").innerHTML = "";
    xhttp.onreadystatechange = function () {
        uic = document.getElementById("table");
        var JSONObject = JSON.parse(this.responseText);
        for ($i =0; $i<JSONObject.length; $i++) {

            document.getElementById("table");
            $name = JSONObject[$i];
            $name1 = JSONObject[$i+1];
            $name2 = JSONObject[$i+2];
            $name3 = JSONObject[$i+3];
            $name4 = JSONObject[$i+4];
            $name5 = JSONObject[$i+5];
            $name6 = JSONObject[$i+6];
            $name7 = JSONObject[$i+7];
            $name8 = JSONObject[$i+8];
            $name9 = JSONObject[$i+9];
            $name10 = JSONObject[$i+10];
            $name11 = JSONObject[$i+11];

            uic.innerHTML +=
                "<tr><td><a href=message3.php?name="+$name+">" + JSONObject[$i] + "</a></td>" +
                "<td><a href=message3.php?name="+$name1+">" + JSONObject[$i+1] + "</a></td>"+
                "<td><a href=message3.php?name="+$name2+">" + JSONObject[$i+2]   +"</a></td>" +
                "<td><a href=message3.php?name="+$name3+">" + JSONObject[$i+3]  +"</a></td>" +
                "<td><a href=message3.php?name="+$name4+">" + JSONObject[$i+4]  +"</a></td>" +
                "<td><a href=message3.php?name="+$name5+">" + JSONObject[$i+5]+"</a></td>" +
                "<td><a href=message3.php?name="+$name6+">" + JSONObject[$i+6]  + "</a></td>" +
                "<td><a href=message3.php?name="+$name7+">" + JSONObject[$i+7] + "</a></td>" +
                "<td><a href=message3.php?name="+$name8+">" + JSONObject[$i+8]  +"</a></td>" +
                "<td><a href=message3.php?name="+$name9+">" + JSONObject[$i+9]  +"</a></td>" +
                "<td><a href=message3.php?name="+$name10+">" + JSONObject[$i+10] +"</a></td>" +
                "<td><a href=message.php?name="+$name11+">" + JSONObject[$i+11]  +"</a></td>" +
                "</tr>";
            $i=$i+11;
        }
    };
    xhttp.open("GET", "seeUser.php", true);
    xhttp.send();

}


//THIS FUNCTION IS TO GET AND SHOW MESSAGES
function loadDoc2() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var uic = document.getElementById("table").innerHTML = "";
            uic = document.getElementById("table");
            var JSONObject = JSON.parse(this.responseText);
            for ($i =0; $i<JSONObject.length; $i++) {
                document.getElementById("table");
                $id = JSONObject[$i];
                $text = JSONObject[$i+1];
                $image = JSONObject[$i+2];
                uic.innerHTML +=   "<tr><td>" + $text +" : " + $id  + "<td><img src=' images/"+$image+"'>"+"</td></tr>"
                $i=$i+2;
            }
        }
    };
    xhttp.open("GET", "message.php", true);
    xhttp.send();
}



//THIS FUNCTION IS TO SEND MESSAGES
function loadDoc3(str) {
    alert("No hate or judgement. You are only allowed to love and respect one another.");
    var uic = document.getElementById("table").innerHTML = "";
    loadDoc7();
    var file = document.getElementById("userfile").files[0].name;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            loadDoc2();

        }
    };
    xmlhttp.open("GET", "message4.php?q=" + str + "&q2=" + file  , true);
    xmlhttp.send();
}


function loadDoc7() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        var JSONObject = JSON.parse(this.responseText);

            if (this.readyState == 4 && this.status == 200) {
                for ($i =1; $i<JSONObject.length; $i++) {
                alert( "You have new messages from" + JSONObject[$i]);
            }
        }
    };
    xmlhttp.open("GET", "message5.php", true);
    xmlhttp.send();
}


//THIS FUNCTION IS TO SHOW WHEN USER IS TYPING
function loadDoc4() {
    var xmlhttp = new XMLHttpRequest();
    var uic = document.getElementById("table");
    alert("typing");
    uic.innerHTML += "<tr><td>" +" typing..."+"</tr></td>";
}


//THIS FUNCTION IS TO SHOW POST DATA
function loadDoc5() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                uic = document.getElementById("table");
                var JSONObject = JSON.parse(this.responseText);
                for ($i =0; $i<JSONObject.length; $i++) {
                    document.getElementById("table");
                    $id = JSONObject[$i];
                    $subject = JSONObject[$i + 1];
                    $text = JSONObject[$i + 2];
                    $replies = JSONObject [$i + 3];
                    $image = JSONObject [$i + 4];

                    uic.innerHTML +=
                        "<tr><td>" + $id + "</td>" +
                        "<td>" + $subject + "</td>" +
                        "<td>" + $text + "</td>" +
                        "<td><a href=comment.php?post_id2=" + $id + ">" + $replies + "</a></td>" +
                        "<td> <img src=' images/" + $image + "'>" + "</td>" +
                        "</tr>";
                    $i = $i + 4;
                }
            }
    };
        xmlhttp.open("GET", "forum.php", true);
        xmlhttp.send();
}


//THIS METHOD IS TO SEND MESSAGE WITHOUT AN IMAGE
function loadDoc6(str) {
    var uic = document.getElementById("table").innerHTML = "";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            loadDoc2();
        }
    };
    xmlhttp.open("GET", "message4.php?q=" + str  , true);
    xmlhttp.send();
}






//THIS FUNCTION IS THE SEARCH SPECIFIC POST IN THE POST TABLE
function showHint2(str) {
    var xmlhttp = new XMLHttpRequest();
    uic = document.getElementById("table").innerHTML = "";
    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            uic = document.getElementById("table");
            var JSONObject = JSON.parse(this.responseText);
            //alert(this.responseText);

            for ($i =0; $i<JSONObject.length; $i++) {
                $id = JSONObject[$i];
                $subject = JSONObject[$i + 1];
                $text = JSONObject[$i + 2];
                $replies = JSONObject [$i + 3];
                $image = JSONObject [$i + 4];
                uic.innerHTML +=
                    "<tr><td>ID:" + $id + "</td>" +
                    "<td> SUBJECT:" + $subject + "</td>" +
                    "<td> TEXT:" + $text + "</td>" +
                    "<td><a href=comment.php?post_id2=" + $id + ">" + $replies + "</a></td>" +
                    "<td> IMAGE:<img src=' images/" + $image + "'>" + "</td>" +
                    "</tr>"
                $i = $i + 4;
            }
        }
    };
    xmlhttp.open("GET", "forum3.php?q=" + str, true);
    xmlhttp.send();
}

//THIS METHOD IS TO CREATE A SELECTION BOX
function showHint(str) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            var uic = document.getElementById("resultsSelectionBox").innerHTML  = "";
            uic = document.getElementById("resultsSelectionBox");
            var names = this.responseText.split(',');
            for (var i = 0; i<names.length; i++){
                var opt = document.createElement('option');
                opt.value =  names[i]  ;
                opt.innerHTML =  names[i]  ;
                uic.appendChild(opt);
            }
        }
    };
    xmlhttp.open("GET", "forum2.php?q=" + str, true);
    xmlhttp.send();
}