<!DOCTYPE html>
<html>
<head>
    <title>All Courses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container-custom {
            background: #fff;
            padding: 30px;
            margin-top: 50px;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
            transform: perspective(1000px) rotateX(0deg);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .container-custom:hover {
            transform: perspective(1000px) translateY(-10px) rotateX(2deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table img {
            border-radius: 0.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .btn-action {
            margin: 0 4px;
            transition: all 0.2s ease;
            border-radius: 0.5rem;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        h2 {
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        .alert {
            border-radius: 0.8rem;
        }
    </style>
</head>
<body>

<div class="container container-custom">
    
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">All Courses</h2>
        <a href="<?= base_url('admin/course/create') ?>" class="btn btn-success btn-action">+ Add New</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover bg-white">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Thumbnail</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($courses)): ?>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?= htmlspecialchars($course->title) ?></td>
                        <td><?= ucfirst($course->status) ?></td>
                        <td>
                            <?php if ($course->thumbnail): ?>
                                <img src="<?= base_url('uploads/' . $course->thumbnail) ?>" width="80">
                            <?php else: ?>
                                <span class="text-muted">No image</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/course/edit/' . $course->id) ?>" class="btn btn-primary btn-sm btn-action">Edit</a>
                            <a href="<?= base_url('admin/course/delete/' . $course->id) ?>" onclick="return confirm('Delete this course?')" class="btn btn-danger btn-sm btn-action">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center text-muted">No courses available.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
