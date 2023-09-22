<!DOCTYPE html>
<html>
<head>
    <title>Shared Timer Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/socket.io/socket.io.js"></script>
</head>
<body>
    <h1>Shared Timer Example</h1>
    <div id="timer"></div>

    <script>
        $(document).ready(function () {
            const socket = io(); // Connect to the server

            function updateTimer(totalSeconds) {
                var hours = Math.floor(totalSeconds / 3600);
                var minutes = Math.floor((totalSeconds % 3600) / 60);
                var seconds = totalSeconds % 60;

                // Add leading zeros to ensure two-digit format
                var hoursStr = (hours < 10) ? '0' + hours : hours;
                var minutesStr = (minutes < 10) ? '0' + minutes : minutes;
                var secondsStr = (seconds < 10) ? '0' + seconds : seconds;

                $('#timer').text(hoursStr + ':' + minutesStr + ':' + secondsStr);
            }

            // Listen for timer updates from the server
            socket.on('timer', (timerValue) => {
                updateTimer(timerValue);
            });
        });
    </script>
</body>
</html>
