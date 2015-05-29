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
                <li>Turniej organizują: MŁ, KM, MR.</li>
                <li>Wszystkie wątpliwości rozstrzygane są niepodważalną decyzją organizatora.</li>
                <li>Nie wolno używać cheatów i haków.</li>
                <li>W turnieju mogą brać udział tylko uczniowie i pracownicy ekosu.</li>
                <li>Terminy meczy ustala organizator, ale, gdy któryś nie odpowiada graczowi, może on ulec zmianie na pasujący obydwu graczom.</li>
            </ul>
        <h4>Talie</h4>
            <ul>
                <li>Każdy gracz w turnieju musi mieć 5 talii przygotowanych przed meczem dla różnych bohaterów.</li>
                <li>Każda talia może zawierać maksymalnie:
                <br/>
                <ul>
                    <li>2 karty legendarne,</li>
                    <li>6 kart epickich,</li>
                    <li>12 kart rzadkich,</li>
                    <li>20 kart podstawowych.</li>
                </ul>
                <li>Zabronione jest korzystanie z talii typu Face Hunter.</li>
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
                <li>Przed meczem każdy z graczy przedstawia do jakich bohaterów posiada talię, a gracz przeciwny wybiera dwóch bohaterów, których przeciwnika nie będzie mógł użyć w pojedynku.</li>
                <li>Nie można oskarżyć przeciwnika o oszukiwanie, bez niepodważalnych dowodów(screenshot lub film).</li>
                <li>Wszystkie mecze(oprócz finałów) są rozgrywane w formacie BO3.</li>
                <li>Mecz finałowy rozgrywany jest w formacie <b>Bo5</b>.</li>
            </ul>
        </div>
        @include('hs.footer')
    </div>
@endsection
