import {
    PATHS,
    FOLDER_NAME,
    URI_FOLDER_NAME
} from '/SanNicolasBIS/assets/util/frontend/client.util.js'

const doc = $(document)

doc.ready(function() 
{
    queryGenderStatistic()
    queryPurokPopulationStatistic()
})

function queryGenderStatistic()
{  
    $.ajax({
        type: 'post',
        url: URI_FOLDER_NAME + PATHS['API_PATH'] + 'api.database.php',
        data: { func: 'GET_STATISTIC_GENDER' },
        success: function (response) 
        {
            console.log(response)
            setGenderChart(response)
        },
        error: function (error) 
        {  
            console.log(error)
        }
    });
}

function setGenderChart(data)
{
    var xlabels = ['Male', 'Female' ];
    var yvalues = [data['male'], data['female']];
    var barColors = [
        '#1640D6',
        '#ED5AB3',
    ];
    
    new Chart('gender-chart', {
        type: 'pie',
        data: {
            labels: xlabels,
            datasets: [{
                backgroundColor: barColors,
                data: yvalues
            }]
        }
    })
}

function queryPurokPopulationStatistic()
{  
    $.ajax({
        type: 'post',
        url: URI_FOLDER_NAME + PATHS['API_PATH'] + 'api.database.php',
        data: { func: 'GET_STATISTIC_PUROK_POPULATION' },
        success: function (response) 
        {
            console.log(response)
            setPurokPopulationChart(response)
        },
        error: function (error) 
        {  
            console.log(error)
        }
    });
}

function setPurokPopulationChart(data)
{
    var xlabels = ['Purok 1', 'Purok 2', 'Purok 3', 'Purok 4', 'Purok 5', 'Purok 6', 'Purok 7'];
    var yvalues = [data['purok1'], data['purok2'], data['purok3'], data['purok4'], data['purok5'], data['purok6'], data['purok7']];
    
    new Chart('purok-pop-chart', {
        type: 'bar',
        data: {
            labels: xlabels,
            datasets: [{
                data: yvalues,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            legend: {
                display: false
            },
        }
    })
}