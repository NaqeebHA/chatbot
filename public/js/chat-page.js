document.addEventListener("DOMContentLoaded", () => {

    var questionsAndAnswers;

    function getStarterQuestions(){
        $.ajax({
            type: "GET",
            url: "api/questions/starter",
            success: function(data){
                processNewQuestions(data);
            },
            error: function(xhr, status, error){}
        })
    }

    function getFollowupQuestions(id){
        $.ajax({
            type: "GET",
            url: `api/questions/followup/${id}`,
            success: function(data){
                processNewQuestions(data);
            },
            error: function(xhr, status, error){}
        })
    }

    function processNewQuestions(data){
        questionsAndAnswers = data;

        $("#button-container").empty();

        $.each(questionsAndAnswers, function(i, questionAndAnswer) {
            const button = $("<button>");
            button.addClass("option-btn");
            button.text(questionAndAnswer['question']);
            button.on("click", () => sendMessage(questionAndAnswer));
            $("#button-container").append(button);
        });
    }

    function sendMessage(questionAndAnswer) {
        $("button").attr('disabled', 'true');

        const userMessage = $("<div>");
        userMessage.addClass("message user-message");
        userMessage.text(questionAndAnswer['question']);
        $("#output").append(userMessage);

        // Scroll to the bottom of the chat window
        $("#chat-window").scrollTop($("#chat-window").prop('scrollHeight'));

        // Simulate bot response after 1 second
        setTimeout(() => {
            const botResponse = $("<div>");
            botResponse.addClass("message bot-message");
            botResponse.text(generateBotResponse(questionAndAnswer));
            $("#output").append(botResponse);

            getFollowupQuestions(questionAndAnswer['id']);

            // Scroll to the bottom of the chat window
            $("#chat-window").scrollTop($("#chat-window").prop('scrollHeight'));
        }, 1000);
    }

    // Bot response logic based on the question asked
    function generateBotResponse(questionAndAnswer) {
        return questionAndAnswer['answer'] || "I'm not sure how to respond to that.";
    }

    getStarterQuestions();
});
