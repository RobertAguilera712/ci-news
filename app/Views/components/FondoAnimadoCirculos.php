<div class="background">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <style>
        @keyframes move {
            100% {
                transform: translate3d(0, 0, 1px) rotate(360deg);
            }
        }

        .background {
            position: fixed;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
            background: #1e2e67;
            overflow: hidden;
        }

        .background span {
            width: 20vmin;
            height: 20vmin;
            border-radius: 20vmin;
            backface-visibility: hidden;
            position: absolute;
            animation: move;
            animation-duration: 25;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }


        .background span:nth-child(0) {
            color: #0d6efd;
            top: 16%;
            left: 18%;
            animation-duration: 184s;
            animation-delay: -93s;
            transform-origin: 4vw 0vh;
            box-shadow: 40vmin 0 5.4685006854686815vmin currentColor;
        }

        .background span:nth-child(1) {
            color: #f4740b;
            top: 71%;
            left: 100%;
            animation-duration: 206s;
            animation-delay: -83s;
            transform-origin: -22vw -5vh;
            box-shadow: -40vmin 0 5.767045973010389vmin currentColor;
        }

        .background span:nth-child(2) {
            color: #f4740b;
            top: 28%;
            left: 35%;
            animation-duration: 247s;
            animation-delay: -126s;
            transform-origin: 8vw 0vh;
            box-shadow: -40vmin 0 5.831057310525687vmin currentColor;
        }

        .background span:nth-child(3) {
            color: #0d6efd;
            top: 33%;
            left: 43%;
            animation-duration: 212s;
            animation-delay: -178s;
            transform-origin: 21vw 4vh;
            box-shadow: 40vmin 0 5.8098262201208595vmin currentColor;
        }

        .background span:nth-child(4) {
            color: #f4740b;
            top: 65%;
            left: 46%;
            animation-duration: 218s;
            animation-delay: -164s;
            transform-origin: 24vw -4vh;
            box-shadow: 40vmin 0 5.151619041710526vmin currentColor;
        }

        .background span:nth-child(5) {
            color: #f4740b;
            top: 41%;
            left: 72%;
            animation-duration: 195s;
            animation-delay: -65s;
            transform-origin: -17vw 5vh;
            box-shadow: -40vmin 0 5.412389259882089vmin currentColor;
        }

        .background span:nth-child(6) {
            color: #0d6efd;
            top: 10%;
            left: 85%;
            animation-duration: 85s;
            animation-delay: -216s;
            transform-origin: 21vw 20vh;
            box-shadow: 40vmin 0 5.172842763255822vmin currentColor;
        }

        .background span:nth-child(7) {
            color: #ffffff;
            top: 33%;
            left: 40%;
            animation-duration: 193s;
            animation-delay: -69s;
            transform-origin: 15vw 24vh;
            box-shadow: -40vmin 0 5.136290444508003vmin currentColor;
        }

        .background span:nth-child(8) {
            color: #f4740b;
            top: 58%;
            left: 57%;
            animation-duration: 125s;
            animation-delay: -246s;
            transform-origin: -22vw 16vh;
            box-shadow: 40vmin 0 5.9550092408641095vmin currentColor;
        }

        .background span:nth-child(9) {
            color: #ffffff;
            top: 40%;
            left: 79%;
            animation-duration: 6s;
            animation-delay: -87s;
            transform-origin: -1vw -15vh;
            box-shadow: -40vmin 0 5.537523127702035vmin currentColor;
        }

        .background span:nth-child(10) {
            color: #ffffff;
            top: 9%;
            left: 87%;
            animation-duration: 204s;
            animation-delay: -246s;
            transform-origin: 7vw 10vh;
            box-shadow: 40vmin 0 5.99615084344098vmin currentColor;
        }

        .background span:nth-child(11) {
            color: #0d6efd;
            top: 88%;
            left: 94%;
            animation-duration: 215s;
            animation-delay: -153s;
            transform-origin: 17vw 17vh;
            box-shadow: -40vmin 0 5.852983578407134vmin currentColor;
        }

        .background span:nth-child(12) {
            color: #f4740b;
            top: 33%;
            left: 34%;
            animation-duration: 128s;
            animation-delay: -228s;
            transform-origin: 25vw 13vh;
            box-shadow: 40vmin 0 5.843680569372567vmin currentColor;
        }

        .background span:nth-child(13) {
            color: #f4740b;
            top: 26%;
            left: 77%;
            animation-duration: 237s;
            animation-delay: -226s;
            transform-origin: 2vw -10vh;
            box-shadow: 40vmin 0 5.935383341596122vmin currentColor;
        }

        .background span:nth-child(14) {
            color: #0d6efd;
            top: 69%;
            left: 22%;
            animation-duration: 49s;
            animation-delay: -46s;
            transform-origin: -21vw -1vh;
            box-shadow: -40vmin 0 5.817760073866482vmin currentColor;
        }
    </style>