<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found | 404</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .container {
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .error-message h1 {
            font-size: 72px;
            color: #f44336;
            margin-bottom: 20px;
        }

        .error-message p {
            font-size: 20px;
            color: #777;
            margin-bottom: 20px;
        }

        .back-home-btn {
            display: inline-block;
            background-color: #f44336;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .back-home-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-message">
            <h1>Oops! Page Not Found.</h1>
            <p>Sorry, but the page you are looking for does not exist.</p>
            <p>Error 404 - Page Not Found</p>
            <a href="{{ url('/') }}" class="back-home-btn">Go Back Home</a>
        </div>
    </div>
</body>
</html>
