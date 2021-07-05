<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>
        Status
    </title>
    {{--<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
</head>
<body>

<table border="1" cellpadding="5" cellspacing="0">
    <caption>IAX2 SHOW PEERS</caption>
    <tr>
        <th>name</th>
        <th>ipaddress</th>
        <th>port</th>
        <th>status</th>
        <th>time</th>
    </tr>
    @if(!is_null($status))
@foreach($status as $stat)
    <tr>
    @foreach($stat as $key => $st)
            <td id="{{ $key == 'timeReg' ? $stat['name'] : '' }}"
                align="center"
            >
                {{$key == 'timeReg' ? null : $st}}
            </td>
    @endforeach
    </tr>
@endforeach
        @endif
</table>
<script>
    function updTm() {
        let url = '/frame1/fetch';
        fetch(url)
            .then(response => response.json())
            .then(data => {
                arrProm = Object.entries(data.fetchiax);
                arrProm.forEach((value) => {
                    let elem = document.getElementById(value[0]);
                    if (value[1] != null)
                        elem.innerHTML = value[1] + ' ms';
                    else
                        elem.innerHTML = '-';
                });
            });
    }

    tmInt = setInterval('updTm()', 1000);

</script>

</br></br>

<table border="1" cellspacing="0" cellpadding="5">
    <caption>SIP Шлюзы</caption>
    <tr>
        <th>Ipaddress</th>
        <th>Status</th>
        <th>CountSim</th>
    </tr>
</table>
<br>
<h1>Отправляем SMS</h1>
{{--<form name="sendSms" action="/sendSms" method="get" target="frame2">--}}
    {{--<input name="number" type="text" value="87757757775"><br>--}}
    {{--<input name="text" type="text" value="хоох"><br>--}}
    {{--<input name='user_id' type="hidden" value="234">--}}
    {{--<input type="submit" value="send">--}}
{{--</form>--}}
<form id="sendid">
    <input name="number" type="text" value="87757757775"><br><br>
    <input name="text" type="text" value="sendSms number 87006910954"><br><br>
    <input type="button" value="SEND" onclick="subnat()">
</form><br>

<div id="statusSendSms"></div>

<script>
   async function subnat() {
       alert('On click button!');
       let formData = new FormData(sendid);
       let timeSecDay = getSecondsToday();
       formData.append('user_id', timeSecDay);
       localStorage.setItem('user_id', timeSecDay);
       alert(formData.get('user_id'));

       let response = await fetch('/sendsms',{
           method: 'POST',
           body: formData
       });
       let result = await response.json();
       if (result['status'] == 202) {
           let divIdSendSmsStatus = document.getElementById('statusSendSms');
           divIdSendSmsStatus.innerHTML = "Send Server";
           setTimeout(getReturnStatusSendSms, 5000);
       }
   }
   async function getReturnStatusSendSms() {
       let userId = {"user_id" : localStorage.getItem('user_id')};
       console.log('user_id : ' + userId);
       console.log(JSON.stringify(userId));
       let response = await fetch('/statussms', {
           method: 'POST',
           body: JSON.stringify(userId),
           headers: {
               'Content-Type': 'application/json'
           }
       });
       let result = await response.json();
       alert(result);
   }

   function getSecondsToday() {
       let d = new Date();
       return d.getHours() * 3600 + d.getMinutes() * 60 + d.getSeconds();
   }
</script>


</body>
