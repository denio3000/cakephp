$(document).ready(function () {$("#submit-830112079").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#inprogress").fadeIn();}, data:$("#submit-830112079").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#inprogress").fadeOut();$("#success").html(data);}, type:"post", url:"\/cakephp\/posts\/"});
return false;});});