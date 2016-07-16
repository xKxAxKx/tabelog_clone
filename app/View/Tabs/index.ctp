<style>
    .tab {
        border-bottom: 1px solid #003d4c;
        display: table;
        width: 100%;
    }
    .tab > li {
        display: table-cell;
        vertical-align: middle;
        float: left;
        list-style-type: none;
        padding: 10px 10px;
        cursor: pointer;
    }
    .active {
        background-color: #003d4c;
        color: #ffffff;
        font-weight: bold:
    }
    .tab-content {
        padding: 10px 30px;
    }
</style>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(function(){
        $(".tab-content").hide();
        $("#tab1").show();
        $(".tab li").click(function() {
          $(".tab li").removeClass('active');
          $(".tab-content").hide();

          //thisと書くことで、クリックされた要素を持っていくことが出来る
          $(this).addClass("active");
          //.data("hoge")とすることで、data-hogeの引数を持ってくることが出来る
          //なので、例えばjQueryをクリックしたら"tab2"を持ってくることが出来る
          var target = $(this).data("target");
          //"#" + 引数で、data属性を指定できる
          $("#" + target).show();
        });
    });
</script>

<h3>タブメニュー</h3>

<ul class="tab">
    <li class="active" data-target="tab1">javascript</a></li>
    <li data-target="tab2">jQuery</li>
    <li data-target="tab3">Node.js</li>
</ul>

<p class="tab-content" id="tab1">
    javascriptの話です<br>
    javascriptは昔は実はあまりよくないものというイメージがありました<br>
</p>

<p class="tab-content" id="tab2">
    jQueryの話です<br>
    jQueryがあることで簡単にコーディングできるようになりました<br>
</p>

<p class="tab-content" id="tab3">
    Node.jsの話です<br>
    PHPのようにサーバーサイドのプログラムをjavascriptでもかけるようになります<br>
</p>
