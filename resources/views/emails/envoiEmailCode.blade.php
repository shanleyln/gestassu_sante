<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Code de vérification - INGENIUM-SANTE</title>
    {{-- Les styles CSS sont souvent mieux en ligne pour une compatibilité maximale des clients mail --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            max-width: 100px;
        }

        .title {
            color: #5e2d17;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .code-box {
            background-color: #5e2d17;
            color: white;
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            padding: 20px;
            border-radius: 6px;
            letter-spacing: 4px;
            margin: 30px 0;
        }

        .footer {
            font-size: 12px;
            color: #999;
            margin-top: 30px;
            text-align: center;
        }

        p {
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <div class="email-container bg-light shadow">
        <div class="header">
            {{-- Assurez-vous que le lien de l'image est absolu --}}
            <img src="https://ingenium-assurance.com/images/logo-ingenium-assu.png" alt="Logo INGENIUM-SANTE" class="logo">
        </div>

        <div class="title">Votre code de vérification</div>

        <p>Bonjour,</p>
        <p>Voici votre code de vérification pour accéder à votre espace sur <strong>INGENIUM-SANTE</strong>.
            Saisissez-le sur la page de vérification.</p>

        {{-- La variable $code est directement accessible ici grâce au Mailable --}}
        <div class="code-box">{{ $code }}</div>

        <p>Ce code est valable pendant <strong>10 minutes</strong>.</p>
        <p>Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer cet e-mail en toute sécurité.</p>

        <p>Cordialement,<br>L’équipe <strong>{{ config('app.name') }}</strong></p>

        <div class="footer">
            Cet e-mail est généré automatiquement, merci de ne pas y répondre.<br>
            © {{ now()->year }} {{ config('app.name') }} - Tous droits réservés.
        </div>
    </div>
</body>

</html>
