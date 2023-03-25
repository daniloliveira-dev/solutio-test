function hideDiv(element) {
  $(`#${element}`).fadeOut();
}

setTimeout(function () {
  hideDiv('message')
}, 3000);

setTimeout(function () {
  hideDiv('error')
}, 3000);

setTimeout(function () {
  hideDiv('info')
}, 3000);