<!DOCTYPE html>
<html>
<head>
    <title>Add Lesson - <?= $course->title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h3>Add Lesson to: <?= $course->title ?></h3>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group mt-3">
            <label>Lesson Title</label>
            <input type="text" name="title" class="form-control" required placeholder="Enter lesson title">
        </div>

        <div class="form-group mt-3">
            <label>Lesson Content (Text)</label>
            <textarea name="content" rows="4" class="form-control" placeholder="Lesson description or notes"></textarea>
        </div>

        <div class="form-group mt-3">
            <label>Video URL (YouTube, Vimeo, etc)</label>
            <input type="text" name="video_url" class="form-control" placeholder="https://...">
        </div>

        <div class="form-group mt-3">
            <label>Upload File (PDF, PPT, etc)</label>
            <input type="file" name="file" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary mt-4">Add Lesson</button>
        <a href="<?= base_url('instructor/lesson/index/' . $course->id) ?>" class="btn btn-secondary mt-4">Back</a>
    </form>
</div>
</body>
</html>
