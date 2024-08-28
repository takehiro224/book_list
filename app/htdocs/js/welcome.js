function openTab(evt, tabName) {
    let i, tabcontent, tablinks;
    // idが"Login"と"Register"を取得して非表示に設定
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // 切り替えボタン部取得
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        // CSS用にclassにactiveを切り替え
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

//
document.addEventListener("DOMContentLoaded", function() {
    document.querySelector(".tablinks").click();
});