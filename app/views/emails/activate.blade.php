Hej {{ $firstName }},<br>
<br>
Dzięki za rejestrację w naszym serwisie ekosme.me.<br>
Najnowsze memy zaczniesz otrzymywać po potwierdzeniu adresu konta e-mail.<br>
<br>
Kliknij w link poniżej:<br>
<br>
{{ URL::to('subscribe/confirm/' . $confirmationCode) }}<br>
<br>
Pozdrawiamy,<br>
Zespół ekosme.me