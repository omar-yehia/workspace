<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>River Data</title>

    <!--make an XM-->

</head>


<body>
<input type="text" id="pID">
<input type="button" id="button2" onclick="getProduct()" value="show product"/>
<div id="prod"></div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

{{--<script>--}}
    {{--// jQuery.support.cors = true;--}}
    {{--$.ajax({--}}
        {{--headers: {"Content-Type": "application/x-www-form-urlencoded" },--}}
        {{--url: "https://waterservices.usgs.gov/nwis/iv/?format=json&sites=08168500&parameterCd=00060,00065&siteStatus=all",--}}
        {{--type: "GET",--}}
        {{--// data: {--}}
        {{--//     "format": "json",--}}
        {{--//     "sites": "08168500",--}}
        {{--//     "parameterCd": "00060,00065",--}}
        {{--//     "siteStatus": "all",--}}
        {{--// }--}}
    {{--});--}}
{{--</script>--}}


<script>
    const Http = new XMLHttpRequest();
    const url = "https://waterservices.usgs.gov/nwis/iv/?format=json&sites=08168500&parameterCd=00060,00065&siteStatus=all";

    Http.open("GET", url);
    Http.send();
    Http.onreadystatechange=(e)=>{

    console.log(Http.responseText);
    var jsonData = JSON.parse(Http.responseText);
    window.valueOfRiverFlow = jsonData.value.timeSeries[0].values[0].value[0].value;
    }


</script>


</body>

</html>
