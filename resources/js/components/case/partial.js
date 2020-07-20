// =================
// DOM取得
// =================

const dropArea = document.getElementById("js-dropArea");
const changeFile = document.getElementById("js-changeFile");
const OnFile = document.getElementById("js-check-img");
// =================
// 処理
// =================
// ---画像ライブビューア ---
if (dropArea != null) {
    dropArea.addEventListener("dragover", function(e) {
        // console.log("ドラッグしました。");
        e.preventDefault();
        e.stopPropagation();
        this.classList.add("c_input--drop-over");
    });

    dropArea.addEventListener("dragleave", function(e) {
        // console.log("ドラッグしました。");
        e.preventDefault();
        e.stopPropagation();
        this.classList.remove("c_input--drop-over");
    });

    //inputの内容が変化した場合発火する
    changeFile.addEventListener("change", function() {
        // alert("内容の変更がありました。");
        let file = this.files[0]; //変更されたファイル情報の取得
        console.log({ file });
        let img = this.nextElementSibling;
        console.log({ img });
        // fileを読み込むオブジェクト
        let fileReader = new FileReader();

        // fileReaderメソッドを使用し、imgのsrc要素にセットする
        fileReader.onload = function(e) {
            img.setAttribute("src", event.target.result).show();
        };
        // 画像を読み込む
        fileReader.readAsDataURL(file);
    });
}
