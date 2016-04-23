$(function() {
    $( '#morris-donut-chart' ).length > 0 ?
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Portrait Pictures",
            value: 12
        }, {
            label: "Events Pictures",
            value: 30
        }, {
            label: "Nature Pictures",
            value: 79
        }, {
            label: "Snapshot Pictures",
            value: 5
        }, {
            label: "Models Pictures",
            value: 46
        }],
        resize: true
    }) : null;

    $( '#morris-bar-chart' ).length > 0 ?
        Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    }) : null;
});
