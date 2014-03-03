
<div id="footer">
    testing cakePhp @febr 2014
</div>
<div class="modal fade" id="popup" role="dialog"></div>

<script>
    $ = jQuery;
    function ajaxPopup(url){
        $.ajax({
        url     : url,
        type    : "GET",
        dataType: 'html',
        cache   : false,
        success : function(data){
            $('#popup').html( '<div class="modal-dialog">' +
                '<div class="modal-content">'
                + data +
                '</div>' +
                '</div>'
            );
            //$('#SendBtn').appendTo('.modal-footer').attr({"onclick" : "$('#contact').find('form').submit()" });
        }
    });

}

</script>