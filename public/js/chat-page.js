document.addEventListener("DOMContentLoaded", () => {

    var questionsAndAnswers;

    function getStarterQuestions(){
        $.ajax({
            type: "GET",
            url: "questions/starter",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                processNewQuestions(data);
            },
            error: function(xhr) {
                console.error(xhr.responseText); // Check for unauthorized response
            }
        })
    }

    function getFollowupQuestions(id){
        $.ajax({
            type: "GET",
            url: `questions/followup/${id}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                processNewQuestions(data);
            },
            error: function(xhr) {
                console.error(xhr.responseText); // Check for unauthorized response
            }
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
        $(".option-btn").attr('disabled', 'true');

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
        }, 500);
    }

    // Bot response logic based on the question asked
    function generateBotResponse(questionAndAnswer) {
        return questionAndAnswer['answer'] || "I'm not sure how to respond to that.";
    }

    // Open chat popup
    function openChat() {
        document.getElementById("chatPopup").style.display = "block";
    }

    $('.open-button').on('click', function() {
        openChat();
    })

    // Close chat popup
    function closeChat() {
        document.getElementById("chatPopup").style.display = "none";
    }

    // Close chat when clicking outside the chat container
    document.addEventListener('click', function(event) {
        const chatPopup = document.getElementById('chatPopup');
        const chatContainer = document.getElementById('chatContainer');
        const openButton = document.querySelector('.open-button');

        if (!chatContainer.contains(event.target) && !openButton.contains(event.target)) {
            chatPopup.style.display = 'none';
        }
    });

    getStarterQuestions();
});
