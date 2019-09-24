$(function () {
    $('#login_user_mobile').keypress(function (e) {
        var key = e.which;
        if (key == 13) {
            $("#btnLogin").click();
        }
    });
    $('#login_user_password').keypress(function (e) {
        var key = e.which;
        if (key == 13) {
            $("#btnLogin").click();
        }
    });
});
$(document).ready(function () {
    $("#btnLogin").click(function () {
        var login_user_mobile = $("#login_user_mobile").val();
        var login_user_password = $("#login_user_password").val();
        var status = 0;
        if (login_user_mobile == '') {
            status++;
            $("#login_user_mobile").css({
                "border": "2px solid red"
            });
        }
        if (login_user_password == '') {
            status++;
            $("#login_user_password").css({
                "border": "2px solid red"
            });
        }
        if (status == 0) {

            $.ajax({
                type: "POST",
                url: baseUrl + "assets/ajax/login.php",
                dataType: "jsonp",
                data: {
                    login_user_mobile: login_user_mobile,
                    login_user_password: login_user_password
                },
                success: function (response) {
                    var obj = response;
                    if (obj.output === "success") {
                        setTimeout(function () {
                            document.location.href = (baseUrl + 'dashboard.php');
                        }, 300);
                    } else {
                        alert(obj.msg);
                    }
                }
            });
        }
        $('#login_user_mobile').keyup(function () {
            $("#login_user_mobile").css({
                "border": "1px solid #ccc",
            });
        });
        $('#login_user_password').keyup(function () {
            $("#login_user_password").css({
                "border": "1px solid #ccc",
            });
        });
    });
});


function userLogout() {
    jQuery.ajax({
        type: "POST",
        url: baseUrl + "assets/ajax/logout.php",
        dataType: "jsonp",
        data: {
        },
        success: function (response) {
            var obj = response;

            setTimeout(function () {
                window.location.href = "index.php";
            });
        }
    });
}

function addToCart(id, price) {
    var productSuccessMsg = $(document.getElementById('productSuccessMsg'));
    productSuccessMsg.show();
    $.ajax({
        type: "POST",
        url: baseUrl + "assets/ajax/ajaxAddToCart.php",
        dataType: "jsonp",
        data: {
            temp_order_product_id: id,
            temp_order_product_price: price
        },
        success: function (response) {
            var obj = response;
            if (obj.output == "success") {
                var cartAmount = obj.totalCartAmount;
                console.log(cartAmount);
                $('.subtotal').html('Subtotal: ৳ ' + cartAmount);
                $('.cartRespons').html('৳' + cartAmount);
                if (cartAmount !== '') {
                    console.log('OK');
                    $("#cartHas").css('display', 'block');
                    $("#cartNo").css('display', 'none');

                } else {
                    console.log('IN');
                    $("#cartNo").css('display', 'block');
                    $("#cartHas").css('display', 'none');
                }
                var TmpCart = obj.arrTmpCart;
                console.log(TmpCart);
                generateMiniCart(TmpCart);
                $("#cartAmount").text(cartAmount);
            } else {
                alert(obj.msg);
            }

        }
    });
}
function generateMiniCart(TmpCart) {
    var cartHtml = '';
    var count = TmpCart.length;
    if (count > 0) {
        $.each(TmpCart, function (key, Event) {
            cartHtml += '<li>';
            cartHtml += '<a href="cart.php">';
            if (Event.product_image != '') {
                cartHtml += '<img src="' + baseUrl + 'upload/product_image/' + Event.product_image + '" alt="' + Event.product_title + '">';
            }
            cartHtml += '</a>';
            cartHtml += '<div class="add-cart-text">';
            cartHtml += '<p><a href="#">'+ Event.product_title + '</a></p>';
            cartHtml += '<p>৳'+ Event.temp_order_product_price + '</p>';
            cartHtml += '</div>';
            cartHtml += '<div class="pro-close"><i class="fa fa-times"></i></div>';
            cartHtml += '</li>';
        });
        cartHtml += '';
        $('#wholeCart').html(cartHtml);
    }
}

function qntyIncrease(itemID) {

    var quantity = $("#txtItemQuantity_" + itemID).val();
    if (quantity < 1) {
        quantity = 1;
    } else {
        quantity = quantity;
    }
    $.ajax({
        type: "POST",
        url: baseUrl + "assets/ajax/ajaxChngCartQnty.php",
        dataType: "jsonp",
        data: {
            newQuantity: quantity,
            itemID: itemID
        },
        success: function (response) {
            var obj = response;
            console.log(obj);
            if (obj.output === "success") {
                alert(obj.msg);
                setTimeout(function () {
                    window.location.href = "mycart.php";
                });
            } else {
                alert(obj.msg);
            }
        }
    });

}
function qntyDecrease(itemID) {
    alert(itemID);
}