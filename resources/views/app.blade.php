<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Students</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    </head>
    <body>
        <h1><span class="badge bg-secondary">Students</span></h1>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">See all</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Add</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Edit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Remove</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Find</a>
            </li>
        </ul>
    </body>

    @yield('content')
</html>