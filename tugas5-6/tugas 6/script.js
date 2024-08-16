var selectedItems = [];
var totalCostElement = document.getElementById('total-cost');

function updateOrderList() {
    var orderList = document.getElementById('order-list');
    var totalCost = 0;

    orderList.innerHTML = '';

    selectedItems.forEach(function (item) {
        var li = document.createElement('li');
        li.className = 'list-group-item';
        li.innerHTML = `Menu ${item.name} - ${formatCurrency(item.price * item.quantity)}`;
        orderList.appendChild(li);
        totalCost += item.price * item.quantity;
    });

    totalCostElement.textContent = formatCurrency(totalCost);
}

function tambahMenu(id, price, name) {
    var selectedItem = selectedItems.find(function (item) {
        return item.id === id;
    });

    if (selectedItem) {
        selectedItem.quantity += 1;
    } else {
        selectedItems.push({ id: id, price: price, quantity: 1, name: name });
    }

    updateOrderList();
}

function kurangMenu(id) {
    var selectedItem = selectedItems.find(function (item) {
        return item.id === id;
    });

    if (selectedItem) {
        if (selectedItem.quantity > 1) {
            selectedItem.quantity -= 1;
        } else {
            selectedItems = selectedItems.filter(item => item.id !== id);
        }
    }

    updateOrderList();
}

function bayar() {
    var totalCost = calculateTotalCost();
    alert('Total Pembayaran: ' + formatCurrency(totalCost));
    selectedItems = [];
    updateOrderList();
}

function calculateTotalCost() {
    var totalCost = 0;
    selectedItems.forEach(function (item) {
        totalCost += item.price * item.quantity;
    });
    return totalCost;
}

function formatCurrency(amount) {
    return 'Rp ' + new Intl.NumberFormat('id-ID').format(amount);
}
