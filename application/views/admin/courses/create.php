<!DOCTYPE html>
<html>
<head>
    <title>Add New Course</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body {
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card-custom {
            background: #fff;
            padding: 30px;
            border-radius: 1rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
            transform: perspective(1000px) rotateX(0deg);
            transition: all 0.3s ease-in-out;
        }

        .card-custom:hover {
            transform: perspective(1000px) translateY(-10px) rotateX(3deg);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.35);
        }

        .form-control,
        .form-control-file,
        .form-control:focus {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 0.6rem;
        }

        .btn {
            transition: all 0.3s ease;
            border-radius: 0.8rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
        }

        h3 {
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-custom">
                <h3 class="mb-4 text-center">Add New Course</h3>

                <form action="<?= base_url('admin/course/create') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Course Title</label>
                        <input type="text" name="title" class="form-control" required placeholder="Enter course title">
                    </div>

                    <div class="form-group">
    <label>Instructor</label>
    <select name="instructor_id" class="form-control" required>
        <option value="">Select Instructor</option>
        <?php foreach ($instructors as $instructor): ?>
            <option value="<?= $instructor->id ?>"><?= $instructor->name ?></option>
        <?php endforeach; ?>
    </select>
</div>


                    <div class="form-group mt-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5" placeholder="Enter course description"></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label>Thumbnail Image</label>
                        <input type="file" name="thumbnail" class="form-control-file">
                    </div>

                    <div class="form-group mt-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success btn-lg mr-2">Create Course</button>
                        <a href="<?= base_url('admin/course') ?>" class="btn btn-secondary btn-lg">Back</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

</body>
</html>
