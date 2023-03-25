function hideDiv(element) {
    $(`#${element}`).fadeOut();
}

setTimeout(function () {
    hideDiv('email-exists')
}, 3000);