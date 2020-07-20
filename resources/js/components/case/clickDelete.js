// =================
// DOM取得
// =================
const clickDelete = document.getElementById("js-click-delete");
const clickReturn = document.getElementById("js-click-return");
const clickReturnHome = document.getElementById("js-click-return-home");
const clickReturnUserHome = document.getElementById("js-click-return-userhome");
// =================
// 処理
// =================
// --- delete処理 ---
if (clickDelete != null) {
    const $ProductId = document.getElementById("js-click-delete").dataset.id;
    console.log($ProductId);

    clickDelete.addEventListener("click", function() {
        // alert("クリックされました");
        //画面を遷移させる
        const $res = confirm("商品を削除しますか？");
        if ($res) {
            window.location.href = "/store/product/delete/" + $ProductId;
        }
    });
}

//画面を戻す処理
if (clickReturn != null) {
    clickReturn.addEventListener("click", () => {
        // alert("クリックされました");
        //画面を遷移させる
        window.location.href = "/store/product/index/";
    });
}
//画面を戻す処理
if (clickReturnHome != null) {
    clickReturnHome.addEventListener("click", () => {
        // alert("クリックされました");
        //画面を遷移させる
        window.location.href = "/store/home";
    });
}
//画面を戻す処理
if (clickReturnUserHome != null) {
    clickReturnUserHome.addEventListener("click", () => {
        // alert("クリックされました");
        //画面を遷移させる
        window.location.href = "/user/home/";
    });
}
