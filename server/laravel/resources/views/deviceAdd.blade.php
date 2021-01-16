<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>デバイス追加</title>
    </head>
    <body>
        <form method="post">
            @csrf
                <input type="text" name="devices" />
                <input type="submit" />
        </form>
    </body>
</html>
