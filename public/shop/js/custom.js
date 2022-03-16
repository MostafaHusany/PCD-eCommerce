$(document).ready(function () {
    "use strict";

    $("body").on("click", ".item_to_cart", function (e) {
        e.preventDefault();
        var self = $(this);
        var ar_name = self.data("ar_name");
        var en_name = self.data("en_name");
        var image = self.data("image");
        var price = self.data("price");
        var quantity = self.data("quantity");
        var id = self.data("id");
        $.ajax({
            url: "/add_to_cart",
            type: "GET",
            data: {
                ar_name: ar_name,
                en_name: en_name,
                image: image,
                price: price,
                id: id,
                quantity: quantity,
            },
            success: function (response) {
                $("#items_count").html(response.items_count);
                $("#totalPrice").html(response.totalPrice);

                if (response.success == "success") {
                    $("#cart-content").empty();
                    $.each(response.cartCollection, function (key, value) {
                        var add_product_to_cart = `
                        <div class="single">
                        <li>
                            <a href="javascript:void(0);" class="item_remove "><i class="ion-close delete-cart-item"  data-product-id="${value.rowId}"></i></a>
                            <a href="#">${value.name}</a>
                            <span class="cart_quantity"> ${value.qty} x <span class="cart_amount"> <span class="price_symbole">$</span></span>${value.price}</span>
                        </li>
                        </div>`;
                        $("#cart-content").append(add_product_to_cart);
                        $("#item_added").removeClass("d-none");
                        setTimeout(() => {
                            $("#item_added").addClass("d-none");
                        }, 3000);
                    });
                } else if (response.status == "error") {
                    $("#item_not_added").removeClass("d-none");
                    setTimeout(() => {
                        $("#item_not_added").addClass("d-none");
                    }, 3000);
                }
            },
        });
    });

    $("body").on("click", ".delete-cart-item", function () {
        console.log("item");
        var self = $(this);
        var productId = self.data("product-id");
        let DeletedToast = $("#DeletedToast");
        $.ajax({
            url: "/cart_destroy/" + productId,
            type: "GET",
            success: function (response) {
                self.parents(".single").remove();
                $("#items_count").html(response.items_count);
                $("#totalPrice").html(response.totalPrice);
                $("#item_removed").removeClass("d-none");
                setTimeout(() => {
                    $("#item_removed").addClass("d-none");
                }, 3000);
            },
        });
    });

    $("body").on("click", ".delete-cart", function () {
        var self = $(this);
        var rowId = self.data("row-id");
        $.ajax({
            url: "/cart_destroy_item/" + rowId,
            type: "GET",
            success: function (response) {
                $("#items_count").html(response.items_count);
                $("#updatePrice").html(response.totalPrice);
                self.parents("tr").remove();
                $("#item_removed").removeClass("d-none");
                setTimeout(() => {
                    $("#item_removed").addClass("d-none");
                }, 3000);
            },
        });
    });

    $("body").on("click", ".remove-favorite", function () {
        var self = $(this);
        var product_id = self.data("product-id");
        $.ajax({
            url: "/remove_favorite/" + product_id,
            type: "GET",
            success: function (response) {
                self.parents("tr").remove();
            },
        });
    });

    $("body").on("click", ".add-to-favorite", function () {
        var self = $(this);
        var product_id = self.data("product-id");
        $.ajax({
            url: "/add-to-favorite/" + product_id,
            type: "GET",
            success: function (response) {
                if (response.success) {
                    $("#favorite i").addClass("favorite");
                    $("#favorite_item").removeClass("d-none");
                    setTimeout(() => {
                        $("#favorite_item").addClass("d-none");
                    }, 3000);
                } else if (response.error) {
                    $("#item_in_favorite").removeClass("d-none");
                    setTimeout(() => {
                        $("#item_in_favorite").addClass("d-none");
                    }, 3000);
                }
            },
        });
    });

    $("body").on("click", ".update-cart", function () {
        $(".update-product-quantity").each(function (index, value) {
            var self = $(value);
            var quantity = self.val();
            var rowId = self.data("row-id");
            var price = self.data("price");

            $.get(
                "/update_quantity/" + quantity + "/" + rowId,
                function (data) {
                    if (data.fail) {
                    } else {
                        console.log(data.totalPrice);
                        $(".totalAmount_" + rowId).text(price * quantity);
                        $("#updatePrice").html(data.totalPrice);
                    }
                }
            );
        });
    });

    $("#shipping").change(function () {
        $("#shipping_price").empty();
        $("#order_price").empty();
        var val = $(this).val();

        $.ajax({
            type: "get", // the method (could be GET btw)
            url: "shipping_price",
            data: {
                val: val,
            },
            success: function (response) {
                console.log(response);
                $("#shipping_price").html(response.get_cost);
                $("#totlal_price").html(response.totlal_price);

                $(".shipping_price_field").val(response.get_cost);
                $("#shipping_id_field").val(response.id);
                $("#total_price").val(response.totlal_price);
            },
        });
    });
});
