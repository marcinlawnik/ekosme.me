Hej {{ $firstName }},\r\n
\r\n
Dzięki za rejestrację w naszym serwisie ekosme.me.\r\n
Najnowsze memy zaczniesz otrzymywać po potwierdzeniu adresu konta e-mail.\r\n
\r\n
Kliknij w link poniżej:\r\n
\r\n
{{ URL::to('subscribe/confirm/' . $confirmationCode) }}\r\n
\r\n
Pozdrawiamy,\r\n
Zespół ekosme.me