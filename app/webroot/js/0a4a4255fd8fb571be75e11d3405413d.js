$(document).ready(function () {$("#submit-641206876").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#sending").fadeIn();}, data:$("#submit-641206876").closest("form").serialize(), success:function (data, textStatus) {$("#sending").fadeOut();}, type:"post", url:"\/cakephp\/messages"});
return false;});});