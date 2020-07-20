// =================
// DOM取得
// =================
const flashMsg = document.getElementById("js-flash-message");
// =================
// 処理
// =================
//flash messageを表示させる処理
if (flashMsg != null) {
    const msg = flashMsg.innerText;
    const ms = 1000;

    if (msg.length) {
        // alert("文字がはいっています");
        flashMsg.style.height = "65px";
        setTimeout(function() {
            flashMsg.style.height = "0px";
            //heightを0にしたあとdisplay:noneする
            setTimeout(function() {
                flashMsg.style.display = "none";
            }, 0);
        }, 3500);
    }
}
