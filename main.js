let table = document.querySelector('#table');
//table.rows[0].cells[0].style.background = 'white';
var result;
      var question;
      var question_2;
      var value1;
      var value2;
      
      question = 1;
      question_2 = 1;
      value1 = 0;
      value2 = 0;
      
      result = "";

      var choice;
       var choice_2;

 function func() {

     for (question = 1; question <= 10; question++) {
      
         var q = document.forms['quiz'].elements['q'+question];
         

            for (var i = 0; i < 2; i++) {
               if (q[i].checked && q[i].value == "value1") {
                  for (question_2 = 11; question_2 <= 20; question_2++) {

         var q = document.forms['quiz'].elements['q'+question_2];

         for (var j = 0; j < 2; j++) {    
                if (q[j].checked && q[j].value == "value1") {
         table.rows[question-1].cells[question_2-11].style.background = 'white';

               } 
         }
      }
   }
               
}

      
            
 }
}





