$(document).ready(function () {$("#submit-1812283069").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#inprogress").fadeIn();}, data:$("#submit-1812283069").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#inprogress").fadeOut();$("#success").html(data);}, type:"post", url:"\/cakephp\/posts\/"});
return false;});});