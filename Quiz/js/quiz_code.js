window.onload = function () {
    var h_2 = document.getElementsByTagName('h2');
    var h_3 = document.getElementsByTagName('h3');

    var second_metodic_a=0;var second_metodic_b=0; var second_metodic_c=0;var second_metodic_d=0;
    var third_metodic_a=0;var third_metodic_b=0; var third_metodic_c=0;
    var fourth_metodic_a=0;var fourth_metodic_b=0; var fourth_metodic_c=0;

    h_2 = h_2[0];
    h_2.innerText = 'Методика 1. «Матрица выбора профессии» ';
    h_3 = h_3[0];
    h_3.innerText = '1. С кем или с чем Вы бы хотели работать? Какой объект деятельности Вас привлекает?';

    let result = {};
    let step = 20;
    function showQuestion(questionNumber) {
        document.querySelector('.question').innerHTML = quiz[step]['q'];
        let answer = '';
        for (let key in quiz[step]['a']) {
            answer += `<li data-v='${key}' class="answer-variant">${quiz[step]['a'][key]}</li>`;
        }
        document.querySelector('.answer').innerHTML = answer;

    }

    document.onclick = function (event) {
        event.stopPropagation();
        if (event.target.classList.contains('answer-variant') && step < quiz.length) {
            
            if (result[event.target.dataset.v] != undefined) {
                result[event.target.dataset.v]++;
            }
            else {
                result[event.target.dataset.v] = 0;
            }
            step++;
            if (step == quiz.length) {
                document.querySelector('.question').remove();
                document.querySelector('.answer').remove();
                showResult();
            }
            else {
                showQuestion();
            }
           // console.log( result[event.target]);
        }
        if (event.target.classList.contains('reload-button')) {
            location.reload(result[event.target.dataset.v]);
        }
        //if (step <10) {}
        if (step >= 10 && step < 20) {
            h_3.textContent = '2. Чем бы Вы хотели заниматься? Какой вид деятельности Вас привлекает?';
        }
        if (step >= 20 && step < 40) {
            h_2.textContent = 'Методика 2. «Изучение статусов профессиональной идентичности»';
            h_3.textContent = '';
             if (event.target.dataset.v == "_a") {second_metodic_a++;}
            if (event.target.dataset.v == '_b') {second_metodic_b++;}
             if (event.target.dataset.v == '_c') {second_metodic_c++;}
              if (event.target.dataset.v == '_d') {second_metodic_d++;}
        }
        if (step >= 40 && step < 80) {
            h_2.textContent = 'Методика 3.  «Большая пятерка личностных качеств»';
            h_3.textContent = '';
            if (event.target.dataset.v == '_a') {third_metodic_a++;}
            if (event.target.dataset.v == '_b') {third_metodic_b++;}
             if (event.target.dataset.v == '_c') {third_metodic_c++;}
        }
        if (step >= 80 && step <121) {
            h_2.textContent = 'Методика 4. «Мотивация выбора профессии» ';
            h_3.textContent = '';
            if (event.target.dataset.v == '_a') {fourth_metodic_a++;}
            if (event.target.dataset.v == '_b') {fourth_metodic_b++;}
             if (event.target.dataset.v == '_c') {fourth_metodic_c++;}
        }
        //console.log(result);
        console.log(second_metodic_a,second_metodic_b,second_metodic_c,second_metodic_d,"второй метод");
        //console.log(third_metodic_a,third_metodic_c,third_metodic_b,third_metodic_c,"третий метод");
        //console.log(fourth_metodic_a,fourth_metodic_b,fourth_metodic_c,"четвёртый метод");
    }

    function showResult() {
        let key = Object.keys(result).reduce(function (a, b) { return result[a] > result[b] ? a : b });
        let div = document.createElement('div');
        div.classList.add('result');
        div.innerHTML = answers[key]['description'];
        document.querySelector('main').appendChild(div);

        let img = document.createElement('img');
        img.src = 'images/' + answers[key]['image'];
        img.classList.add('result-img')
        document.querySelector('main').appendChild(img);

        let reloadButton = document.createElement('button');
        reloadButton.innerHTML = 'New quiz';
        reloadButton.classList.add('reload-button');
        document.querySelector('main').appendChild(reloadButton);

        var ctx = document.getElementById('myChart').getContext('2d');
        var chartOptions = {
          scales: {
            yAxes: [{
              barPercentage: 0.5,
              gridLines: {
                display: false
              }
            }],
            xAxes: [{
              gridLines: {
                zeroLineColor: "black",
                zeroLineWidth: 2
              },
              ticks: {
                min: 0,
                max: 6500,
                stepSize: 1
              },
              scaleLabel: {
                display: true,
                labelString: "Density in kg/m3"
              }
            }]
          },
          elements: {
            rectangle: {
              borderSkipped: 'left',
            }
          }
        };
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ['a', 'b','c','d',],
                datasets: [{
                    label: 'Вторая методика',
                    backgroundColor: 'rgb(255,99,132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [second_metodic_a,second_metodic_b,second_metodic_c,second_metodic_d]
       }]
            },

            // Configuration options go here
            options: {}
         });
        console.log(key);
    }
    showQuestion();
}


