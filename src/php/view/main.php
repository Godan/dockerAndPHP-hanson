

<center>

<!-- Wide card with share menu button -->
<style>
.demo-card-wide.mdl-card {
  width: 50%;
  padding-top: 25px;
}
.demo-card-wide > .mdl-card__title {
  color: #000000;
  height: 6px;
}
.demo-card-wide > .mdl-card__menu {
  color: #000000;
  z-index: 1;
}

.mdl-card__supporting-text{
  font-size: 18px;
  text-align: left;
}
</style>
<div style="padding-top: 25px">

  <div class="demo-card-wide mdl-card mdl-shadow--2dp" >
    <div class="mdl-card__title  mdlcard--border">

      <h2 class="mdl-card__title-text">ツイートする</h2>
    </div>
    <div class="mdl-card__supporting-text ">
      <form action="#/dsaf"id="post">
        <?=$userName?>:
        <div class="mdl-textfield mdl-js-textfield">
          <input class="mdl-textfield__input" type="text" id="msg" size="200">
          <label class="mdl-textfield__label" for="sample1">Text...</label>
        </div>
      </form>
    </div>
    <div class="mdl-card__menu">
      <div id="tt4" class="icon material-icons">share</div>
      <div class="mdl-tooltip" for="tt4">
        Twitterに投稿
    </div>
    </div>
  </div>

</div>
<h2>TimeLine</h2>
<div id="timeLine">

</div>
</center>

<!-- スナックバーを実装  -->
<div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>

  </body>
</html>

<script>
currentMsgId = 0;
$(function(){

  $('#post').submit(function() {
    msg = $('#msg').val();
    $('#msg').val('');
    postMsg(msg);
   });

    getMsg();
    setInterval(function(){
        getMsg();
    },1000);
});


function getMsg(){
// 課題2 messageを取得してみよう


}

function postMsg(msg){
// 課題1 messageを投稿してみよう


}


function makeCard(val){
  return '<div style="padding-top: 25px">\
    <div class="demo-card-wide mdl-card mdl-shadow--2dp" >\
      <div class="mdl-card__title  mdlcard--border">\
        <h2 class="mdl-card__title-text">'+ val.userName +'</h2>\
      </div>\
      <div class="mdl-card__supporting-text ">'+ val.text + ' </div>\
      <div class="mdl-card__menu">\
        <div id="tt4" class="icon material-icons">share</div>\
        <div class="mdl-tooltip" for="tt4">\
          Twitterに投稿\
      </div>\
      </div>\
    </div>\
  </div>  ';

}
</script>
