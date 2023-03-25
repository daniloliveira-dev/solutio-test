function hideDiv(element) {
    $(`#${element}`).fadeOut();
}

setTimeout(function () {
    hideDiv('updated')
}, 3000);

setTimeout(function () {
    hideDiv('deleted')
}, 3000);

setTimeout(function () {
    hideDiv('new-user')
}, 3000);