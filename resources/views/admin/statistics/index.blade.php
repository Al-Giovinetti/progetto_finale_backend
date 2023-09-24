@extends('layouts.app')

@section('content')


<div style="width: 600px; margin: auto;">
    <canvas id="messageChart"></canvas>
    <canvas id="reviewChart"></canvas> 
    <canvas id="voteChart"></canvas> 

</div>



@endsection

@section('js')
<!-- <script type="module" src="dimensions.js"></script> -->
<script src="{{ mix('/js/mychart.js') }}"></script>
<script>

//grafico messaggi
var messageCtx = document.getElementById('messageChart').getContext('2d');
    var messageCounts = @json($messageCounts);
    const messageData = {
        labels: @json($messageCounts->keys()),
        datasets: [{
            label: 'Numero di messaggi Ricevuti',
            backgroundColor: getRandomColor(), 
            borderColor: 'rgb(255, 99, 132)',
            data: @json($messageCounts->values()), 
        }]
    };


    
    
    
    //grafico recensioni
    var reviewCtx = document.getElementById('reviewChart').getContext('2d');
        var reviewCounts = @json($reviewCounts);
        const reviewData = {
            labels: @json($reviewCounts->keys()),
            datasets: [{
                label: 'Numero di recensioni Ricevute',
                backgroundColor: getRandomColor(), 
                borderColor: 'rgb(75, 192, 192)',
                data: @json($reviewCounts->values()), 
            }]
        };



    //grafico voti
    var voteCtx = document.getElementById('voteChart').getContext('2d');
    var votes = @json($votes);

    const months = Object.keys(votes);
    const fasce = Object.keys(votes[months[0]]);
    const voteData = {
        labels: months, 
        datasets: fasce.map(fascia => ({
        label: `Fascia ${fascia}`, 
        backgroundColor: getRandomColor(), 
        borderColor: 'rgb(255, 99, 132)',
        data: months.map(month => votes[month][fascia] || 0),
    })),
    };
    
    function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

</script>
@endsection

