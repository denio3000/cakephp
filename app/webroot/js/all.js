$ =jQuery;
  $(document).ready(function(){

    // REMOVE A MESSAGE
      var removeMessage = document.getElementsByClassName('removeMessage');
      for (var i = 0; i < removeMessage.length; i++) {
            removeMessage[i].addEventListener('click', function() {
                id = this.getAttribute('data-id');
                var $this = this;
                $.ajax({
                    type        : "post",
                    url         : webroot+'messages/delete/'+id,
                    success     : function(){
                        $this.parentNode.parentNode.parentNode.removeChild($this.parentNode.parentNode);
                    },
                    error       : function () {
                        alert('Error! Can not delete the message');
                    }
                });
            });
      }

      $('#commContainer').delegate('.removeComment','click',function(){
         id = this.getAttribute('data-id');
         var $this = this;
          $.ajax({
              type        : "post",
              url         : webroot+'comments/delete/'+id,
              success     : function(){
                  $this.parentNode.parentNode.parentNode.parentNode.removeChild($this.parentNode.parentNode.parentNode);
              },
              error       : function () {
                  alert('Error! Can not delete the message');
              }
          });
      });


  });
