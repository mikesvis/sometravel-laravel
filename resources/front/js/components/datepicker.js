window.moment = require('moment');
require('tempusdominus-bootstrap-4');

var icons = {
    time: 'far fa-clock',
    date: 'far fa-calendar',
    up: 'fas fa-arrow-up',
    down: 'fas fa-arrow-down',
    previous: 'fas fa-chevron-left',
    next: 'fas fa-chevron-right',
    today: 'far fa-calendar-check',
    clear: 'fas fa-trash',
    close: 'fas fa-times'
};

var buttons = {
    showToday: false,
    showClear: false,
    showClose: true
}

$(function(){

    $('.is-datepicker').datetimepicker({
        locale: 'ru',
        pickTime: false,
        keepInvalid: true,
        allowInputToggle: true,
        buttons,
        icons
    });
});
