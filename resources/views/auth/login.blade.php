<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
        }
        .container {
            max-width: 400px;
            margin-top: 100px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin-bottom: 10px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        .social-btn:hover {
            transform: scale(1.05);
        }
        .social-icon {
            margin-right: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Employee Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>

        <div class="mt-4">
            <h5 class="text-center">Login with:</h5>
            <a href="#" class="btn btn-outline-primary social-btn">
                <i class="fab fa-facebook-f social-icon"></i> Facebook
            </a>
            <a href="#" class="btn btn-outline-info social-btn">
                <i class="fab fa-twitter social-icon"></i> Twitter
            </a>
            <a href="#" class="btn btn-outline-secondary social-btn">
                <i class="fab fa-linkedin-in social-icon"></i> LinkedIn
            </a>
            <a href="#" class="btn btn-danger social-btn">
                <i class="fab fa-youtube social-icon"></i> YouTube
            </a>
            <a href="#" class="btn btn-danger social-btn">
                <i class="fab fa-instagram social-icon"></i> Instagram
            </a>
        </div>
    </div>
</body>

</html>
