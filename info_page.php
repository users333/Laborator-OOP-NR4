<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informații despre UTM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
            padding-top: 50px;
            position: relative;
        }
        h1 {
            color: #0066cc;
        }
        
        /* Stiluri pentru butonul de logout */
        .btn-logout {
            background-color: #000;
            border: none;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .btn-logout:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <h1>Bine ai venit</h1>
    <h2>Universitatea Tehnică din Moldova</h2>
    <p>Universitatea Tehnică din Moldova (UTM) este una dintre cele mai importante instituții de învățământ superior tehnic din Republica Moldova. Fondată în 1964, UTM oferă programe educaționale de înaltă calitate în domenii precum inginerie, informatică, arhitectură, științe aplicate și multe altele.</p>
    <p>Pentru mai multe informații, vizitați <a href="https://utm.md/">site-ul oficial al UTM</a>.</p>

    <!-- Butonul de Log out -->
    <button onclick="logout()" id="logoutButton" class="btn-logout">Logout</button>

    <script>
        // Funcția JavaScript pentru logout
        function logout() {
            window.location.href = "welcomePage.html"; // Redirecționează către pagina de bun venit
        }
    </script>
</body>
</html>
