<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<script>
    $.fn.api.settings.api.search = '/search.php/?clientname={value}';
    $('#full-search').api({
            action : 'search',
            method : 'POST',
            urlData: {
                id: this.value
            },
            // passed via POST
            data: {
                id: this.value
            }
        });
</script>