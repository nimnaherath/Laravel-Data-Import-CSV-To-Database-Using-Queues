<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div class="container m-auto p-4">
        <h1 class="display-4">
            Import 1 Million Data form csv
        </h1>

        <form action="">
            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile">
            </div>

            <button class="btn btn-primary" type="submit">Upload</button>
        </form>
    </div>
</body>
</html>
