<html>
    <head>
        <title>Quiz</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

    </head>
    <body>

        <div id="result-container"> 
                <div class="result">Result Page
                   <label id="total_correct_answer"></label>  <br>  
                   <label id="total_wrong_answer"></label>  <br>
                   <label id="skip_answer"></label>  <br> 
                </div>  
        </div>

        <div id="login-container">
            <form id="login-form">
                <h3>Login</h3>
                <div>
                    Enter your username

                <label>
                    <input type="text" name="username" id="username">
                     
                </label>
                <br>
                </div> 
                <button id="login"> login </button>
            </form> 
            <div class="error-response"></div>
        </div>

        <div id="question-container">
            <h1>Question</h1>
            <label id="question_no"> </label>
            <p id="question_label"> </p>
            <form id="quiz-form"> 
                <div class="quiz-options">
                </div>
                <input type="hidden" name="question_id" id="question_id">
                <button type="submit">Next</button>
                <button id="skip-question" type="button" >Skip</button>
            </form>
        </div>  
     
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/quiz.js') }}"></script>

    </body>
</html>