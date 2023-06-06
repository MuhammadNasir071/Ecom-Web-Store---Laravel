<script>

    $('body').on('click', '.loding_btn', function(){
        
        var submit_btn = $(this).text('loading...');
            submit_btn.css('disabled', true);
        setTimeout(function () {
            submit_btn.button('reset');
        }, 1500);

    });
</script>