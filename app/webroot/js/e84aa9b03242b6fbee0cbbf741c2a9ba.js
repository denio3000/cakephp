$(document).ready(function () {$("#submit-821700856").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#inprogress").fadeIn();}, data:$("#submit-821700856").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#inprogress").fadeOut();$("#success").html(data);}, type:"post", url:"\/cakephp\/posts\/edit"});
return false;});});