<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Set Password - Hajuenter Kasir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .reset-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        .reset-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .reset-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px; /* Mengurangi margin bottom agar tidak terlalu jauh */
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .reset-form label {
            display: block;
            margin-bottom: 1px;
        }

        .reset-form button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .reset-form button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            font-size: 0.8em; /* Ukuran font sedikit lebih kecil dari input */
            margin-top: 1px; /* Jarak antara pesan error dengan input */
        }
    </style>
</head>

<body>
    <div class="reset-form">
        <h2>Set Password - Hajuenter Kasir</h2>
        <form action="{{ url('password_baru/' . $token) }}" method="post">
            {{ csrf_field() }}

            <label for="new-password">Set Password</label>
            <input type="password" id="new-password" name="password" placeholder="Masukkan password" required value="{{ old('password') }}">
            <span class="error-message">{{ $errors->first('password') }}</span>
            

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Masukkan kembali password" required>
            <span class="error-message">{{ $errors->first('confirm_password') }}</span>
            

            <button type="submit">Set Password</button>
        </form>
    </div>
</body>

</html>
