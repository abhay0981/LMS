<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h3>Edit Course</h3>
    <form action="<?= base_url('admin/course/edit/' . $course->id) ?>" method="post" enctype="multipart/form-data">
        <div class="form-group mt-3">
            <label>Course Title</label>
            <input type="text" name="title" class="form-control" required value="<?= $course->title ?>">
        </div>

        <div class="form-group mt-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="5"><?= $course->description ?></textarea>
        </div>

        <div class="form-group mt-3">
            <label>Current Thumbnail:</label><br>
            <?php if ($course->thumbnail): ?>
                <img src="<?= base_url('uploads/' . $course->thumbnail) ?>" width="100"><br><br>
            <?php endif; ?>
            <label>Change Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control-file">
        </div>

        <div class="form-group mt-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active" <?= $course->status === 'active' ? 'selected' : '' ?>>Active</option>
                <option value="inactive" <?= $course->status === 'inactive' ? 'selected' : '' ?>>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Update Course</button>
        <a href="<?= base_url('admin/course') ?>" class="btn btn-secondary mt-4">Back</a>
    </form>
</div>
</body>
</html>
