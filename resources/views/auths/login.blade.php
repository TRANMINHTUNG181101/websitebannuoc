<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
</head>

<body>
    <div class="main">
        <form action="{{ route('authlogin') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="">password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" style="color: aqua">Dang nhap</button>
        </form>
    </div>
</body>

</html>
