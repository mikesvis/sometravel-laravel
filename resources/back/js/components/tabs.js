$('a[role="tab"]').on('shown.bs.tab', function (e) {
    // e.target // newly activated tab
    // e.relatedTarget // previous active tab
})

$('a[role="tab"]').on('shown.bs.tab', function (e) {
    hash = $(e.target).attr('href').substring($(e.target).attr('href').indexOf('#'));
    $('input[type="hidden"][name="tabToGo"]').val(hash);
});
