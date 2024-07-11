var questions = [
    {
        question: "Who first proposed the atomic theory of matter?",
        choices: ["John Dalton", "Berlin", "Chadwick", "sagar"],
        correctAnswer: 0
    },
    {
        question: "Which reaction is mainly responsible for the cause of energy radiation from the sun?",
        choices: ["combination Reaction", "Fusion Reaction", "Double Reaction", "none"],
        correctAnswer: 1
    },
    {
        question: "What is the largest planet in our solar system?",
        choices: ["Jupiter", "Saturn", "Neptune", "Mars"],
        correctAnswer: 0
    },
    {
        question: "The Ramon Magsaysay Award is given in memory of the former president of which country?",
        choices: ["India", "canada", "Philippines", "US"],
        correctAnswer: 2
    },
    {
        question: "The book titled “1283” illustrates the career of which Football legend?",
        choices: ["Pele", "Sagar", "Messi", "Ronaldo"],
        correctAnswer: 0
    },
];

var currentQuestion = 0;
var score = 0;

var questionElement = document.getElementById("question");
var choicesElement = document.getElementById("choices");
var resultElement = document.getElementById("result");
var submitButton = document.getElementById("submit");

function loadQuestion() {
    var q = questions[currentQuestion];
    questionElement.textContent = q.question;

    choicesElement.innerHTML = "";
    for (var i = 0; i < q.choices.length; i++) {
        var li = document.createElement("li");
        li.textContent = q.choices[i];
        li.onclick = checkAnswer;
        choicesElement.appendChild(li);
    }
}

function checkAnswer(event) {
    var selectedChoice = event.target;
    var selectedAnswer = selectedChoice.textContent;
    var correctAnswer = questions[currentQuestion].choices[questions[currentQuestion].correctAnswer];
    
    if (selectedAnswer === correctAnswer) {
        score++;
    }

    currentQuestion++;

    if (currentQuestion < questions.length) {
        loadQuestion();
    } else {
        showResult();
    }
}

function showResult() {
    questionElement.style.display = "none";
    choicesElement.style.display = "none";
    submitButton.style.display = "none";
    resultElement.textContent = "You scored " + score + " out of " + questions.length + "!";
}

loadQuestion();
