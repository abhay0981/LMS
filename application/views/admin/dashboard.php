<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #eef2f3, #8e9eab);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            transform: perspective(1000px) rotateX(0deg);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 1rem;
        }
        .card:hover {
            transform: perspective(1000px) translateY(-10px) rotateX(3deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }
        .btn {
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            border-radius: 0.8rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }
        h2 {
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Welcome <?= $this->session->userdata('name'); ?>!</h2>
    <div class="text-right mb-4">
        <a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Courses</h5>
                    <p class="card-text display-4"><?= $total_courses ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-4">
                <div class="card-body">
                    <h5 class="card-title">Instructors</h5>
                    <p class="card-text display-4"><?= $total_instructors ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-4">
                <div class="card-body">
                    <h5 class="card-title">Students</h5>
                    <p class="card-text display-4"><?= $total_students ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <a href="<?php echo base_url('admin/course/create') ?>" class="btn btn-success btn-lg">+ Add New Course</a>
    </div>
</div>
</body>
</html>
