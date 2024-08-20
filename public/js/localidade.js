//FUNÇÃO QUE GERA O GRÁFICO POSITIVIDADE POR SEMANA
function dashLocalidade(){
    //gerando as 52 labels de semanas
    let semanas = []
    let i = 0
    while(i<52){
        i++
        semanas.push(i)
    }

    //teste com dados falsos, apagar depois
    let datas = []
    let datas2 = []
    let datas3 = []

    let cont = 0
    let data = 1000
    let data2 = 2100
    let data3 = 1600

    while(cont<52){
        cont++

        data = data + 300
        data2 = data2 + 150
        data3 = data3 + 124

        if(data > 7000){
            data = 3400
        }
        if(data2 > 5600){
            data2 = 3100
        }
        if(data3 > 6200){
            data3 = 2400
        }

        datas.push(data)
        datas2.push(data2)
        datas3.push(data3)
    }
    //---------------------------------------------


    //gerando o gráfico
    var ctxPie = document.getElementById('positivos').getContext('2d');
    var pieChart = new Chart(ctxPie, {
        type: 'line',
        data: {
            labels: semanas,

            //Configurações dos dados
            datasets: [
                {
                    label: 'Positivos 2022',
                    data: datas,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                },

                {
                    label: 'positivos 2023',
                    data: datas2,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                },
            
                {
                    label: 'positivos 2024',
                    data: datas3,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                },
            ],
        },



        //ESTILIZAÇÃO GERAL DO GRÁFICO
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Positividade por semana',
                    color: '#2a9e7f',
                    font: {
                        size: 21,
                        family:'arial',
                    },
                    padding: {
                        top: 10,
                        bottom: 30
                    },
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false, // Remove as linhas verticais de grade
                    },
                },
                y: {
                    beginAtZero: false
                }
            }
        }
    });
}









//FUNÇÃO PARA GERAR O MAPA DE LOCALIDADES
function mapaLocalidades(){ 
    // Carrega o mapa base (usando GeoJSON)
    fetch('https://unpkg.com/world-atlas/countries-50m.json').then(response => response.json()).then(countries => {
        const countriesFeatures = ChartGeo.topojson.feature(countries, countries.objects.countries).features;

        // Dados de exemplo de pontos
        const dataPoints = [
            { name: 'Manaus', latitude: -3.119, longitude: -60.0217, value: 100 },
            { name: 'Parintins', latitude: -2.6283, longitude: -56.7359, value: 50 }
        ];

        // Configuração do gráfico
        const ctx = document.getElementById('mapaLocalidades').getContext('2d');
        const mapa = new Chart(ctx, {
            type: 'bubbleMap',  // Define o tipo de gráfico como um mapa de pontos
            data: {
                labels: dataPoints.map(point => point.name),
                datasets: [{
                    label: 'Cidades do Amazonas',
                    data: dataPoints.map(point => ({
                        latitude: point.latitude,
                        longitude: point.longitude,
                        radius: point.value / 10 // Escala o valor do ponto
                    })),
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    xy: {
                        projection: 'equalEarth'
                    }
                }
            }
        });
    });
}

dashLocalidade()
//mapaLocalidades()