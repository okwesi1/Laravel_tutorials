<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submitBtn').click(function(event) {
                event.preventDefault(); // Prevent form submission
                var name = $('#name').val();
                var email = $('#email').val();
                console.log('Name:', name);
                console.log('Email:', email);
            });
        });
    </script>
</head>
<body>
    <form>
        <label for="name">Name:</label>
        <input type="text" id="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" required>
        <br>
        <button id="submitBtn" type="submit">SUBMIT</button>
    </form>
</body>
</html>
