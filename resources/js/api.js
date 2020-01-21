class ApiRequests {

    constructor() {
        this._products = [];
    }

    getProducts() {
        //this._products = ajaxRequest('http://pizza.local/api/products', 'GET');
        this._products = ajaxRequest('https://pizza-task-shpachenko.herokuapp.com/api/products', 'GET');

        return this._products;
    }

    getProduct(id) {
        return this._products.filter(product => product.id === id)[0];
    }

    getHistoryOrders(data) {
        //return ajaxRequest('http://pizza.local/api/order/history', 'POST', data);
        return ajaxRequest('https://pizza-task-shpachenko.herokuapp.com/api/order/history', 'POST', data);
    }

    applyOrder(data) {
        //return ajaxRequest('http://pizza.local/api/order/store', 'POST', data);
        return ajaxRequest('https://pizza-task-shpachenko.herokuapp.com/api/order/store', 'POST', data);
    }
}

const Api = new ApiRequests();
