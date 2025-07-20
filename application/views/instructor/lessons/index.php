<!DOCTYPE html>
<html>
<head>
    <title>Lessons - <?= $course->title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h3>Lessons for: <?= $course->title ?></h3>
    <a href="<?= base_url('instructor/lessons/create/' . $course->id) ?>" class="btn btn-success mb-3">+ Add Lesson</a>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Video</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($lessons)): ?>
                <tr><td colspan="5">No lessons added yet.</td></tr>
            <?php else: ?>
                <?php foreach ($lessons as $index => $lesson): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $lesson->title ?></td>
                        <td>
                            <?php if ($lesson->video_url): ?>
                                <a href="<?= $lesson->video_url ?>" target="_blank">Watch</a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($lesson->file): ?>
                                <a href="<?= base_url('uploads/' . $lesson->file) ?>" target="_blank">Download</a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('instructor/lesson/delete/' . $lesson->id) ?>"
                               onclick="return confirm('Delete this lesson?')" class="btn btn-sm btn-danger">
                               Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="<?= base_url('instructor/course') ?>" class="btn btn-secondary">Back to Courses</a>
</div>
</body>
</html>
