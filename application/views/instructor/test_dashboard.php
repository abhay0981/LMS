<!DOCTYPE html>
<html>
<head>
    <title>Instructor Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Welcome Instructor <?= $name ?>!</h2>
    <a href="<?= base_url('logout') ?>" class="btn btn-danger mb-4">Logout</a>

    <h4>Your Courses</h4>

    <?php if (empty($courses)): ?>
        <p>You don’t have any assigned courses yet.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?= $course->title ?></td>
                        <td><?= ucfirst($course->status) ?></td>
                        <td>
                            <a href="<?= base_url('instructor/lesson/index/' . $course->id) ?>" class="btn btn-sm btn-primary">Manage Lessons</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>
