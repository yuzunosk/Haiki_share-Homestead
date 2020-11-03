// =================
// DOM取得
// =================

const dropArea = document.getElementById("js-dropArea");
const changeFile = document.getElementById("js-changeFile");
const OnFile = document.getElementById("js-check-img");
console.log({changeFile});
console.log("取得しました" + OnFile);
// =================
// 処理
// =================
// ---画像ライブビューア ---
if (dropArea != null) {
    // alert('読み込みました');
    dropArea.addEventListener("dragover", function(e) {
        console.log("ドラッグしました。");
        e.preventDefault();
        e.stopPropagation();
        this.classList.add("c_input--drop-over");
        changeFile.classList.add("opacity-0");
        changeFile.classList.remove("u_display-n");
        OnFile.classList.add("u_display-n");

    });

    dropArea.addEventListener("dragleave", function(e) {
        console.log("ドラッグしました。");
        e.preventDefault();
        e.stopPropagation();
        this.classList.remove("c_input--drop-over");
        // changeFile.classList.remove("opacity-0");
        // changeFile.classList.add("u_display-n");
        OnFile.classList.remove("u_display-n");
    });

    //inputの内容が変化した場合発火する
    changeFile.addEventListener("change", function() {
        console.log("内容の変更がありました。");
        dropArea.classList.remove("c_input--drop-over");
        let file = this.files[0]; //変更されたファイル情報の取得
        console.log({ file });
        let img = this.nextElementSibling;
        console.log({ img });
        changeFile.classList.add("u_display-n");
        changeFile.classList.remove("opacity-0");
        OnFile.classList.remove("u_display-n");
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
