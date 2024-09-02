//SEPARADOR DE MILHAR, TROCAR VÍRGULA POR PONTO
//Trocar vírgua por ponto
/*
function formatarNumeros(){
    let numeros = document.querySelectorAll("h4")
    let arr = []
    numeros.forEach((numero, i)=>{
        arr.push(numero.innerHTML)
        numero = arr[i].replace(',','.')
    }) 
}
*/










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
    // Inicialize o mapa e defina a visualização inicial
    const mapa = L.map('mapaLocalidades').setView([-3.1190275, -60.0217314], 11); // Coordenadas de Manaus

    // Adicione uma camada de mapa (Tile Layer)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
    }).addTo(mapa);

    // Adicione marcadores (pontos) no mapa
    let latitude = "-3.145377"
    let longitude = "-60.054570"
    let positivo = 20
    
    const marker1 = L.marker([-3.1190275, -60.0217314]).addTo(mapa).bindPopup('Ponto 1');
    const marker2 = L.marker([-3.135475, -60.019189]).addTo(mapa).bindPopup('Ponto 2');
    const marker3 = L.marker([-3.108475, -60.045028]).addTo(mapa).bindPopup('Ponto 3');
    const marker4 = L.marker([-3.145377, -60.054570]).addTo(mapa).bindPopup(`Latitude: ${latitude}<br>Longitude: ${longitude}<br> Positivos: ${positivo}`);   
}

//formatarNumeros()
dashLocalidade()
mapaLocalidades()