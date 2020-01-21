$(document).ready(function () {
    init();
    $('.add-shopping-cart').on('click', addShoppingCart);
    $('.basket-clear').on('click', clearBasket);
    $('.apply-order').on('click', applyOrder);
    $('.get-history').on('click', getHistory);
    $('#history_orders_btn').on('click', clickViewHistory);
});

function initActions() {
    $('[data-toggle="tooltip"], [rel="tooltip"]').tooltip();
    $('#basket').on('click', openBasket);
    $('.basket-add-count').on('click', basketAddCount);
    $('.basket-sub-count').on('click', basketSubCount);
    $('.basket-remove-item').on('click', basketRemoveItem);
    $('.btn-tab').on('click', clickBasketTab);
}

function init() {
    var data = Api.getProducts();
    Render.buildItems(data);
    initActions();
}

function openBasket() {
    Render.buildBasket(Basket.getItems());
}

function addShoppingCart() {
    Basket.add(this);
    notify('Successfully added to cart!', 'info');
}

function basketAddCount() {
    Basket.addCount(this);
}

function basketSubCount() {
    Basket.subCount(this);
}

function basketRemoveItem() {
    Basket.removeItem(this);
}

function clearBasket() {
    Basket.clear();
    $('.nav-tab').removeClass('d-none');
    $('#tab2').addClass('d-none');
}

function clickBasketTab() {
    $('.nav-tab').removeClass('d-none');
    var block = $(this).closest('.nav-tab');
    $(block).addClass('d-none');
}

function clickViewHistory() {
    Render.buildHistoryModal();
    initActions();
}

function notify(message, type, timer = 1000, icon = '', from = 'top', align = 'right') {
    $.notify({
        icon: icon,
        message: message
    }, {
        type: type,
        timer: timer,
        delay: 200,
        placement: {
            from: from,
            align: align
        }
    })
}

function ajaxRequest(url, method, data = []) {
    var ansver;
    $.ajax({
        method: method,
        url: url,
        async: false,
        data: data
    }).done(function(msg) {
        ansver = msg
    });

    if (ansver.errors) {
        ansver.errors.forEach(function (item) {
            notify(item.phone, 'danger', 2000);
        });

        return false;
    }

    return ansver.data;
}

function applyOrder() {
    var phone = $('#phone').val(),
        name = $('#name').val(),
        address = $('#address').val(),
        status = true;

    if (phone === '') {
        $('#phone').closest('.form-group').removeClass('has-success').addClass('has-danger').addClass('is-focused');
        status = false;
    } else {
        $('#phone').closest('.form-group').addClass('has-success').removeClass('has-danger').addClass('is-focused').removeClass('is-failed');
    }

    if (name === '') {
        $('#name').closest('.form-group').removeClass('has-success').addClass('has-danger').addClass('is-focused');
        status = false;
    } else {
        $('#name').closest('.form-group').addClass('has-success').removeClass('has-danger').addClass('is-focused').removeClass('is-failed');
    }
    if (address === '') {
        $('#address').closest('.form-group').removeClass('has-success').addClass('has-danger').addClass('is-focused');
        status = false;
    } else {
        $('#address').closest('.form-group').addClass('has-success').removeClass('has-danger').addClass('is-focused').removeClass('is-failed');
    }

    if (status) {
        $('.apply-order').attr('disabled', 'disabled');
        $('.btn-tab').attr('disabled', 'disabled');

        var response = Api.applyOrder({
            client: {
                phone: phone,
                name: name,
                address: address,
            },
            store: Basket.get(),
        });

        if (response) {
            clearBasket();
            notify('Successfully, expect delivery!', 'success', 3000);
            $('#basket_modal').modal('hide');
        }

        $('.apply-order').removeAttr('disabled');
        $('.btn-tab').removeAttr('disabled');
    }
}

function getHistory() {
    var phone = $('#phone-history');

    if (phone.val() === '') {
        phone.closest('.form-group').removeClass('has-success').addClass('has-danger').addClass('is-focused');
    } else {
        phone.closest('.form-group').addClass('has-success').removeClass('has-danger').addClass('is-focused').removeClass('is-failed');

        $('.get-history').attr('disabled', 'disabled');
        var data = Api.getHistoryOrders({phone: phone.val()});

        if (data) {
            Render.buildHistoryItems(data);
        }

        $('.get-history').removeAttr('disabled');
    }
}
