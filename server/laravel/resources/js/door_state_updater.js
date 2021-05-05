const echo = window.Echo;


const updateState = (e) => {
    let doorLog = e.doorLog;
    let id = e.doorLog.id;
    console.log(id);
    let deviceElement = document.getElementById("device-id-" + doorLog.device_id);
    console.assert(deviceElement != null, "device elementを取得することができませんでした");

    let elements = deviceElement.getElementsByClassName("door-state");
    if(elements.length){
        let element = elements[0];
        element.innerText = doorLog.is_open ? "状態：OPEN" : "状態：CLOSE";
    }

    let elements1 = deviceElement.getElementsByClassName("door-log");
    if(elements1.length){
        let element = elements1[0];
        element.innerText = doorLog.created_at;
    }

}
echo.channel("doors.event")
    .listen("DoorEvent", (e)=>{
        console.log(e);
        updateState(e);
    });
