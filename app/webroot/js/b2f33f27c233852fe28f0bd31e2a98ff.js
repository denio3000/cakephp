$(document).ready(function () {$("#submit-1241113227").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#sending").fadeIn();}, data:$("#submit-1241113227").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#sending").fadeOut();$("#succes").html(data);}, type:"post", url:"\/cakephp\/messages"});
return false;});});