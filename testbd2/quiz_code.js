/*function Send_for_PHP(answer_for_BD) {
console.log("хуй: "+answer_for_BD); 
    $.ajax({

                        url:"SendMail.php",
                        data:{answer_for_BD:answer_for_BD},
                        type:"POST",
                        success: function(){
                        alert("success");
                    }
                    });
    }*/
    function scrolling(){
    $('html, body').animate({
    scrollTop: $('#Metodic_name').offset().top
    }, 1000);
    }

    function getMont(Month)
    {
    var arr=[
   'Января',
   'Февраля',
   'Марта',
   'Апреля',
   'Мая',
   'Июня',
   'Июля',
   'Августа',
   'Сентября',
   'Ноября',
   'Декабря',
];
Date_Manth = (arr[Month-1]);
document.getElementById("input_m").value = Date_Manth;
    }


window.onload = function () {


    var metodic_options = document.getElementById("metodic_options");
    var metodic_instructions = document.getElementById("metodic_instructions");
    var testName = document.getElementsByTagName('h1');
    var testChapter = document.getElementsByTagName('h2');
    var question = document.getElementsByTagName('h3');
    var elem = document.getElementById("#5_metodic");
    var elem_1 = document.getElementById("form_send");
    var input_for_js = document.getElementById("input_for_bd").val;
    var first_text_block = document.getElementById("first_text_block");

    let now = new Date();

    var date_d = now.getDate();
    var Month = now.getMonth();
    getMont(Month);
    document.getElementById("imput_d").value = date_d;

    let perem_for_BD = "";
    //chapter_1.1
    let chapter_1_1_y="";
    //chapter_1.2
    let chapter_1_2_y=""; 
    //chapter_2
    let _undefined = 0, imposed = 0, moratorium = 0, formed = 0;

    //chapter_3
    let kindness = 0, consciousness = 0, openness = 0,
        neuroticism = 0, extroversion = 0;

    //chapter_4
    let external = 0, educational = 0, social = 0, status = 0,
        pragmatical = 0, communicate = 0, self_professional = 0;
    //chapter_5
        let professional =0, financial =0, family =0, sociall =0, publicc =0, spiritual =0, physical=0, intellectual=0;



    testChapter = testChapter[0];
    testChapter.innerText = test_chapter_name[1];
    question = question[0];
    question.innerText = '1. С кем или с чем Вы бы хотели работать? Какой объект деятельности Вас привлекает?';
    testName = testName[0];
    testName.innerText = 'Дистанционное тестирование по теме «Карьерный потенциал»';
    metodic_instructions.textContent = test_chapter_instructions[1];
    let result = {};
    let step =0;

    function showQuestion(questionNumber) {
        document.querySelector('.question').innerHTML = quiz[step]['q'];
        let answer = '';
        for (let key in quiz[step]['a']) {
            answer += `<li data-v='${key}' class="answer-variant">${quiz[step]['a'][key]}</li>`;
        }
        document.querySelector('.answer').innerHTML = answer;
    }


    document.onclick = function (event) {



     //   Send_for_PHP(answer_for_BD);

        if (event.target.dataset.v == undefined && step != quiz.length)
            return showQuestion();
        else if (step == quiz.length)
            return;


            let answer_for_BD = event.target.dataset.v;

            if (answer_for_BD === '_a') {perem_for_BD+='a';}
            else if (answer_for_BD === '_b') {perem_for_BD+='b';}
            else if (answer_for_BD === '_c') {perem_for_BD+='c';} 
            else if (answer_for_BD === '_d') {perem_for_BD+='d';}
            else{
               // perem_for_BD = answer_for_BD;
                perem_for_BD += answer_for_BD-1;
            }

        event.stopPropagation();
        if (event.target.classList.contains('answer-variant') && step < quiz.length) {

            if (result[event.target.dataset.v] != undefined) {
                result[event.target.dataset.v]++;

                        console.log(event.target.dataset.v);
            } else {
                result[event.target.dataset.v] = 0;

            }
        }
            if (step === 9 ) {
            question.textContent = '2. Чем бы Вы хотели заниматься? Какой вид деятельности Вас привлекает?';
        }

            if (step === 19) {testChapter.textContent = test_chapter_name[2];
            question.style.display = "none"; 
            metodic_instructions.textContent = test_chapter_instructions[2];
            scrolling();
        }

            if (step ===39) {testChapter.textContent = test_chapter_name[3]; 
                metodic_options.textContent = test_chapter_options[1];  
                metodic_instructions.textContent = test_chapter_instructions[3];
                scrolling();
            }

            if (step ===79) {testChapter.textContent = test_chapter_name[4]; 
                metodic_options.textContent = test_chapter_options[2]; 
                metodic_instructions.textContent = test_chapter_instructions[4];
                scrolling();
            }

            if (step ===100) {testChapter.textContent = test_chapter_name[5]; 
                metodic_options.textContent = test_chapter_options[3]; 
                metodic_instructions.textContent = test_chapter_instructions[5]; 
                elem.style.height='1500px';
                scrolling();
        }

                if (step>=116){
                    elem_1.style.display ='block';
                    elem.style.height='900px';
                    metodic_instructions.textContent="";
                    metodic_options.textContent ="";
                    question.style.display = "none";
                    metodic_instructions.style.display = "none";
                    first_text_block.style.display = "none";
                    document.getElementById("first_card_wrapper").style.display="none";

                    //first_text_block.style.display = "none";
                }
        if(step >=0 && step<10)
        {
            if(answer_for_BD==='_a'){chapter_1_1_y+='1';}
            if(answer_for_BD==='_b'){chapter_1_1_y+='2';}
        }
        if (step>=10 && step<20) 
        {
            if(answer_for_BD==='_a'){chapter_1_2_y+='1';}
            if(answer_for_BD==='_b'){chapter_1_2_y+='2';}
        }
        if (step >= 20 && step < 40) {
            let question_2 = step - 20;
            let answer_2 = event.target.dataset.v;

            if (question_2 === 0) {
                if (answer_2 === '_a')
                    _undefined += 2;
                else if (answer_2 === '_b')
                    imposed++;
                else if (answer_2 === '_d')
                    moratorium++;
                else if (answer_2 === '_c')
                    formed++;
                else
                    console.log("line 84 wrong answer reached");
            }

            if (question_2 === 1) {
                if (answer_2 === '_d')
                    _undefined++;
                else if (answer_2 === '_b')
                    imposed++;
                else if (answer_2 === '_a')
                    moratorium += 2;
                else if (answer_2 === '_c')
                    formed++;
                else
                    console.log("line 97 wrong answer reached");
            }

            if (question_2 === 2) {
                if (answer_2 === '_c')
                    _undefined++;
                else if (answer_2 === '_b')
                    imposed++;
                else if (answer_2 === '_a')
                    moratorium += 2;
                else if (answer_2 === '_d')
                    formed++;
                else
                    console.log("line 110 wrong answer reached");
            }


            if (question_2 === 3) {
                if (answer_2 === '_c')
                    _undefined++;
                else if (answer_2 === '_a')
                    imposed += 2;
                else if (answer_2 === '_b')
                    moratorium++;
                else if (answer_2 === '_d')
                    formed++;
                else
                    console.log("line 124 wrong answer reached");
            }

            if (question_2 === 4) {
                if (answer_2 === '_c')
                    _undefined++;
                else if (answer_2 === '_a')
                    imposed += 2;
                else if (answer_2 === '_b')
                    moratorium++;
                else if (answer_2 === '_d')
                    formed++;
                else
                    console.log("line 137 wrong answer reached");
            }


            if (question_2 === 5) {
                if (answer_2 === '_c')
                    _undefined++;
                else if (answer_2 === '_a')
                    imposed++;
                else if (answer_2 === '_d')
                    moratorium++;
                else if (answer_2 === '_b')
                    formed += 2;
                else
                    console.log("line 151 wrong answer reached");
            }


            if (question_2 === 6) {
                if (answer_2 === '_a')
                    _undefined++;
                else if (answer_2 === '_b')
                    imposed += 2;
                else if (answer_2 === '_c')
                    moratorium++;
                else if (answer_2 === '_d')
                    formed++;
                else
                    console.log("line 165 wrong answer reached");
            }


            if (question_2 === 7) {
                if (answer_2 === '_b')
                    _undefined += 2;
                else if (answer_2 === '_a')
                    imposed++;
                else if (answer_2 === '_c')
                    moratorium++;
                else if (answer_2 === '_d')
                    formed++;
                else
                    console.log("line 179 wrong answer reached");
            }


            if (question_2 === 8) {
                if (answer_2 === '_a')
                    _undefined++;
                else if (answer_2 === '_c')
                    imposed++;
                else if (answer_2 === '_d')
                    moratorium++;
                else if (answer_2 === '_b')
                    formed += 2;
                else
                    console.log("line 193 wrong answer reached");
            }

            if (question_2 === 9) {
                if (answer_2 === '_c')
                    _undefined++;
                else if (answer_2 === '_b')
                    imposed += 2;
                else if (answer_2 === '_a')
                    moratorium++;
                else if (answer_2 === '_d')
                    formed++;
                else
                    console.log("line 206 wrong answer reached");
            }

            if (question_2 === 10) {
                if (answer_2 === '_c')
                    _undefined += 2;
                else if (answer_2 === '_b')
                    imposed++;
                else if (answer_2 === '_d')
                    moratorium++;
                else if (answer_2 === '_a')
                    formed++;
                else
                    console.log("line 219 wrong answer reached");
            }

            if (question_2 === 11) {
                if (answer_2 === '_b')
                    _undefined++;
                else if (answer_2 === '_c')
                    imposed += 2;
                else if (answer_2 === '_a')
                    moratorium++;
                else if (answer_2 === '_d')
                    formed++;
                else
                    console.log("line 232 wrong answer reached");
            }

            if (question_2 === 12) {
                if (answer_2 === '_c')
                    _undefined += 2;
                else if (answer_2 === '_b')
                    imposed++;
                else if (answer_2 === '_a')
                    moratorium++;
                else if (answer_2 === '_d')
                    formed++;
                else
                    console.log("line 245 wrong answer reached");
            }

            if (question_2 === 13) {
                if (answer_2 === '_d')
                    _undefined++;
                else if (answer_2 === '_a')
                    imposed++;
                else if (answer_2 === '_c')
                    moratorium += 2;
                else if (answer_2 === '_b')
                    formed++;
                else
                    console.log("line 258 wrong answer reached");
            }

            if (question_2 === 14) {
                if (answer_2 === '_b')
                    _undefined++;
                else if (answer_2 === '_a')
                    imposed++;
                else if (answer_2 === '_d')
                    moratorium++;
                else if (answer_2 === '_c')
                    formed += 2;
                else
                    console.log("line 271 wrong answer reached");
            }

            if (question_2 === 15) {
                if (answer_2 === '_b')
                    _undefined++;
                else if (answer_2 === '_a')
                    imposed++;
                else if (answer_2 === '_d')
                    moratorium += 2;
                else if (answer_2 === '_c')
                    formed++;
                else
                    console.log("line 284 wrong answer reached");
            }

            if (question_2 === 16) {
                if (answer_2 === '_d')
                    _undefined += 2;
                else if (answer_2 === '_a')
                    imposed++;
                else if (answer_2 === '_c')
                    moratorium += 2;
                else if (answer_2 === '_b')
                    formed++;
                else
                    console.log("line 297 wrong answer reached");
            }


            if (question_2 === 17) {
                if (answer_2 === '_c')
                    _undefined++;
                else if (answer_2 === '_a')
                    imposed++;
                else if (answer_2 === '_d')
                    moratorium += 2;
                else if (answer_2 === '_b')
                    formed++;
                else
                    console.log("line 311 wrong answer reached");
            }


            if (question_2 === 18) {
                if (answer_2 === '_c')
                    _undefined++;
                else if (answer_2 === '_b')
                    imposed++;
                else if (answer_2 === '_a')
                    moratorium++;
                else if (answer_2 === '_d')
                    formed += 2;
                else
                    console.log("line 325 wrong answer reached");
            }

            if (question_2 === 19) {
                if (answer_2 === '_a')
                    _undefined++;
                else if (answer_2 === '_c')
                    imposed++;
                else if (answer_2 === '_b')
                    moratorium++;
                else if (answer_2 === '_d')
                    formed += 2;
                else
                    console.log("line 338 wrong answer reached");
            }

        }

        if (step >= 40 && step < 80) {
            var q_3 = step - 40;
            //a: +=0
            //b: +=1
            //c: +=2
            let shit_happen = event.target.dataset.v;

            if (event.target.dataset.v === '_a') {
                //+=0 every time so we don't actually need this if, but

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


        if(step>=101&&step<116)
        {
            let question_5 = step-100;
            let number_5 = event.target.dataset.v;
            if(question_5 === 1 ||question_5 ===9)
            {
                professional += number_5*5;
            }
            if(question_5 === 2 ||question_5 ===10)
            {
                financial += number_5*5;
            }
            if(question_5 === 3 ||question_5 ===11)
            {
                family += number_5*5;
            }
            if(question_5 === 4 ||question_5 ===12)
            {
                sociall += number_5*5;
            }
            if(question_5 === 5 ||question_5 ===13)
            {
                publicc += number_5*5;
            }
            if(question_5 === 6 ||question_5 ===14)
            {
                spiritual += number_5*5;
            }
            if(question_5 === 7 ||question_5 ===15)
            {
                physical += number_5*5;
            }
            if(question_5 === 8 ||question_5 ===16)
            {
                intellectual += number_5*5;
            }
        }



        step++;
        if (step === quiz.length) {
            var counter = 1;

            document.querySelector('.question').remove();
            document.querySelector('.answer').remove();
            testChapter.remove();
            testName.remove();

            document.getElementById("input_for_bd").value = perem_for_BD;
            console.log(chapter_1_1_y);
            console.log(chapter_1_2_y);
            document.getElementById("imput_chaptet_1_1_y").value = chapter_1_1_y;
            document.getElementById("imput_chaptet_1_2_y").value = chapter_1_2_y;

            document.getElementById("_undefined_").value = _undefined;
            document.getElementById("imposed_").value = imposed;
            document.getElementById("moratorium_").value = moratorium;
            document.getElementById("formed_").value = formed;

            document.getElementById("kindness_").value = kindness;
            document.getElementById("consciousness_").value = consciousness;
            document.getElementById("openness_").value = openness;
            document.getElementById("neuroticism_").value = neuroticism;
            document.getElementById("extroversion_").value = extroversion;

            document.getElementById("self_professional_").value = self_professional;
            document.getElementById("communicate_").value = communicate;
            document.getElementById("pragmatical_").value = pragmatical;
            document.getElementById("status_").value = status;
            document.getElementById("social_").value = social;
            document.getElementById("educational_").value = educational;
            document.getElementById("external_").value = external;

            document.getElementById("professional_").value = professional;
            document.getElementById("financial_").value = financial;
            document.getElementById("family_").value = family;
            document.getElementById("sociall_").value = sociall;
            document.getElementById("publicc_").value = publicc;
            document.getElementById("spiritual_").value = spiritual;
            document.getElementById("physical_").value = physical;
            document.getElementById("intellectual_").value = intellectual;

            showResult(); 
        } else {
            return showQuestion();
            
        }

    }

    function showResult() {
        let key = Object.keys(result).reduce(function (a, b) {
            return result[a] > result[b] ? a : b
        });

/*
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
*/

        //графики


        var second_chapter = document.getElementById('second_chapter').getContext('2d');
        let blue = 'rgb(57,156,215,1)';
        var second_method = new Chart(second_chapter, {
            type: 'horizontalBar',
            data: {
                labels: ['Навязанная', 'Мараторий', 'Сформированная', 'Неопределённая'],
                datasets: [{
                    label: 'Статус профессиональный идентичности',
                    data: [imposed, moratorium, formed, _undefined],
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

/*
   var SendButton = document.getElementById('SendButton');
    SendButton.onclick = function(){
        var username = 2;
        var faculty = 3;
        var personality = 4;
  $.get(
       'SendMail.php',
        {a:username,b:faculty,c:personality}
         );
        document.location.href = "SendMail.php";
    }
*/
};

