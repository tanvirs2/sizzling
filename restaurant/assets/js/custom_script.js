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
                url: baseUrl + "ajax/login.php",
                dataType: "json",
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
        url: baseUrl + "ajax/logout.php",
        dataType: "json",
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

function addToCart(id, price, option) {
    console.log(baseUrl);
    $('#wholeCart').show();
    // location.reload(true);
    $.ajax({
        type: "POST",
        url: baseUrl + "ajax/ajaxAddToCart.php",
        dataType: "json",
        data: {
            temp_order_product_id: id,
            temp_order_product_price: price,
            temp_order_product_option: option,
        },
        success: function (response) {
            var obj = response;
            if (obj.output == "success") {
                var cartAmount = obj.totalCartAmount;
                // console.log(cartAmount);
                $('#emptyCart').css('display', 'none');
                $('.subtotal').html('Subtotal <span class="pull-right">£' + cartAmount);
                $('.total').html('TOTAL <span class="pull-right">£' + cartAmount);
                $('.cartRespons').html('৳' + cartAmount);
                if (cartAmount !== '') {
                    // console.log('OK');
                    $("#cartHas").css('display', 'block');
                    $("#cartNo").css('display', 'none');

                } else {
                    // console.log('IN');
                    $("#cartNo").css('display', 'block');
                    $("#cartHas").css('display', 'none');
                }
                var TmpCart = obj.arrTmpCart;
                // console.log(TmpCart);
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
            console.log("Generate Mini Cart");
            cartHtml += '<tr class="product'+  Event.temp_order_id +'">';
            cartHtml += '<td>';
            cartHtml += '<a onclick="qntyDecrease(' + Event.temp_order_id + ')" class="remove_item miniCartQuantity"><i class="fa fa-minus-circle"></i></a> <strong>' + Event.temp_order_product_qty + 'x</strong> <a onclick="increaseItem(' + Event.temp_order_id + ')" class=" miniCartQuantity"><i class="fa fa-plus-circle"></i></a>' ;
            cartHtml += '<span>' + Event.product_title + '' + Event.temp_order_product_option + '</span> </td>';
            cartHtml += '<td>';
            cartHtml += '<strong class="pull-right">£';
            cartHtml += '' + Event.temp_order_product_price + '</strong>';
            cartHtml += '</td>';
            cartHtml += '<td>';
            cartHtml += '<a onclick="deleteItem(' + Event.temp_order_id + ')"><i class="fa fa-remove"></i></a>' ;
            cartHtml += '<td>';
            cartHtml += '</tr>';
        });

        cartHtml += '';
        $('#wholeCart').html(cartHtml);
        // console.log(wholeCart);
    }
}
function increaseItem(id) {
//        console.log('Entered increase function online order page');
    var id = id;
    console.log(id);
    $.ajax({
        type: "POST",
        url: baseUrl + "ajax/ajaxUpdateCartQnty.php",
        dataType: "json",
        data: {
            id: id
        },
        success: function (response) {
            var obj = response;
            if (obj.output === "success") {
                console.log('Success Func')
                var cartAmount = obj.totalCartAmount;
                var TmpCart = obj.arrTmpCart;
                console.log(TmpCart);
                $('.subtotal').html('Subtotal <span class="pull-right">£' + cartAmount);
                $('.total').html('TOTAL <span class="pull-right">£' + cartAmount);
                $('.cartRespons').html('৳' + cartAmount);
                if (cartAmount !== '') {
//                        console.log('OK');
                    $("#cartHas").css('display', 'block');
                    $("#cartNo").css('display', 'none');

                } else {
//                        console.log('IN');
                    $("#cartNo").css('display', 'block');
                    $("#cartHas").css('display', 'none');
                }
//                     console.log(TmpCart);
                generateMiniCart(TmpCart);
                $("#cartAmount").text(cartAmount);

            } else {
                alert(obj.msg);
            }
        }
    });
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
        url: baseUrl + "ajax/ajaxChngCartQnty.php",
        dataType: "json",
        data: {
            newQuantity: quantity,
            itemID: itemID
        },
        success: function (response) {
            var obj = response;
            // console.log(obj);
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
function qntyDecrease(id) {
    $.ajax({
        type: "POST",
        url: baseUrl + "ajax/ajaxDecreaseQnty.php",
        dataType: "json",
        data: {
            id: id
        },
        success: function (response) {
            var obj = response;
            if (obj.output === "success") {
                var cartAmount = obj.totalCartAmount;
                var TmpCart = obj.arrTmpCart;
                console.log(TmpCart);
//                    console.log(TmpCart);
                $('.subtotal').html('Subtotal <span class="pull-right">£' + cartAmount);
                $('.total').html('TOTAL <span class="pull-right">£' + cartAmount);
                $('.cartRespons').html('£' + cartAmount);
                if (cartAmount !== '') {
//                        console.log('OK');
                    $("#cartHas").css('display', 'block');
                    $("#cartNo").css('display', 'none');

                } else {
//                        console.log('IN');
                    $("#cartNo").css('display', 'block');
                    $("#cartHas").css('display', 'none');
                }
//                     console.log(TmpCart);
                generateMiniCart(TmpCart);
                $("#cartAmount").text(cartAmount);

            } else {
                alert(obj.msg);
            }
        }
    });
}
function deleteItem(id) {
    var id = id;
    $.ajax({
        type: "POST",
        url: baseUrl + "ajax/delItem.php",
        dataType: "json",
        data: {
            id: id
        },
        success: function (response) {
            var obj = response;
            if (obj.output === "success") {
                var cartAmount = obj.totalCartAmount;
                var TmpCart = obj.arrTmpCart;
//                    console.log(TmpCart);
                $('.subtotal').html('Subtotal <span class="pull-right">£' + cartAmount);
                $('.total').html('TOTAL <span class="pull-right">£' + cartAmount);
                $('.cartRespons').html('৳' + cartAmount);
                if (cartAmount !== '') {
//                        console.log('OK');
                    $("#cartHas").css('display', 'block');
                    $("#cartNo").css('display', 'none');

                } else {
//                        console.log('IN');
                    $("#cartNo").css('display', 'block');
                    $("#cartHas").css('display', 'none');
                }
//                     console.log(TmpCart);
                generateMiniCart(TmpCart);
                $("#cartAmount").text(cartAmount);

            } else {
                alert(obj.msg);
            }
        }
    });
}
function generateMiniCart2(TmpCart) {
    var cartHtml = '';
    var count = TmpCart.length;
    console.log(count)
    if (count > 0) {
        $.each(TmpCart, function (key, Event) {
            cartHtml += '<tr class="product'+  Event.temp_order_id +'">';
            cartHtml += '<td>';
            cartHtml += '<a onclick="qntyDecrease(' + Event.temp_order_id + ')" class="remove_item miniCartQuantity"><i class="fa fa-minus-circle"></i></a> <strong>' + Event.temp_order_product_qty + 'x</strong> <a onclick="increaseItem(' + Event.temp_order_id + ')" class=" miniCartQuantity"><i class="fa fa-plus-circle"></i></a>' ;
            cartHtml += '<span> ' + Event.product_title + '' + Event.temp_order_product_option + '</span> </td>';
            cartHtml += '<td>';
            cartHtml += '<strong class="pull-right">£';
            cartHtml += '' + Event.temp_order_product_price + '</strong>';
            cartHtml += '</td>';
            cartHtml += '<td><a onclick="deleteItem(' + Event.temp_order_id + ')"><i class="fa fa-remove"></i></a></td>' ;
            cartHtml += '</tr>';
        });

        cartHtml += '';
        $('#wholeCart').html(cartHtml);
        // console.log(wholeCart);
    } if (count == 0){
        console.log('Enetered empty block');
        $('#emptyCart').css('display', 'none');
    }
}