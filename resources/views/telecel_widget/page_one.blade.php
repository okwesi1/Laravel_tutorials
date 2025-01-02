<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PAGE ONE</title>
</head>
<body>
    <button onclick="redirectToPage()">Go</button>
    <div id="container"></div>
</body>
</html>
<script src="http://vfgh-test.telenity.com/registerhelper4/Register.js"></script>
<script>
    function redirectToPage() {
        let mainUrl = '/redirect';
        //http://telecel-test.telenity.com/widget/redirect?callbackUrl=http%3A%2F%2F127.0.0.1%3A8000&serviceId=0&legacy=true
        let encodedData = encodeURIComponent('token=7a91cfa12fb2c856978daae7f01ab34e&action=signup&serviceid=1310');
        // var redirectUrl = "/redirect?token=7a91cfa12fb2c856978daae7f01ab34e&action=signup&selectedOffer=1234";
        var redirectUrl = `${mainUrl}?${encodedData}`;
        window.location.href = redirectUrl;
        // 
        console.log('OUTPUT == ', );
    }
</script>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PAGE ONE</title>
</head>
<body>
    <button onclick="redirectToPage()">Go</button>
    <script>
        function redirectToPage() {
            const token = "7a91cfa12fb2c856978daae7f01ab34e";
            const action = "signup";
            const selectedOfferId = "1234";
            const callbackUrl = "https://example.com";

            const redirectUrl = `/redirect?token=${encodeURIComponent(token)}&action=${encodeURIComponent(action)}&selectedOffer=${encodeURIComponent(selectedOfferId)}&callbackUrl=${encodeURIComponent(callbackUrl)}`;
            
            console.log('Redirect URL:', redirectUrl);
            window.location.href = redirectUrl; // Uncomment this line to perform the redirect
        }
    </script>
</body>
</html> --}}
