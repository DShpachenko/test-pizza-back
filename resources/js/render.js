class RenderItems {

    buildItems(data) {
        var listTypes = ['pizza', 'combo', 'desserts', 'drinks', 'promotions'];

        data.forEach(function(item) {
            var template = '';
            if (item.type !== 4) {
                template = '<div class="col-md-4">\n' +
                    '               <div class="card card-plain card-blog">\n' +
                    '                   <div class="card-header card-header-image">\n' +
                    '                       <a>\n' +
                    '                           <img class="img img-raised" src="' + item.img + '">\n' +
                    '                       </a>\n' +
                    '                       <div class="colored-shadow" style="background-image: url(' + item.img + ');"></div>\n' +
                    '                   </div>\n' +
                    '                   <div class="card-body">\n' +
                    '                       <h4 class="card-title">\n' +
                    '                           <div class="row">' +
                    '                               <div class="col-8">' +
                    '                                   <a>' + item.name + '</a>\n' +
                    '                               </div>' +
                    '                               <div class="col-4">' +
                    '                                   <a class="text-primary">€' + item.cost.eur + ' | $' + item.cost.usd + '</a>\n' +
                    '                               </div>' +
                    '                           </div>' +
                    '                       </h4>\n' +
                    '                       <p class="card-tags">\n' +
                    '                           <a><span class="badge badge-pill badge-danger">' + item.tags + '</span></a>\n' +
                    '                       </p>\n' +
                    '                       <p class="card-description">' + item.description + '</p>\n' +
                    '                       <div class="row">\n' +
                    '                           <div class="col-9">\n' +
                    '                               <p class="author mt-3">by <b>' + item.by_prescription + '</b></p>\n' +
                    '                           </div>\n' +
                    '                           <div class="col-3 text-right">\n' +
                    '                               <div class="btn btn-warning btn-fab btn-round add-shopping-cart" data-item-id="' + item.id + '" rel="tooltip" data-placement="left" data-original-title="Add to Basket">\n' +
                    '                                   <i class="material-icons">add_shopping_cart</i>\n' +
                    '                               </div>\n' +
                    '                           </div>\n' +
                    '                       </div>\n' +
                    '                   </div>\n' +
                    '               </div>\n' +
                    '           </div>';
                $('#' + listTypes[item.type] + '_items').append(template);
            } else {
                template += '<div class="row mt-3">\n' +
                    '            <div class="col-md-4">\n' +
                    '                <div class="card-header card-header-image">\n' +
                    '                    <a>\n' +
                    '                        <img class="img img-raised" src="' + item.img + '">\n' +
                    '                    </a>\n' +
                    '                    <div class="colored-shadow" style="background-image: url(' + item.img + '); opacity: 1;"></div>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '            <div class="col-md-8 mt-3">\n' +
                    '                <h3 class="card-title">\n' +
                    '                    <div class="row">' +
                    '                        <div class="col-8">' +
                    '                            <a>' + item.name + '</a>\n' +
                    '                        </div>' +
                    '                        <div class="col-4">' +
                    '                            <a class="text-primary">€' + item.cost.eur + ' | $' + item.cost.usd + '</a>\n' +
                    '                        </div>' +
                    '                    </div>' +
                    '                </h3>\n' +
                    '                <p class="card-tags">\n' +
                    '                    <a>' +
                    '                       <span class="badge badge-pill badge-info">' + item.tags + '</span>' +
                    '                    </a>\n' +
                    '                </p>\n' +
                    '                <p class="card-description">' + item.description + '</p>\n' +
                    '                <div class="row">' +
                    '                    <div class="col-9">' +
                    '                        <p class="author mt-3"><b>Promotion period from ' + item.from + ' to ' + item.to + '</b></p>\n' +
                    '                    </div>' +
                    '                    <div class="col-3 text-right">' +
                    '                        <div class="btn btn-warning btn-fab btn-round add-shopping-cart" data-item-id="' + item.id + '" rel="tooltip" data-placement="left" data-original-title="Add to Basket">\n' +
                    '                            <i class="material-icons">add_shopping_cart</i>\n' +
                    '                        </div>\n' +
                    '                    </div>' +
                    '                </div>' +
                    '            </div>\n' +
                    '        </div>';

                $('#promotion_items').append(template);
            }
        });
    }

    buildBasket(data) {
        var template = '';
        var eur_sum = 0;
        var usd_sum = 0;

        data.forEach(function (row) {
            eur_sum += row.item.cost.eur * row.count;
            usd_sum += row.item.cost.usd * row.count;

            template += '<tr data-id-tr="' + row.item.id + '">\n' +
                '            <td>\n' +
                '                <a href="#pants"><b>' + row.item.name + '</b></a>\n' +
                '                <div class="img-container">\n' +
                '                    <img src="' + row.item.img + '">\n' +
                '                </div>\n' +
                '            </td>\n' +
                '            <td class="td-number text-center">\n' +
                '                €' + row.item.cost.eur + ' | $' + row.item.cost.usd + '\n' +
                '            </td>\n' +
                '            <td class="td-number text-center">\n' +
                '                <a class="basket-row-count">' + row.count + '</a>\n' +
                '                <div class="btn-group btn-group-sm ml-auto mr-auto">\n' +
                '                    <button class="btn btn-round btn-info basket-sub-count"> <i class="material-icons">remove</i> </button>\n' +
                '                    <button class="btn btn-round btn-info basket-add-count"> <i class="material-icons">add</i> </button>\n' +
                '                </div>\n' +
                '            </td>\n' +
                '            <td class="td-number">\n' +
                '                <span class="basket-row-sum">€' + row.item.cost.eur * row.count + ' | $' + row.item.cost.usd * row.count + '</span>\n' +
                '            </td>\n' +
                '            <td class="td-actions text-right">\n' +
                '                <button type="button" rel="tooltip" data-placement="left" title="" class="btn btn-link basket-remove-item" data-original-title="Remove item">\n' +
                '                    <i class="material-icons">close</i>\n' +
                '                </button>\n' +
                '            </td>\n' +
                '        </tr>';
        });

        if (data.length > 0) {
            template += '<tr>\n' +
                '            <td class="td-total">Total</td>\n' +
                '            <td colspan="1" class="td-price">\n' +
                '                €' + eur_sum + ' | $' + usd_sum + '\n' +
                '            </td>\n' +
                '            <td colspan="1"></td>\n' +
                '            <td colspan="2" class="text-right">\n' +
                '                <button type="button" class="btn btn-info btn-round btn-tab">Complete Purchase <i class="material-icons">keyboard_arrow_right</i></button>\n' +
                '            </td>\n' +
                '        </tr>'
        }

        $('tbody').empty().append(template);
        initActions();
    }

    buildHistoryModal() {
        var template = '<div class="row">\n' +
            '               <div class="col-md-8 col-sm-12 text-center ml-auto mr-auto">\n' +
            '                   <div class="form-group">\n' +
            '                       <div class="input-group">\n' +
            '                           <div class="input-group-prepend">\n' +
            '                               <span class="input-group-text">\n' +
            '                                   <i class="material-icons">phone</i>\n' +
            '                               </span>\n' +
            '                           </div>\n' +
            '                           <input id="phone-history" type="number" required="true" number="true" class="form-control" placeholder="Phone *">\n' +
            '                       </div>\n' +
            '                   </div>\n' +
            '                   <div class="category form-category">* Required fields</div>\n' +
            '                   <br>\n' +
            '                   <div class="row">\n' +
            '                       <button type="button" class="btn btn-danger btn-round ml-auto mr-auto get-history">Run</button>\n' +
            '                   </div>\n' +
            '               </div>\n' +
            '           </div>';

        $('.history-body').empty().append(template);
        $('.get-history').on('click', getHistory);
    }

    buildHistoryItems(data) {
        var template = '<hr>';

        data.forEach(function (order) {
            template += '<div class="row">' +
                '            <div class="col-md-12">' +
                '                <p class="author">' + order.created_at + ' for <b>' + order.name + '</b></p>' +
                '                <p class="author">to <b>' + order.address + '</b></p>' +
                '                <div class="row">\n' +
                '                    <div class="col-md-1"></div>' +
                '                    <div class=" col-md-11">' +
                '                        <div class="table-responsive">' +
                '                            <table class="table table-shopping">\n' +
                '                                <thead>\n' +
                '                                    <tr>\n' +
                '                                        <th class="text-center">Product</th>\n' +
                '                                        <th class="text-center">Quantity</th>\n' +
                '                                    </tr>\n' +
                '                                </thead>\n' +
                '                                <tbody>';

            order.items.forEach(function (item) {
                template += '<tr>' +
                            '    <td class="text-center">' + item.name + '</td>' +
                            '    <td class="text-center">' + item.count + '</td>' +
                            '</tr>'
                ;
            });

            template += '                        </tbody>\n' +
                '                            </table>\n' +
                '                        </div>' +
                '                    </div>' +
                '                </div>' +
                '                <p class="author">total cost: <b>€' + order.total_sum_eur+ ' | $' + order.total_sum_usd + '</b></p>' +
                '            </div>' +
                '         </div>' +
                '<hr>'
            ;
        });

        $('.history-body').empty().append(template);
    }
}

var Render = new RenderItems();
