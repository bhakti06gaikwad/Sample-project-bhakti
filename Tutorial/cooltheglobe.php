<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .container {
            position: relative;
            height: 100vh;
            width: 100%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('iconimage/bg1.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            opacity: 0.7;
            z-index: 1;
        }

        #sadearth {
            width: 44%;
            height: 80%;
            position: relative;
            z-index: 2;
            margin-top: -52px;
        }

        .question {
            font-size: 44px;
            color: black;
            cursor: pointer;
            position: relative;
            z-index: 2;
            margin-top: -55px;
        }

        .answer {
            margin-top: 20px;
            font-size: 20px;
            color: black;
            text-align: center;
            visibility: hidden; /* Initially hidden */
            opacity: 1; /* Ensure text is fully opaque */
            position: relative;
            z-index: 2;
        }

        .register-button {
            visibility: hidden; /* Initially hidden */
            opacity: 0; /* Initially invisible */
            transform: scale(0.8); /* Initially scaled down */
            padding: 10px 20px;
            font-size: 18px;
            color: white;
            background-color: #007BFF; /* Button color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: visibility 0s, opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
            z-index: 3; /* Ensure it is above other elements */
        }

        .register-button.show {
            visibility: visible; /* Make it visible */
            opacity: 1; /* Fade in */
            transform: scale(1); /* Scale up */
        }
    </style>
</head>
<body>
    <div class="container">
        <img id="sadearth" src="iconimage/sadearth-removebg-preview (1).png" alt="no image is displayed">
        <div class="question" onclick="revealText()">Why Earth is sad..??</div>
        <div class="answer" id="answer"></div>
        <!-- <a href="http://localhost/project/sign_up.php">
        <button class="register-button" id="registerButton">Register</button>
     </a> -->

     <button class="register-button" id="registerButton" onclick="window.location.href='http://localhost/Tutorial/log_sign.php' ">
  Register
</button>

    </div>

    <script>
        let isRevealing = false; // Flag to prevent multiple clicks

        function revealText() {
            if (isRevealing) return; // Exit if the text is already being revealed
            isRevealing = true;

            const answerElement = document.getElementById('answer');
            const button = document.getElementById('registerButton');
            const text = "Global warming is making Earth increasingly sad, as the rising temperatures are causing glaciers to melt, sea levels to rise, and natural habitats to disappear. This change is leading to more frequent and severe weather events, endangering countless species, and disrupting the balance of our ecosystems. Earth is calling out for help, asking humanity to act before it's too late. By reducing carbon emissions, conserving energy, and protecting our forests and oceans, we can work together to heal our planet and prevent further destruction. The time to act is now—let's not let Earth suffer in silence.";
            let index = 0;

            answerElement.style.visibility = "visible"; // Make the answer element visible

            function typeText() {
                if (index < text.length) {
                    answerElement.innerHTML += text.charAt(index);
                    index++;
                    setTimeout(typeText, 50); // Adjust typing speed here (milliseconds)
                } else {
                    isRevealing = false; // Allow clicks again once text is fully revealed
                    showRegisterButton(); // Show the register button
                }
            }

            typeText();
        }

        function showRegisterButton() {
            const button = document.getElementById('registerButton');
            button.classList.add('show'); // Add class to trigger transition effect
        }
    </script>
</body>
</html>
