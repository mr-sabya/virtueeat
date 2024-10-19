<script>
    let cart_id = "{{ $cart->id }}";
    $(document).on('click', '.plus', function() {
        let id = $(this).attr('data-id');
        let input = $('#quantity_' + id);

        $.ajax({
            type: "GET",
            url: "/cart-item/update/" + cart_id + "/" + id + "?req=increment",
            dataType: "json",
            success: function(response) {
                // console.log(response);
                input.val(response.cart_item.quantity);
                // $('#product_rate_' + id).html(response.total_price)
                $('#total').html(response.cart_total)
            }
        });
    });
    $(document).on('click', '.minus', function() {
        let id = $(this).attr('data-id');
        let input = $('#quantity_' + id);

        $.ajax({
            type: "GET",
            url: "/cart-item/update/" + cart_id + "/" + id + "?req=decrement",
            dataType: "json",
            success: function(response) {
                // console.log(response);
                input.val(response.cart_item.quantity);
                // $('#product_rate_' + id).html(response.total_price)
                $('#total').html(response.cart_total)
            }
        });
    });
</script>