<form action="./api/add_vote.php" method="post">



    <div>
        <label for="subject">投票主題：</label>
        <input type="text" name="subject" id="subject">
        <!--每當點擊新增選項按鈕時會去執行一次more()這個javascript函式-->
        <input type="button" value="新增選項" onclick="more()">
    </div>
    <div id="selector">
        <!--在input後加上checked可以讓選項成為勾選狀態-->
        <input type="radio" name="multiple" value="0" checked>
        <label>單選</label>
        <input type="radio" name="multiple" value="1" >
        <label>複選</label>
    </div>
    <div id="options">
        <div>
                                <!--當輸入的項目為多項時,記得name的屬性要以陣列方式使用-->
            <label>選項:</label><input type="text" name="option[]">
        </div>
    </div>
    <input type="submit" value="新增">
</form>

<script>
    function more() {
        let opt = `<div><label>選項:</label><input type="text" name="option[]"></div>`;
        let opts = document.getElementById('options').innerHTML;
        opts = opts + opt;
        document.getElementById('options').innerHTML = opts;
    }
</script>