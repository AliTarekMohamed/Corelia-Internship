<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOM XSS</title>
</head>

<body>
    <h1>DOM XSS Example</h1>
    <form action="" method="get">
        <label>Search for something</label><br>
        <input id="search" type="text" name="search">
        <button type="submit" name="submit">Submit</button><br><br>
    </form>

    <script>
        var search_term = (new URLSearchParams(window.location.search).get('search'));
        if (search_term) {
            document.write("<h2>Results for " + search_term + "</h2>");
        }
    </script>
</body>

</html>