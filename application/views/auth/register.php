<!DOCTYPE html>
<html>
<head>
    <title>Register - LMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background: linear-gradient(to right, #f1f2b5, #135058);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card-register {
            background: #fff;
            padding: 40px 30px;
            border-radius: 1rem;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
            transform: perspective(1000px) rotateX(0deg);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-register:hover {
            transform: perspective(1000px) translateY(-10px) rotateX(3deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.35);
        }

        .btn {
            border-radius: 0.7rem;
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.25);
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .form-control {
            border-radius: 0.5rem;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        h3 {
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.15);
            color: #333;
        }

        .alert {
            border-radius: 0.6rem;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card-register">
                <h3 class="text-center mb-4">Register</h3>

                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('success'); ?>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?= base_url('auth/register') ?>">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" required class="form-control" placeholder="Full name">
                    </div>

                    <div class="form-group mt-3">
                        <label>Email</label>
                        <input type="email" name="email" required class="form-control" placeholder="Email address">
                    </div>

                    <div class="form-group mt-3">
                        <label>Password</label>
                        <input type="password" name="password" required class="form-control" placeholder="Create password">
                    </div>

                    <div class="form-group mt-3">
                        <label>Select Role</label>
                        <select name="role" class="form-control" required>
                            <option value="">-- Select Role --</option>
                            <option value="student">Student</option>
                            <option value="instructor">Instructor</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success btn-block mt-4">Register</button>

                    <p class="mt-3 text-center">
                        Already have an account?
                        <a href="<?= base_url('auth/login') ?>">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JS (Bootstrap + jQuery) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
