<ul class="background">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

    <style>
        @keyframes cube {
            from {
                transform: scale(0) rotate(0deg) translate(-50%, -50%);
                opacity: 1;
            }

            to {
                transform: scale(20) rotate(960deg) translate(-50%, -50%);
                opacity: 0;
            }
        }

        .background {
            position: absolute;
            z-index: -99;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
            margin: 0;
            padding: 0;
            background: #ffffff;
            overflow: hidden;
        }

        .background li {
            position: absolute;
            top: 80vh;
            left: 45vw;
            width: 10px;
            height: 10px;
            border: solid 1px #e5e5e5;
            color: transparent;
            transform-origin: top left;
            transform: scale(0) rotate(0deg) translate(-50%, -50%);
            animation: cube 7s ease-in forwards infinite;
        }

        undefined .background li:nth-child(0) {
            animation-delay: 0s;
            left: 9vw;
            top: 67vh;
            border-color: #ffffff;
        }

        .background li:nth-child(1) {
            animation-delay: 2s;
            left: 45vw;
            top: 27vh;
        }

        .background li:nth-child(2) {
            animation-delay: 4s;
            left: 92vw;
            top: 9vh;
            border-color: #ffffff;
        }

        .background li:nth-child(3) {
            animation-delay: 6s;
            left: 68vw;
            top: 13vh;
            border-color: #ffffff;
        }

        .background li:nth-child(4) {
            animation-delay: 8s;
            left: 35vw;
            top: 2vh;
        }

        .background li:nth-child(5) {
            animation-delay: 10s;
            left: 10vw;
            top: 64vh;
        }

        .background li:nth-child(6) {
            animation-delay: 12s;
            left: 61vw;
            top: 88vh;
        }

        .background li:nth-child(7) {
            animation-delay: 14s;
            left: 77vw;
            top: 43vh;
        }

        .background li:nth-child(8) {
            animation-delay: 16s;
            left: 85vw;
            top: 84vh;
            border-color: #ffffff;
        }

        .background li:nth-child(9) {
            animation-delay: 18s;
            left: 50vw;
            top: 95vh;
            border-color: #ffffff;
        }

        .background li:nth-child(10) {
            animation-delay: 20s;
            left: 72vw;
            top: 70vh;
        }

        .background li:nth-child(11) {
            animation-delay: 22s;
            left: 19vw;
            top: 15vh;
            border-color: #ffffff;
        }

        .background li:nth-child(12) {
            animation-delay: 24s;
            left: 43vw;
            top: 39vh;
        }

        .background li:nth-child(13) {
            animation-delay: 26s;
            left: 24vw;
            top: 23vh;
            border-color: #ffffff;
        }

        .background li:nth-child(14) {
            animation-delay: 28s;
            left: 25vw;
            top: 56vh;
            border-color: #ffffff;
        }

        .background li:nth-child(15) {
            animation-delay: 30s;
            left: 55vw;
            top: 49vh;
        }

        .background li:nth-child(16) {
            animation-delay: 32s;
            left: 96vw;
            top: 93vh;
        }

        .background li:nth-child(17) {
            animation-delay: 34s;
            left: 84vw;
            top: 76vh;
        }

        .background li:nth-child(18) {
            animation-delay: 36s;
            left: 33vw;
            top: 32vh;
        }

        .background li:nth-child(19) {
            animation-delay: 38s;
            left: 0vw;
            top: 50vh;
            border-color: #ffffff;
        }
    </style>