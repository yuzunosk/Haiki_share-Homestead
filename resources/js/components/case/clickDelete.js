// =================
// DOM取得
// =================
const clickDelete = document.getElementById("js-click-delete");
const clickReturn = document.getElementById("js-click-return");
const clickReturnHome = document.getElementById("js-click-return-home");
const clickReturnUserHome = document.getElementById("js-click-return-userhome");
const clickReturnTop = document.getElementById("js-click-return-top");

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
        // alert("クリックされました"4);
        //画面を遷移させる
        window.location.href = "/store/product/index/";
    });
}
//ストアーhome画面に戻す処理
if (clickReturnHome != null) {
    clickReturnHome.addEventListener("click", () => {
        // alert("クリックされました"3);
        //画面を遷移させる
        window.location.href = "/store/home";
    });
}
//userhome画面に戻す処理
if (clickReturnUserHome != null) {
    clickReturnUserHome.addEventListener("click", () => {
        // alert("クリックされました"2);
        //画面を遷移させる
        window.location.href = "/user/home/";
    });
}
//Top画面に戻す処理
if (clickReturnTop != null) {
    clickReturnTop.addEventListener("click", () => {
        console.log('トップへ戻りたい');
        // alert('クリックされました。1');
        //画面を遷移させる
        window.location.href = "/top";
    })
}

