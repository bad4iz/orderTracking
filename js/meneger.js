function setDateMain(that) { // пишем в базу дату создания заявки
    const text = {
        id: that.dataset.main_id,
        dateMain: that.value
    };
    httpPost('order-tracking/menegerRouter', 'setDateMain=' + JSON.stringify(text), function () {
        location.reload();
    });
}


function setInitiator(that) { // пишем в базу инициатора
    const text = {
        id: that.dataset.main_id,
        initiator: that.value
    };
    // console.log(text);
    httpPost('order-tracking/menegerRouter', 'setInitiator=' + JSON.stringify(text), function() {
        location.reload();
    });
}

// наименование товара (общее)
function setProductName(that) {
    const text = {
        id: that.dataset.main_id,
        productName: that.value
    };

    httpPost('order-tracking/menegerRouter', 'setProductName=' + JSON.stringify(text), function() {
        location.reload();
    });
}
// поставщик
function setSupplier(that) {
    const text = {
        id: that.dataset.main_id,
        supplier: that.value
    };

    httpPost('order-tracking/menegerRouter', 'setSupplier=' + JSON.stringify(text), function() {
        location.reload();
    });
}
// стоимость товара по наклодной
function setCost(that) {
    const text = {
        id: that.dataset.main_id,
        cost: that.value
    };

    httpPost('order-tracking/menegerRouter', 'setCost=' + JSON.stringify(text), function() {
        location.reload();
    });
}


// ориентировачная дата поставки
function setEstimatedDeliveryDate(that) {
    const text = {
        id: that.dataset.main_id,
        estimatedDeliveryDate: that.value
    };

    httpPost('order-tracking/menegerRouter', 'setEstimatedDeliveryDate=' + JSON.stringify(text), function() {
        location.reload();
    });
}


function addTrClick() {
    const button = document.getElementById('addTr');
    if (button) {
        button.onclick = function () {
            httpPost('order-tracking/menegerRouter', 'createItem=' + JSON.stringify('createItem'), function (it) {
                // console.log(it);
                location.reload();
            });
        };
    }
}


function switchHide() { // переключатель визиблhttp://78.24.41.47:8082
    const toggles = document.querySelectorAll('.switchHide');
    toggles.forEach(toggle => {
        toggle.ondblclick = function () {
            const [one, two] = toggle.children;
            one.style.display = '';
            two.style.display = 'none';
            one.focus();
            function job() {
                console.log('job');
                switch (one.name) {
                    // дата заявки
                    case 'setDateMain':
                        two.style.display = '';
                        one.style.display = 'none';
                        if (one.value !== two.textContent) {
                            setDateMain(one);
                        }
                        break;

                    // наименование товара (общее)
                    case 'productName':
                        two.style.display = '';
                        one.style.display = 'none';
                        if (one.value !== two.textContent) {
                            setProductName(one);
                        }
                        break;

                    // поставщик
                    case 'supplier':
                        two.style.display = '';
                        one.style.display = 'none';
                        if (one.value !== two.textContent) {
                            setSupplier(one);
                        }
                        break;
       // стоимость товара по наклодной
                    case 'cost':
                        two.style.display = '';
                        one.style.display = 'none';
                        if (one.value !== two.textContent) {
                            setCost(one);
                        }
                        break;
       // ориентировачная дата поставки
                    case 'estimatedDeliveryDate':
                        two.style.display = '';
                        one.style.display = 'none';
                        if (one.value !== two.textContent) {
                            setEstimatedDeliveryDate(one);
                        }
                        break;

                    default :
                }
            }

            document.onkeyup = function (event) {
                const e = event || window.event;
                if (e.keyCode === 13) {
                    job();
                }
                return false;
            };
            one.onblur = job;
            // one.onchange = job;
        };
    });
}

function selectedInput() { // переключатель визиблhttp://78.24.41.47:8082
    const toggles = document.querySelectorAll('select');
    toggles.forEach(toggle => {
        toggle.onclick = function () {
                switch (toggle.name) {
                        // инициатор заявки
                    case 'initiator':
                            setInitiator(toggle);
                        break;

                    default :
                }
        };
    });
}


window.onload = function () {
    switchHide();
    selectedInput();
    addTrClick();
};
