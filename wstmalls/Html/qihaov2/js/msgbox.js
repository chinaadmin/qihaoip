(function () {
  $.MsgBox = {
    Alert: function (title, msg) {
      GenerateHtml("alert", title, msg);
      btnOk(); 
      btnNo();
    },
    Confirm: function (title, msg, callback) {
      GenerateHtml("confirm", title, msg);
      btnOk(callback);
      btnNo();
    },
     Alerta: function (title, msg,callback) {
      GenerateHtml("alerta", title, msg);
      btnOk(callback); 
      btnNo();
    },
    Prompt:function (title,msg,callback){
       GenerateHtml("prompt", title, msg);
       numbtnOk(callback); 
       btnNo();
    }
  }
 
  var GenerateHtml = function (type, title, msg) {
 
    var _html = "";
 
    _html += '<div id="mb_box"></div><div id="mb_con"><span id="mb_tit">' + title + '</span>';
    if (type != "prompt") {
      _html += '<a id="mb_ico">X</a><div id="mb_msg">' + msg + '</div><div id="mb_btnbox">';
    }else{
      _html += '<a id="mb_ico">X</a><div id="mb_msg">' + msg + '<br><input type="text" id="num" name="num" style="color: #999999;font-size: 16px;height:30px;line-height:30px;padding-left: 5px;width: 325px;border: 1px solid #ff6600;"></div><div id="mb_btnbox">';
    }
    if (type == "alert") {
      _html += '<input id="mb_btn_ok" type="button" value="确定" />';
    }
     if (type == "alerta") {
      _html += '<input id="mb_btn_ok" type="button" value="确定" />';
    }
    if (type == "confirm") {
      _html += '<input id="mb_btn_ok" type="button" value="确定" />';
      _html += '<input id="mb_btn_no" type="button" value="取消" />';
    }
    if (type == "prompt") {
      _html += '<input id="mb_btn_ok_num" type="button" value="确定" />';
      _html += '<input id="mb_btn_no" type="button" value="取消" />';
    }
    _html += '</div></div>';
 
    $("body").append(_html); GenerateCss();
  }
 
  var GenerateCss = function () {
 
    $("#mb_box").css({ width: '100%', height: '100%', zIndex: '99999', position: 'fixed',
      filter: 'Alpha(opacity=60)', backgroundColor: 'black', top: '0', left: '0', opacity: '0.6'
    });
 
    $("#mb_con").css({ zIndex: '999999', width: '400px', position: 'fixed',
      backgroundColor: 'White', borderRadius: '15px'
    });
 
    $("#mb_tit").css({ display: 'block', fontSize: '14px', color: '#ffffff', padding: '10px 15px',
      backgroundColor: '#ff6600', borderRadius: '15px 15px 0 0',
      borderBottom: '3px solid #ff6600', fontWeight: 'bold'
    });
 
    $("#mb_msg").css({ padding: '20px', lineHeight: '20px',
      borderBottom: '1px dashed #ff6600', fontSize: '13px'
    });
 
    $("#mb_ico").css({ display: 'block', position: 'absolute', right: '10px', top: '9px',
      border: '1px solid Gray', width: '18px', height: '18px', textAlign: 'center',
      lineHeight: '16px', cursor: 'pointer', backgroundColor: '#ffffff', borderRadius: '12px', fontFamily: '΢???ź?'
    });
 
    $("#mb_btnbox").css({ margin: '15px 0 10px 0', textAlign: 'center' });
    $("#mb_btn_ok,#mb_btn_no").css({ width: '85px', height: '30px', color: 'white', border: 'none' });
    $("#mb_btn_ok").css({ backgroundColor: '#ff6600' });
    $("#mb_btn_ok_num,#mb_btn_no").css({ width: '85px', height: '30px', color: 'white', border: 'none' });
    $("#mb_btn_ok_num").css({ backgroundColor: '#ff6600' });
    $("#mb_btn_no").css({ backgroundColor: 'gray', marginLeft: '20px' });
 
 
    $("#mb_ico").hover(function () {
      $(this).css({ backgroundColor: 'Red', color: '#ffffff' });
    }, function () {
      $(this).css({ backgroundColor: '#ffffff', color: 'black' });
    });
 
    var _widht = document.documentElement.clientWidth; 
    var _height = document.documentElement.clientHeight; 
 
    var boxWidth = $("#mb_con").width();
    var boxHeight = $("#mb_con").height();
 
    $("#mb_con").css({ top: (_height - boxHeight) / 2 + "px", left: (_widht - boxWidth) / 2 + "px" });
  }
 
 
  var btnOk = function (callback) {
    $("#mb_btn_ok").click(function () {
      $("#mb_box,#mb_con").remove();
      if (typeof (callback) == 'function') {
        callback();
      }
    });
  }

  var numbtnOk = function (callback) {
    $("#mb_btn_ok_num").click(function () {
       var num = $('#num').val();
      $("#mb_box,#mb_con").remove();
      if (typeof (callback) == 'function') {
        callback(num);
      }
    });
  }
 
  var btnNo = function () {
    $("#mb_btn_no,#mb_ico").click(function () {
      $("#mb_box,#mb_con").remove();
    });
  }
})();