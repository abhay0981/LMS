<!DOCTYPE html>
<html>
<head>
    <title>Login - LMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
        }

        .login-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            padding: 30px;
            transform-style: preserve-3d;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: rotateY(3deg) rotateX(3deg);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.3);
        }

        .btn-primary {
            box-shadow: 0 5px 10px rgba(0, 123, 255, 0.3);
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 15px rgba(0, 123, 255, 0.4);
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="login-card">
                <h3 class="text-center mb-4">Login</h3>
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                <?php endif; ?>
                <form method="post" action="<?= base_url('auth/login') ?>">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" required class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="form-group mt-2">
                        <label>Password</label>
                        <input type="password" name="password" required class="form-control" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
                    <p class="mt-3 text-center">
                        Don't have an account? <a href="<?= base_url('auth/register') ?>">Register here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
