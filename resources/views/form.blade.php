<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input {
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <h2>Input Form</h2>
    <input type="text" id="input1" placeholder="Enter first value" />
    <input type="text" id="input2" placeholder="Enter second value" />
    <button id="submitBtn">SUBMIT</button>

    <script>
        $(document).ready(function() {
            $('#submitBtn').click(function() {
                const value1 = $('#input1').val();
                const value2 = $('#input2').val();
                console.log('Input 1:', value1);
                console.log('Input 2:', value2);
            });
        });
    </script>

</body>
</html>
