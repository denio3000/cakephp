$(document).ready(function () {$("#submit-407530124").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#sending").fadeIn();}, data:$("#submit-407530124").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#sending").fadeOut();$("#success").html(data);}, type:"post", url:"\/cakephp\/messages\/add"});
return false;});});