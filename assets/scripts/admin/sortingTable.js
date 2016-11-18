$(function () {

    //$.tablesorter.addParser({
    //    id: 'getDate',
    //    is: function (sort) { return false },
    //    format: function (sort, table, cell, cellIndex) { return $(cell).attr('data-date'); },
    //    type:'text'
    //})

    $('table.admin-table').tablesorter();
})