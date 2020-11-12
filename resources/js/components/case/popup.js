// =================
// DOM取得
// =================
const popupheadNav = document.getElementById("js-popup-menu");
const clickpopup   = document.getElementById("js-click-popup");
const popupmask   = document.getElementById("js-popup-mask");
// =================
// 処理
// =================
// ポップアップメニュー 有無
if (clickpopup != null) {
    // alert('clickpopupがあります。');

    const $clickPopfunction = clickpopup.addEventListener("click", function() {
        // console.log("clickpopupをクリック");
        popupheadNav.style.top = "0px";
        popupmask.style.zIndex = "5";
        popupmask.style.display = "block";
    });

    const $clickPopUpMaskfc = popupmask.addEventListener("click", function() {
        // console.log("popupmaskをクリック");
        popupheadNav.style.top = "-70px";
        popupmask.style.zIndex = "0";
        popupmask.style.display = "none";
    });
}
