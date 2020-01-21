class BasketItems {

    constructor() {
        this._items = [];
    }

    add(object) {
        var id = $(object).data('itemId');

        if (id in this._items) {
            this._items[id] += 1;
        } else {
            this._items[id] = 1;
        }
    }

    get() {
        return this._items;
    }

    getItems() {
        var items = [];

        this._items.forEach(function (value, key) {
            items.push({
                item: Api.getProduct(key),
                count: value
            })
        });

        return items;
    }

    addCount(object) {
        var block = $(object).closest('tr');
        var id = block.data('idTr');
        var count = 0;

        this._items.filter(function(value, key) {
            if (key === id) {
                count = value;
            }
        });

        this._items[id] = count + 1;
        Render.buildBasket(Basket.getItems());
    }

    subCount(object) {
        var block = $(object).closest('tr');
        var id = block.data('idTr');
        var count = 0;

        this._items.filter(function(value, key) {
            if (key === id) {
                count = value;
            }
        });

        if (count > 1) {
            this._items[id] = count - 1;
        }

        Render.buildBasket(Basket.getItems());
    }

    removeItem(object) {
        var block = $(object).closest('tr');
        var id = block.data('idTr');

        delete this._items[id];
        Render.buildBasket(Basket.getItems());
    }

    clear() {
        this._items = [];
        Render.buildBasket(Basket.getItems());
    }
}

var Basket = new BasketItems();
