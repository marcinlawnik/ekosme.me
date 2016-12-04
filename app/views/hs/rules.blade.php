@extends('main')

@section('head')
    <style>
        .container {
            text-align: center;
        }
        h2 {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    @include('hs.nav')
    @include('messages')
    <div class="container">
        <img src="https://eu.battle.net/hearthstone/static/images/logos/logo.png">
        <div class="title">Zasady turnieju</div>
        <h4>Ogólne</h4>
            <ul>
                <li>Turniej organizuje Kuba Marszałkiewicz.</li>
                <li>Wszystkie wątpliwości rozstrzygane są niepodważalną decyzją organizatora.</li>
                <li>Nie wolno używać programów wspomagajcych dających nieuczciwą przewagę.</li>
                <li>W turnieju mogą brać udział tylko uczniowie EKOSu.</li>
                <li>Terminy meczy ustala organizator, ale, w przypadku braku czasu, termin meczu może ulec zmianie na pasujący obydwu graczom.</li>
                <li>Organizatorzy zastrzegają sobie prawo do modyfikowania zasad podczas trwania turnieju.</li>
            </ul>
        <h4>Interakcja</h4>
            <ul>
                <li>Zabrania się spamowania emotikonami w grze.</li>
                <li>Zabrania się także demotowywania, obrażania lub jakiejkolwiek formy negatywnego kontaktu (poprzez czat i inne komunikatory).</li>
                <li>Osoba oglądająca mecz nie może wysyłać jakichkolwiek informacji lub wiadomości do żadnego z graczy.</li>
            </ul>
        <h4>Talie</h4>
            <ul>
                <li>Każdy gracz w turnieju musi mieć 5 talii przygotowanych przed meczem dla różnych bohaterów.</li>
                <li>Talia może się składać z dowolnych kart, dostępnych w trybie standard.</li>
                <li>Talie można modyfikować pomiędzy meczami.</li>
            </ul>
        <h4>Rozgrywka</h4>
            <ul>
                <li>Mecze rozgrywane są między ludźmi.</li>
                <li>Mecze rozgrywane są w trybie STANDARD.</li>
                <li>Mecze można rozgrywać na dowolnym urządzeniu obsugującym klienta gry <a class="link" href="https://eu.battle.net/account/download/?show=hearthstone&style=hearthstone">Hearthstone: Heroes of Warcraft</a>.</li>
                <li>Jeżeli podczas meczu jeden z graczy zostanie rozłączony i nie będzie możliwy jego powrót, to mecz zostanie rozegrany ponownie w innym terminie, przy czym nie będą możliwe zmiany w wybranych bohaterach i przygotowanych taliach.</li>
                <li>Sędziami są gracze bioracy udział w pojedynku i każda osoba (nawet spoza turnieju) obserwująca dany mecz turniejowy.</li>
                <ul>
                    <li>Obserwujący i gracz może wysłać screenshota lub film do organizatora, gdy któryś z graczy łamie zasady.</li>
                    <li>Obserwujący i gracz musi wysłać screenshota lub film do organizatora z wynikiem meczu (ekran wygranej/przegranej).</li>
                    <li>Najlepiej, aby pojedynek oglądały dwie osoby: jedna od jednego gracza, a druga od drugiego. Nie jest to jednak wymagane.</li>
                </ul>
                <li>Wolno tylko raz zagrać jednym bohaterem z jednym graczem.</li>
                <li>Z tym samym graczem można grać tym samym bohaterem (tą samą talią) jeśli przegrałeś z tym graczem tym bohaterem (tą talią).</li>
                <li>Przed meczem każdy z graczy przedstawia do jakich bohaterów posiada talię, a gracz przeciwny wybiera dwóch bohaterów, których przeciwnik nie będzie mógł użyć w pojedynku. (nie dotyczy finałów)</li>
                <li>Nie można oskarżyć przeciwnika o oszukiwanie, bez niepodważalnych dowodów (screenshot lub film).</li>
                <li>Wszystkie mecze (oprócz finałów) są rozgrywane w formacie BO5.</li>
                <li>Mecz finałowy rozgrywany jest w formacie BO7 (banowana 1 talia).</li>
            </ul>
        </div>
        @include('hs.footer')
    </div>
@endsection
