<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Afspraakbevestiging</title>
  
</head>
<body>
  <div>
    
    <h1>Afspraak bevestigd</h1>
    <p>Beste {{$customer_name}},</p>
    
    <p>Je afspraak is succesvol bevestigd.</p>

    <p><strong>Datum:</strong> {{$date}}<br>
    <strong>Tijd:</strong> {{$time}}</p>
    <p><strong>Kapper: </strong> {{ $barber }}</p>
    <p><strong>Behandeling: </strong> {{ $treatment }}</p>

    <br>
      <p><strong>Naam: </strong>  {{$customer_name}}</p>
      <p><strong>Email: </strong> {{ $email }}</p>
      <p><strong>Telefoonnummer: </strong> {{ $phone_number }}</p>
      
    
    <p>Bedankt voor het kiezen van The Hair Hub. We kijken uit naar je bezoek!</p>

    <p>Met vriendelijke groet,<br>
    The Hair Hub</p>


    <p>Klik <a href="http://localhost/afspraak/bewerken/{{ urlencode($email) }}">hier</a> om de aspraak te wijzigen</p>

    <div class="footer">
      © {{ date('Y') }} The Hair Hub. Alle rechten voorbehouden.
    </div>
  </div>
</body>
</html>