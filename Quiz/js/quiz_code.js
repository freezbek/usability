window.onload = function () {


    var testName = document.getElementsByTagName('h1');
    var testChapter = document.getElementsByTagName('h2');
    var question = document.getElementsByTagName('h3');

    let second_a = 0, second_b = 0, second_c = 0, second_d = 0;
    let third_a = 0, third_b = 0, third_c = 0;
    let fourth_a = 0, fourth_b = 0, fourth_c = 0;

    testChapter = testChapter[0];
    testChapter.innerText = test_chapter_name[1];
    question = question[0];
    question.innerText = '1. С кем или с чем Вы бы хотели работать? Какой объект деятельности Вас привлекает?';
    testName = testName[0];
    testName.innerText = 'Дистанционное тестирование по теме «Карьерный потенциал»';

    let result = {};
    let step = 0;

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
            } else {
                result[event.target.dataset.v] = 0;
            }
            step++;

            if (step === quiz.length) {
                document.querySelector('.question').remove();
                document.querySelector('.answer').remove();
                testChapter.remove();
                testName.remove();
                showResult();
            } else {
                showQuestion();
            }
        }
        if (event.target.classList.contains('reload-button')) {
            location.reload(result[event.target.dataset.v]);
        }
        if (step >= 10 && step < 20) {
            question.textContent = '2. Чем бы Вы хотели заниматься? Какой вид деятельности Вас привлекает?';
        }
        if (step >= 20 && step < 40) {
            testChapter.textContent = test_chapter_name[2];
            question.textContent = '';
            if (event.target.dataset.v == "_a") {
                second_a++;
            }
            if (event.target.dataset.v == '_b') {
                second_b++;
            }
            if (event.target.dataset.v == '_c') {
                second_c++;
            }
            if (event.target.dataset.v == '_d') {
                second_d++;
            }
        }
        //   if (step === 40)
        //      showResult();

        if (step >= 40 && step < 80) {
            testChapter.textContent = test_chapter_name[3];
            //question.textContent = '';
            if (event.target.dataset.v == '_a') {
                third_a++;
            }
            if (event.target.dataset.v == '_b') {
                third_b++;
            }
            if (event.target.dataset.v == '_c') {
                third_c++;
            }
        }
        if (step >= 80 && step < 101) {
            testChapter.textContent = test_chapter_name[4];
            //question.textContent = '';
            if (event.target.dataset.v == '_a') {
                fourth_a++;
            }
            if (event.target.dataset.v == '_b') {
                fourth_b++;
            }
            if (event.target.dataset.v == '_c') {
                fourth_c++;
            }
        }
        console.log(second_a, second_b, second_c, second_d, "второй метод");
        console.log(third_a, third_c, third_b, third_c, "третий метод");
        console.log(fourth_a, fourth_b, fourth_c, "четвёртый метод");
    }

    function showResult() {
        let key = Object.keys(result).reduce(function (a, b) {
            return result[a] > result[b] ? a : b
        });


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


        //графики


        var second_chapter = document.getElementById('second_chapter').getContext('2d');
        let blue = 'rgb(57,156,215,1)';
        var second_method = new Chart(second_chapter, {
            type: 'horizontalBar',
            data: {
                labels: ['Навязанная', 'Мараторий', 'Сформированная', 'Неопределённая'],
                datasets: [{
                    label: 'Статус профессиональный идентичности',
                    data: [second_a, second_b, second_c, second_d],
                    backgroundColor: blue,
                    /*
                    borderColor: [
                        blue,
                        blue,
                        blue,
                        blue
                    ],
                    */
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        stacked: true
                    }]
                }
            }
        })


        var third_chapter = document.getElementById('third_chapter').getContext('2d');
        var chapter_3 = new Chart(third_chapter, {
            type: 'horizontalBar',
            data: {
                labels: ['Доброжелательность', 'Сознательность', 'Открытость', 'Нейротизм', 'Экстраверсия'],
                datasets: [{
                    //        label: 'Статус профессиональный идентичности',
                    data: [third_a, third_b, third_c, 4, 5], // change 4,5
                    backgroundColor: blue, //[blue,blue,red,green] to color every label
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });

        var fourth_chapter = document.getElementById('fourth_chapter').getContext('2d');
        var chapter_4 = new Chart(fourth_chapter, {
            type: 'horizontalBar',
            data: {
                labels: ['Внешняя', 'Учебная', 'Социальная', 'Статусная', 'Прагматичная', 'Коммуникативная', 'Профессиональная'],
                datasets: [{
                    //     label: 'Статус профессиональный идентичности',
                    data: [fourth_a, fourth_b, fourth_c, 8, 6, 6, 7], // change 4,5
                    backgroundColor: blue,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        //      ticks: {
                        //        // beginAtZero: true
                        //     }
                        stacked: true
                    }]
                }
            }
        });

        console.log(key);

    }

    showQuestion();
}

