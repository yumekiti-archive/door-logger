const echo = window.Echo;


const updateState = (e) => {
    let doorLog = e.doorLog;
    let id = e.doorLog.id;
    console.log(id);
    let deviceElement = document.getElementById("device-id-" + doorLog.device_id);
    console.assert(deviceElement != null, "device elementを取得することができませんでした");

    let doorLogsElement = document.getElementById("door-logs");
    if(doorLogsElement){
        let newDiv = document.createElement("div");
        newDiv.className = "p-6 bg-white border-b border-gray-200 ml-20 border-size";
        let newUl = document.createElement("ul");
        newDiv.appendChild(newUl);
        let newLiTime = document.createElement("li");
        let date = new Date(doorLog.created_at);
        var year = date.getFullYear();
        var month = ("0"+(date.getMonth() + 1)).slice(-2);
        var day = ("0"+date.getDate()).slice(-2);
        var hour = ("0" + date.getHours()).slice(-2);
        var minute = ("0" + date.getMinutes()).slice(-2);
        var seconds = ("0" + date.getSeconds()).slice(-2);
        var formated = year + "年" + month + "月" + day + "日：" + hour + "時" + minute + "分" + seconds + "秒";
        newLiTime.innerText = formated;
        newUl.appendChild(newLiTime);
        let newLiStatus = document.createElement("li");
        newLiStatus.innerText = doorLog.is_open ? "OPEN" : "CLOSE";
        newUl.appendChild(newLiStatus);
        doorLogsElement.prepend(newDiv)
    }

    let elements = deviceElement.getElementsByClassName("door-state");
    if(elements.length){
        let element = elements[0];
        element.innerText = doorLog.is_open ? "状態： OPEN" : "状態： CLOSE";

        Notification.requestPermission();
        const notification = new Notification(doorLog.is_open ? "ドアID" + doorLog.device_id + "のドアが開きました" : "ドアID" + doorLog.device_id + "のドアが閉じました");
    }

}
echo.channel("doors.event")
    .listen("DoorEvent", (e)=>{
        console.log(e);
        updateState(e);
    });
