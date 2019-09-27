import flatpickr from "flatpickr";
import { Russian } from "flatpickr/dist/l10n/ru.js"

$(function(){


    flatpickr(".datetimepicker", {
        locale: Russian,
        allowInput: true,
        dateFormat: "Y-m-d H:i:S",
        enableTime: true,
        time_24hr: true,
        altInput: true,
        altFormat: "j F Y, H:i",
        defaultSeconds: 0,
        wrap: true
    });

    flatpickr(".datepicker", {
        locale: Russian,
        allowInput: true,
        dateFormat: "Y-m-d H:i:S",
        altInput: true,
        altFormat: "j F Y",
        defaultHour: 0,
        defaultMinute: 0,
        defaultSeconds: 0,
        wrap: true
    });

});
