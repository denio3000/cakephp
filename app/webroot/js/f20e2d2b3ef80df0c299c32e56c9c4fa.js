$(document).ready(function () {$("#submit-874669148").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#inprogress").fadeIn();}, data:$("#submit-874669148").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#inprogress").fadeOut();$("#success").html(data);}, type:"post", url:"\/cakephp\/Posts\/index"});
return false;});});