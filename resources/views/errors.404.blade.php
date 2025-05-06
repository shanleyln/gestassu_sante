<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Page 404 - Non trouvée</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .error-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      text-align: center;
      background-color: #f8f9fa;
    }
    .error-image {
      max-width: 400px;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>
  <div class="error-container">
    <img src="https://cdn-icons-png.flaticon.com/512/2748/2748558.png" alt="404 Not Found" class="error-image">
    <h1 class="display-4 text-danger">404</h1>
    <p class="lead">Oups ! Cette page n'existe pas.</p>
    <a href="{{route('logout')}}" class="btn btn-primary mt-3">Retour à l'accueil</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
