$('a[role="tab"]').on('shown.bs.tab', function (e) {
    hash = $(e.target).attr('href').substring($(e.target).attr('href').indexOf('#'));
    $('input[type="hidden"][name="tabToGo"]').val(hash);
});
