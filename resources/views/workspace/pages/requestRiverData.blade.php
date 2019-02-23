<html>
<head>
    {{--<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}}




    <title>Get River Data</title>


<script>

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

</script>

</head>
<body>
<div>
    Guadalupe River in New Braunfels
    08168500



    the Comal River

    08169000 the best



    08169000
    08168932
    08168913

    both in Texas.
</div>

<input type="text" id="pID">
{{--<input type="button" id="button2" onclick="--}}
{{--setInterval(getRiverData(), 3000);--}}

" value="show river data"/>
<div id="riverElement"></div>

<div id="theGuadalupeRiverStreamFlow"></div>
<div id="theComalRiverStreamFlow"></div>


<script type="text/javascript" src="js/river-script.js"></script>

</body>
</html>



{{--Guadalupe River in New Braunfels--}}
{{--08168500--}}



{{--the Comal River--}}
{{--08169000--}}
{{--08168932--}}
{{--08168913--}}

{{--both in Texas.--}}
{{--<script>--}}
{{--function getRiverData() {--}}
{{--var xhr = new XMLHttpRequest();--}}
{{--xhr.onreadystatechange = function () {--}}
{{--if (xhr.readyState == 4 && xhr.status == 200) {--}}
{{--var river = xhr.responseText;--}}
{{--//alert(river);--}}
{{--displayriver(river);--}}
{{--}--}}
{{--};--}}
{{--siteNumbers = document.getElementById("pID").value; //'08168500';--}}
{{--const url = "https://waterservices.usgs.gov/nwis/iv/?format=json&sites="+siteNumbers+"&parameterCd=00060,00065&siteStatus=active";--}}
{{--xhr.open("get", url, true);--}}
{{--xhr.send();--}}
{{--}--}}

{{--function displayriver(p) {--}}
{{--var jsonData = JSON.parse(p);--}}
{{--// var riverElement = jsonData.data;--}}
{{--document.getElementById("riverElement").innerHTML = "<br>river flow: " + jsonData.value.timeSeries[0].values[0].value[0].value;--}}
{{--document.getElementById("riverElement").innerHTML = "<br>river flow: " + jsonData.value.timeSeries[0].values[0].value[0].value;--}}
{{--}--}}

{{--</script>--}}
