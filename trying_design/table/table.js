$(document).ready(function () {
var table = $('#table');
$('#table-bordered').change(function () {
  var value = $(this).val();
  table.removeClass('table-bordered').addClass(value);
});
$('#table-striped').change(function () {
  var value = $(this).val();
  table.removeClass('table-striped').addClass(value);
});
$('#table-hover').change(function () {
  var value = $(this).val();
  table.removeClass('table-hover').addClass(value);
});
$('#table-color').change(function () {
  var value = $(this).val();
  table.removeClass(/^table-mc-/).addClass(value);
});
});
(function (removeClass) {
jQuery.fn.removeClass = function (value) {
  if (value && typeof value.test === 'function') {
      for (var i = 0, l = this.length; i < l; i++) {
          if (window.CP.shouldStopExecution(2)) {
              break;
          }
          var elem = this[i];
          if (elem.nodeType === 1 && elem.className) {
              var classNames = elem.className.split(/\s+/);
              for (var n = classNames.length; n--;) {
                  if (window.CP.shouldStopExecution(1)) {
                      break;
                  }
                  if (value.test(classNames[n])) {
                      classNames.splice(n, 1);
                  }
              }
              window.CP.exitedLoop(1);
              elem.className = jQuery.trim(classNames.join(' '));
          }
      }
      window.CP.exitedLoop(2);
  } else {
      removeClass.call(this, value);
  }
  return this;
};
}(jQuery.fn.removeClass));
