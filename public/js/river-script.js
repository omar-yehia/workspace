


function getRiverData() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var river = xhr.responseText;
            //alert(river);
            displayriver(river);
        }
    };

    siteNumbers = document.getElementById("pID").value; //'08168500,08169000';
    siteNumbers = "08168500,08169000";
    const url = "https://waterservices.usgs.gov/nwis/iv/?format=json&sites="+siteNumbers+"&parameterCd=00060,00065&siteStatus=active";
    xhr.open("get", url, true);
    xhr.send();
}

function displayriver(river) {
    var jsonData = JSON.parse(river);
    // var riverElement = jsonData.data;
    theGuadalupeRiverStreamFlowValue = jsonData.value.timeSeries[0].values[0].value[0].value
    theComalRiverStreamFlowValue = jsonData.value.timeSeries[2].values[0].value[0].value

    document.getElementById("theGuadalupeRiverStreamFlow").innerHTML = "<br>The Guadalupe River Streamflow: " + theGuadalupeRiverStreamFlowValue + " ft³/s";
    document.getElementById("theComalRiverStreamFlow").innerHTML = "<br>The Comal River Streamflow: " + theComalRiverStreamFlowValue  + " ft³/s";
}

getRiverData()
setInterval(getRiverData, 3600000);
