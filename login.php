<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = "All fields are required!";
    } elseif ($username === "nicole" && $password === "nicole08") {
        $_SESSION['username'] = $username;
        header("Location: resume.php"); 
        exit();
    } else {
        $error = "Invalid login credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: linear-gradient(to bottom, #fff9c4, #c4e17f); 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container { 
            width: 350px; 
            padding: 30px; 
            background: white; 
            border-radius: 15px; 
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
            border-left: 6px solid #f4c430;
        }

        h2 { color: #2e7d32; margin-bottom: 5px; }
        h4 { color: #9e9e9e; font-weight: normal; margin-bottom: 20px; }

        input {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 6px;
            border: 1px solid #bbb;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: #f4c430;
            box-shadow: 0 0 5px rgba(244,196,48,0.5);
        }

        button {
            width: 95%;
            padding: 10px;
            margin-top: 15px;
            background: #f4c430;
            color: #333;
            border: none;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover { background: #ffda47; }

        .error { 
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .leaf { font-size: 40px; color: #f4c430; }

        .show-pass { 
            font-size: 13px; 
            color: #555;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="leaf">🌻</div>
        <h2>Welcome!</h2>
        <h4>Please log in to continue</h4>
        <form method="POST">
            <input type="text" name="username" placeholder="Enter Username"><br>
            <input type="password" id="password" name="password" placeholder="Enter Password"><br>
            <input type="checkbox" onclick="togglePassword()"> <span class="show-pass">Show Password</span><br>
            <button type="submit">LOG IN</button>
        </form>
        <p class="error"><?php echo $error; ?></p>
    </div>

<script>
function togglePassword() {
    var x = document.getElementById("password");
    x.type = x.type === "password" ? "text" : "password";
}
</script>

</body>
</html>
