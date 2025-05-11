<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Afspraakbevestiging</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      padding: 20px;
    }
    .container {
      background-color: #fff;
      border-radius: 8px;
      padding: 20px;
      max-width: 600px;
      margin: auto;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    h1 {
      color: #111;
    }
    .footer {
      font-size: 12px;
      color: #888;
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Afspraak bevestigd</h1>
    <p>Beste {{ $name ?? 'klant' }},</p>
    
    <p>Je afspraak is succesvol bevestigd.</p>

    <p><strong>Datum:</strong> {{ $date ?? 'Nog niet opgegeven' }}<br>
    <strong>Tijd:</strong> {{ $time ?? 'Nog niet opgegeven' }}</p>

    <p>Bedankt voor het kiezen van The Hair Hub. We kijken ernaar uit je te verwelkomen!</p>

    <p>Met vriendelijke groet,<br>
    Het team van The Hair Hub</p>

    <div class="footer">
      © {{ date('Y') }} The Hair Hub. Alle rechten voorbehouden.
    </div>
  </div>
</body>
</html>