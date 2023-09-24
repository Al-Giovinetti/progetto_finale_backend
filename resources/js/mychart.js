import Chart from 'chart.js/auto';




new Chart(messageCtx, {
    type: 'line',
    data: messageData,
    options: {}
});

new Chart(reviewCtx, {
    type: 'line',
    data: reviewData,
    options: {}
});

new Chart(voteCtx, {
    type: 'bar',
    data: voteData,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});