

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
  $.ajax({
    url: "./msg.php?pid=json",
  }).done(function(data){ //ajaxの通信に成功した場合

    data.forEach(function(val, int, array){
      if(parseInt(currentMsgId) < parseInt(val.id)){
        currentMsgId = val.id;
         $("#timeLine").prepend(makeCard(val)).hide().fadeIn(1000);
       }else{

       }
    });
  }).fail(function(data){ //ajaxの通信に失敗した場合
  });
}

function postMsg(msg){
  var snackbarContainer = document.querySelector('#demo-toast-example');
  var showToastButton = document.querySelector('#demo-show-toast');
  $.ajax({
    url: "./msg.php?pid=post&msg="+ msg,
  }).done(function(data){ //ajaxの通信に成功した場合

      var data = {message: '投稿しました '};
      snackbarContainer.MaterialSnackbar.showSnackbar(data);

  }).fail(function(data){ //ajaxの通信に失敗した場合
    var data = {message: '投稿に失敗しました '};
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
  });



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
