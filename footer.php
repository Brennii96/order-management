<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<script>
    $(document).ready(function () {
        <?php $clients = DB::getInstance()->query("SELECT client_name from clients;"); ?>
        var content = [
            <?php foreach ($clients->results() as $client) {
            echo "{client: '" . $client->client_name . "', title: '" . $client->client_name . "'},";
        } ?>];
        $('.ui.search').search({
            type: 'standard',
            source: content,
            searchFields: ['client'],
        });

        /*
         * A drag and drop update feature which would be used for updating the order Status. Just drag the order into the dropzone.
         */
        //<style href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css"></style>
        //<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"/>
        // $("#draggable-id").val(orderStatus).draggable({
        //     refreshPositions: true,
        //     snap: true,
        //     revert: true,
        // });
        // $("#droppable-id").droppable({
        //     activeClass: "active",
        //     hoverClass:  "hover",
        //     drop: function (event, ui) {
        //         let orderId = ui.draggable.attr('data-id');
        //         ui.draggable.addClass("hide");
        //         $.ajax({
        //             type: "POST",
        //             url: '/update-status.php',
        //             dataType: 'json',
        //             data: {'orderStatus':$("#droppable-id").attr('data')},
        //         }).done(function( data ) {
        //
        //         });
        //     }
        // });
    });
</script>