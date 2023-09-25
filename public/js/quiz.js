$(document).ready(function() {
    $('#result-container').hide(); 
    $('#result-container').hide();
    $('#login-container').hide();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var score = 0;
    
    // Load the first question
    loadQuestion();

    $('#login-form').submit(function(event) {
        event.preventDefault();
        
        var username = $("#username").val();
        
        $.ajax({
            url: '/login',
            method: 'POST',
            data: {
                username
            },
            success: function(response) {
                loadQuestion();
            },
            error:function (error) { 
                $('.error-response').html(error.responseJSON.message);
            }
        });
    });
    
    
    $('#quiz-form').submit(function(event) {
        event.preventDefault(); 
        
        var option_id = $("input[name='option_id']:checked").val();
        var question_id = $("input[name='question_id']").val(); 
        $.ajax({
            url: '/quiz/submit',
            method: 'POST',
            data: {
                option_id,
                question_id,
            },
            success: function(response) {
                loadQuestion();
                score += response.score; 
                $('#score').text(score);
                $('#quiz-form').hide();
            }
        });
    });
    
    $('#skip-question').click(function() {
        var question_id = $('#question_id').val();
        $.ajax({
            url: '/quiz/question/skip',
            method: 'POST',
            data : {
                question_id 
            },
            success: function(response) {  
                loadQuestion();
            },
            error:function(error){
                $('#login-container').show();
            }
        });
    });
    
    function loadQuestion() {
        $.ajax({
            url: '/quiz',
            method: 'GET',
            success: function(response) {

                if(!response.data.question){

                    $('#total_correct_answer').text("Total Correct Answer " +response.data.total_answers_right);
                    $('#total_wrong_answer').text("Total Wrong Answer " +response.data.total_answers_wrong);
                    $('#skip_answer').text("Total Skip Answer " + response.data.total_skip_question); 
                    $('#result-container').show();
                    $('#question-container').hide();

                }else{
                
                    var options = '';
                    for(var i=0; i < response.data.question.options.length; i++){
                        options += "<div class='option'>\
                        <input type='radio' name='option_id' value="+response.data.question.options[i]['id']+" required />\
                        <label>"+response.data.question.options[i]['text']+"</label>\
                        </div>";
                    }
                    $('#question_id').val(response.data.question.id);
                    $('#question_label').text(response.data.question.text);
                    $('#question_no').text("No. " + (response.data.total_answer));
                    $(".quiz-options").html(options);
                    $('#question-container').show();
                    $('#quiz-form').show();
                    $('#quiz-form').submit(function(event) {
                        event.preventDefault(); 
                    }); 
                    $('#login-container').hide();
                    $('#result-container').hide();  
                }
                
            },
            error:function(error){
                $('#question-container').hide();
                $('#login-container').show();
            }
        });
    }
});