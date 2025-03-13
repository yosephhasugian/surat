<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg,rgb(0, 224, 30), #8e2de2);
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            color: white;
        }
        .leaf {
            position: absolute;
            width: 20px;
            height: 20px;
            background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"%3E%3Cpath fill="%23ffffff" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM17 11c-.55 0-1 .45-1 1v4c0 .55-.45 1-1 1h-2c-.55 0-1-.45-1-1v-4c0-.55-.45-1-1-1H7c-.55 0-1 .45-1 1v4c0 .55-.45 1-1 1H3v-4c0-1.1.9-2 2-2h12c1.1 0 2 .9 2 2v4h-2v-4z"/%3E%3C/svg%3E'); /* Ikon daun SVG */
            background-size: contain;
            pointer-events: none;
            animation: fall 5s linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(-100px) rotate(0deg);
                opacity: 0;
            }
            20% {
                opacity: 1;
            }
            80% {
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }
        .login-box {
            background: rgba(255, 255, 255, 0.15);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 90%;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }
        .login-box:hover{
            transform: scale(1.02);
        }
        .login-box h1 {
            font-weight: 600;
            margin-bottom: 30px;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
        }
        .form-control {
            border-radius: 15px;
            padding: 16px;
            background: rgba(255, 255, 255, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.35);
            color: white;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #ffffff;
            background: rgba(255, 255, 255, 0.35);
            outline: none;
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.8);
        }
        .btn-login {
            border-radius: 15px;
            background: linear-gradient(135deg, #4a00e0, #8e2de2);
            color: white;
            font-weight: 600;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 16px;
        }
        .btn-login:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }
        .forgot-password {
            margin-top: 25px;
        }
        .forgot-password a {
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        .forgot-password a:hover {
            text-decoration: underline;
            color: #cccccc;
        }
        .input-group-text {
            background: rgba(255, 255, 255, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 15px 0 0 15px;
            color: white;
            padding: 16px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>Login</h1>
        <p>Silakan login untuk mengakses aplikasi</p>
        <form action="<?php echo base_url('User/login'); ?>" method="post">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-login w-100">Sign In</button>
            <div class="forgot-password">
                <a href="#">Lupa password?</a>
            </div>
        </form>
    </div>
    <script>
        function createLeaf() {
            const leaf = document.createElement('div');
            leaf.classList.add('leaf');
            leaf.style.left = Math.random() * 100 + 'vw';
            leaf.style.animationDelay = Math.random() * 5 + 's';
            document.body.appendChild(leaf);
        }

        for (let i = 0; i < 20; i++) { // Jumlah daun
            createLeaf();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>