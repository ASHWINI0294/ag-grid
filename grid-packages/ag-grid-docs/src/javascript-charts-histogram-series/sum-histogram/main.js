
var options = {
    container: document.getElementById('myChart'),
    title: {
        text: 'Prize money distribution'
    },
    subtitle: {
        text: 'Total winnings by participant age'
    },
    data: histogramData,
    series: [{
        type: 'histogram',
        xKey: 'age',
        xName: 'Participant Age',
        yKey: 'winnings',
        yName: 'Winnings'
    }],
    legend: {
        enabled: false
    },
    axes: [
        {
            type: 'number',
            position: 'bottom',
            title: { text: 'Age band (years)' }
        },
        {
            type: 'number',
            position: 'left',
            title: { text: 'Total winnings (USD)' }
        },
    ],
    height: 550
};

agCharts.AgChart.create(options);