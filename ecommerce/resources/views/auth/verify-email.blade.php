<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérification de l'Email Requise</title>
    <style>
        body {
            font-family: sans-serif;
            background: #fff8f0;
            margin: 0;
            padding: 2rem;
            text-align: center;
        }
        .box {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2 {
            color: #d97706;
        }
        form {
            margin-top: 1rem;
        }
        button {
            background: #4CAF50;
            border: none;
            padding: 0.7rem 1.2rem;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #45a049;
        }
        .message {
            margin-top: 1rem;
            color: green;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Vérifiez votre Email</h2>
        <p>Avant d'accéder à l'application, veuillez vérifier votre boîte de réception pour un lien de vérification.</p>
        <p>Si vous n'avez pas reçu l'email, cliquez sur le bouton ci-dessous pour en demander un autre.</p>

        @if (session('message'))
            <div class="message">{{ session('message') }}</div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">Renvoyer l'Email de Vérification</button>
        </form>
    </div>
</body>
</html>
