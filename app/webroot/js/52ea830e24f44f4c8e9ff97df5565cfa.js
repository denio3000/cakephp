$(document).ready(function () {$("#submit-1537426376").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#inprogress").fadeIn();}, data:$("#submit-1537426376").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#inprogress").fadeOut();$("#success").html(data);}, type:"post", url:"\/cakephp\/posts\/edit"});
return false;});});