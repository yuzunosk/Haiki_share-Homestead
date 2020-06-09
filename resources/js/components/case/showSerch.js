// =================
// DOM取得
// =================
const showSerch = document.getElementById("js-click-showSerch");
const hideSerch = document.getElementById("js-click-hideSerch");
const toggleDisplay = document.getElementById("js-toggle-display");
// =================
// 処理
// =================
// ポップアップメニュー 並び替え
if (showSerch != null) {
    // ウインドウクリックで閉じる
    // window.onclick = event => {
    //     console.log("windowをクリック");
    //     //ウインドウをクリックした際に、toggleDisplayが、u_display-nを持っていない場合、classをつけ外しする
    //     if (toggleDisplay.classList.contains("u_display-hide")) {
    //         return;
    //     } else {
    //         toggleDisplay.classList.remove("u_display-show");
    //         toggleDisplay.classList.add("u_display-hide");
    //     }
    // };

    const $showfunction = showSerch.addEventListener("click", function() {
        console.log("showSerchをクリック");
        //toggleDisplayが、u_display-nを保持している場合、クラスをつけ外しする
        if (toggleDisplay.classList.contains("u_display-hide")) {
            toggleDisplay.classList.remove("u_display-hide");
            toggleDisplay.classList.add("u_display-show");
        } else {
            toggleDisplay.classList.remove("u_display-show");
            toggleDisplay.classList.add("u_display-hide");
        }
    });

    const $hidefunction = hideSerch.addEventListener("click", e => {
        console.log("閉じるをクリックしました");
        //toggleDisplayが、u_display-nを持っていない場合、クラスをつけ外しする
        console.log(!toggleDisplay.classList.contains("u_display-hide"));
        if (!toggleDisplay.classList.contains("u_display-hide")) {
            toggleDisplay.classList.remove("u_display-show");
            toggleDisplay.classList.add("u_display-hide");
        }
    });
}
