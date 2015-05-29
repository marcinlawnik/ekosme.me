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
    <div class="container">
        <img src="http://upload.wikimedia.org/wikipedia/en/1/1c/Hearthstone_Logo.png">
        <div class="title">Zasady turnieju</div>
        <h4>Interakcja</h4>
            <ul>
                <li>Zabrania sie spamowania emotikonami w grze.</li>
                <li>Lub demotowywania, obrażania lub jakiejkolwiek formy negatywnego kontaku(poprzez czat i inne komunikatory).</li>
                <li>Osoba oglądająca mecz nie może wysyłać jakichkolwiek informacji lub wiadomości do żadnego z graczy.</li>
            </ul>
        <h4>Ogólne</h4>
            <ul>
                <li>Turniej organizują: Marcin Ławniczak, Kuba Marszakiewicz, Michał Roszak.</li>
                <li>Wszystkie wątpliwości rozstrzygane są niepodważalną decyzją organizatora.</li>
                <li>Nie wolno używać programów wspomagajcych dajcych nieuczciw przewagę.</li>
                <li>W turnieju mogą brać udział tylko uczniowie EKOSu.</li>
                <li>Terminy meczy ustala organizator, ale, w przypadku braku czasu, może on ulec zmianie na pasujący obydwu graczom.</li>
            </ul>
        <h4>Talie</h4>
            <ul>
                <li>Każdy gracz w turnieju musi mieć 5 talii przygotowanych przed meczem dla różnych bohaterów.</li>
                <li>Każda talia może zawierać maksymalnie:
                <br/>
                <ul>
                    <li>2 karty legendarne,</li>
                    <li>8 kart epickich,</li>
                    <li>15 kart rzadkich,</li>
                    <li>30 kart podstawowych.</li>
                </ul>
            </ul>
        <h4>Rozgrywka</h4>
            <ul>
                <li>Mecze rozgrywane są między ludźmi.</li>
                <li>Mecze można rozgrywać na dowolnym urządzeniu obsugujący klienta gry <a class="link" href="https://eu.battle.net/account/download/?show=hearthstone&style=hearthstone">Herathstone: Heroes of Warcraft</a>.</li>
                <li>Jeżeli podczas meczu jeden z graczy zostanie rozłączony i nie będzie możliwy jego powrót, to mecz zostanie rozegrany ponownie w innym terminie, przy czym nie będą możliwe zmiany w wybranych bohaterach i przygotowanych taliach.</li>
                <li>Sędziami są gracze bioracy udział w pojedynku i każda osoba(nawet spoza turnieju) obserwująca dany mecz turniejowy.</li>
                <ul>
                    <li>Obserwujący i gracz może wysłać screenshota lub film do organizatora, gdy któryś z graczy łamie zasady.</li>
                    <li>Obserwujący i gracz musi wysłać screenshota lub film z wynikiem meczu(ekran wygranej/przegranej).</li>
                    <li>Najlepiej, aby pojedynek oglądały dwie osoby: jedna od jednego gracza, a druga od drugiego. Nie jest to jednak wymagane.</li>
                </ul>
                <li>Wolno tylko raz zagrać jednym bohaterem z jednym graczem.</li>
                <li>Przed meczem każdy z graczy przedstawia do jakich bohaterów posiada talię, a gracz przeciwny wybiera dwóch bohaterów, których przeciwnik nie będzie mógł użyć w pojedynku.</li>
                <li>Nie można oskarżyć przeciwnika o oszukiwanie, bez niepodważalnych dowodów (screenshot lub film).</li>
                <li>Wszystkie mecze(oprócz finałów) są rozgrywane w formacie BO3.</li>
                <li>Mecz finałowy rozgrywany jest w formacie <b>BO5</b>.</li>
            </ul>
        </div>
        @include('hs.footer')
    </div>
@endsection
