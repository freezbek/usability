window.onload = function () {


    var testName = document.getElementsByTagName('h1');
    var testChapter = document.getElementsByTagName('h2');
    var question = document.getElementsByTagName('h3');

    let second_a = 0, second_b = 0, second_c = 0, second_d = 0;


    //chapter_3
    let kindness = 0, consciousness = 0, openness = 0,
        neuroticism = 0, extroversion = 0;


    //chapter_4
    let external = 0, educational = 0, social = 0, status = 0,
        pragmatical = 0, communicate = 0, self_professional = 0;

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


        if (event.target.dataset.v == undefined && step != quiz.length)
            return showQuestion();
        else if (step == quiz.length)
            return;


        event.stopPropagation();
        if (event.target.classList.contains('answer-variant') && step < quiz.length) {

            if (result[event.target.dataset.v] != undefined) {
                result[event.target.dataset.v]++;
            } else {
                result[event.target.dataset.v] = 0;
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
            if (event.target.dataset.v === "_a") {
                second_a++;
            }
            if (event.target.dataset.v === '_b') {
                second_b++;
            }
            if (event.target.dataset.v === '_c') {
                second_c++;
            }
            if (event.target.dataset.v === '_d') {
                second_d++;
            }
        }

        if (step >= 40 && step < 80) {
            testChapter.textContent = test_chapter_name[3];
            var q_3 = step - 40;
            //a: +=0
            //b: +=1
            //c: +=2
            //kindness = 0, consciousness = 0, openness = 0, neuroticism = 0, extroversion = 0;
            let shit_happen = event.target.dataset.v;

            if (event.target.dataset.v === '_a') {


            } else if (event.target.dataset.v === '_b') {
                console.log("q_3 dataset expected: _b   dataset actual: ", event.target.dataset.v)
                //console.log(kindness)
                if (q_3 === 0 || q_3 === 5 || q_3 === 10 || q_3 === 15 || q_3 === 20 || q_3 === 25 || q_3 === 30 || q_3 === 35) {
                    kindness += 1;
                    console.log(kindness)
                } else if (q_3 === 1 || q_3 === 6 || q_3 === 11 || q_3 === 16 || q_3 === 21 || q_3 === 26 || q_3 === 31 || q_3 === 36)
                    consciousness += 1;
                else if (q_3 === 2 || q_3 === 7 || q_3 === 12 || q_3 === 17 || q_3 === 22 || q_3 === 27 || q_3 === 32 || q_3 === 37)
                    openness += 1;
                else if (q_3 === 3 || q_3 === 8 || q_3 === 13 || q_3 === 18 || q_3 === 23 || q_3 === 28 || q_3 === 33 || q_3 === 38)
                    neuroticism += 1;
                else if (q_3 === 4 || q_3 === 9 || q_3 === 14 || q_3 === 19 || q_3 === 24 || q_3 === 29 || q_3 === 34 || q_3 === 39)
                    extroversion += 1;


            } else if (event.target.dataset.v === '_c') {
                console.log("q_3 dataset expected: _c   dataset actual: ", event.target.dataset.v)

                if (q_3 === 0 || q_3 === 5 || q_3 === 10 || q_3 === 15 || q_3 === 20 || q_3 === 25 || q_3 === 30 || q_3 === 35) {
                    //console.log("WHATAHELL ARE YOU 2 DOING?")
                    kindness += 2;
                } else if (q_3 === 1 || q_3 === 6 || q_3 === 11 || q_3 === 16 || q_3 === 21 || q_3 === 26 || q_3 === 31 || q_3 === 36)
                    consciousness += 2;
                else if (q_3 === 2 || q_3 === 7 || q_3 === 12 || q_3 === 17 || q_3 === 22 || q_3 === 27 || q_3 === 32 || q_3 === 37)
                    openness += 2;
                else if (q_3 === 3 || q_3 === 8 || q_3 === 13 || q_3 === 18 || q_3 === 23 || q_3 === 28 || q_3 === 33 || q_3 === 38)
                    neuroticism += 2;
                else if (q_3 === 4 || q_3 === 9 || q_3 === 14 || q_3 === 19 || q_3 === 24 || q_3 === 29 || q_3 === 34 || q_3 === 39)
                    extroversion += 2;


            } else if (shit_happen !== '_a' && shit_happen !== '_b' && shit_happen !== '_c') {
                console.log("shit happend, event.target: ", shit_happen);
            }
        }

        if (step >= 80 && step < 101) {
            testChapter.textContent = test_chapter_name[4];
            //question.textContent = '';
            var question_4 = step - 80;
            if (event.target.dataset.v === '_a') {
                //govnokod arrives
                if (question_4 === 0 || question_4 === 7 || question_4 === 14)
                    self_professional += 3;
                else if (question_4 === 1 || question_4 === 8 || question_4 === 15)
                    communicate += 3;
                else if (question_4 === 2 || question_4 === 9 || question_4 === 16)
                    pragmatical += 3;
                else if (question_4 === 3 || question_4 === 10 || question_4 === 17)
                    status += 3;
                else if (question_4 === 4 || question_4 === 11 || question_4 === 18)
                    social += 3;
                else if (question_4 === 5 || question_4 === 12 || question_4 === 19)
                    educational += 3;
                else if (question_4 === 6 || question_4 === 13 || question_4 === 20)
                    external += 3;


            }
            if (event.target.dataset.v === '_b') {

                //govnokod arrives

                if (question_4 === 0 || question_4 === 7 || question_4 === 14)
                    self_professional += 2;
                else if (question_4 === 1 || question_4 === 8 || question_4 === 15)
                    communicate += 2;
                else if (question_4 === 2 || question_4 === 9 || question_4 === 16)
                    pragmatical += 2;
                else if (question_4 === 3 || question_4 === 10 || question_4 === 17)
                    status += 2;
                else if (question_4 === 4 || question_4 === 11 || question_4 === 18)
                    social += 2;
                else if (question_4 === 5 || question_4 === 12 || question_4 === 19)
                    educational += 2;
                else if (question_4 === 6 || question_4 === 13 || question_4 === 20)
                    external += 2;


            }
            if (event.target.dataset.v === '_c') {
                //govnokod arrives

                if (question_4 === 0 || question_4 === 7 || question_4 === 14)
                    self_professional += 1;
                else if (question_4 === 1 || question_4 === 8 || question_4 === 15)
                    communicate += 1;
                else if (question_4 === 2 || question_4 === 9 || question_4 === 16)
                    pragmatical += 1;
                else if (question_4 === 3 || question_4 === 10 || question_4 === 17)
                    status += 1;
                else if (question_4 === 4 || question_4 === 11 || question_4 === 18)
                    social += 1;
                else if (question_4 === 5 || question_4 === 12 || question_4 === 19)
                    educational += 1;
                else if (question_4 === 6 || question_4 === 13 || question_4 === 20)
                    external += 1;


            }
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
                    data: [kindness, consciousness, openness, neuroticism, extroversion],
                    backgroundColor: blue, //[blue,blue,red,green] to color every label
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        },
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
                    data: [external, educational, social, status, pragmatical, communicate, self_professional],
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
                        ticks: {
                            beginAtZero: true
                        },
                        stacked: true
                    }]
                }
            }
        });

        console.log(key);

    }

    showQuestion();
}

