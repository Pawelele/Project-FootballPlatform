<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel trenera</title>
  <link rel="stylesheet" href="css/panel.css">

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700&display=swap" rel="stylesheet">
  <!-- scripts -->
  <!-- axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" defer></script>
  <script src="js/weather.js" defer></script>
  <script src="js/coach.js" defer></script>
</head>
<?php
  session_start();
  if($_SESSION["session_login"]==true && $_SESSION["session_type"] == "coach")
  {
?>
<body>

  <!-- Popups -->
  <div class="add-match-popup coach-popup">
    <div class="coach-popup__top">
      <p class="coach-popup__title">Dodawanie meczu</p>
      <p class="coach-popup__exit">X</p>
    </div>

    <form action="php/addMatch.php" method="post" class="coach-popup__form">
      <input type="text" name="adress" id="adress" class="coach-popup__input" placeholder="Miejsce rozgrywania meczu" required>
      <input type="text" name="group_nr" id="group_nr" class="coach-popup__input" placeholder="Numer grupy" required>
      <input type="text" name="rival" id="rival" class="coach-popup__input" placeholder="Nazwa klubu rywala" required>
      <select name="match_type" id="match_type" class="coach-popup__input" required>
        <option value="Ligowy" selected>Ligowy</option>
        <option value="Sparing">Sparing</option>
      </select>
      <input type="text" name="match_date" id="match_date" class="coach-popup__input" placeholder="Data w formacie DD.MM" required>
      <input type="time" name="match_time" id="match_time" class="coach-popup__input" placeholder="Godzina rozgrywania meczu" required>
      <button type="submit" class="coach-popup__button">Dodaj</button>
    </form>
  </div>

  <div class="add-training-popup coach-popup">
    <div class="coach-popup__top">
      <p class="coach-popup__title">Dodawanie treningu</p>
      <p class="coach-popup__exit">X</p>
    </div>

    <form action="php/addTraining.php" method="post" class="coach-popup__form coach-popup__form--training">
      <input type="text" name="adress" id="adress" class="coach-popup__input" placeholder="Miejsce rozgrywania treningu" required>
      <input type="number" name="group_nr" id="group_nr" class="coach-popup__input" placeholder="Numer grupy" required>
      <input type="number" name="duration" id="duration" class="coach-popup__input" placeholder="Czas trwania treningu" required>
      <input type="text" name="training_date" id="training_date" class="coach-popup__input" placeholder="Data w formacie DD.MM" required>
      <input type="time" name="training_time" id="training_time" class="coach-popup__input" placeholder="Godzina treningu" required>
      <button type="submit" class="coach-popup__button">Dodaj</button>
    </form>
  </div>

  <div class="add-announcement-popup coach-popup">
    <div class="coach-popup__top">
      <p class="coach-popup__title">Dodawanie ogłoszenia</p>
      <p class="coach-popup__exit">X</p>
    </div>

    <form action="php/addAnnouncement.php" method="post" class="coach-popup__form">
      <input type="text" name="sender" id="sender" class="coach-popup__input" placeholder="Nadawca" required>
      <input type="text" name="group_nr" id="group_nr" class="coach-popup__input" placeholder="Numer grupy" required>
      <select name="target_group" id="target_group" class="coach-popup__input" required>
        <option value="1" selected>Do zawodników</option>
        <option value="0">Do rodziców</option>
      </select>
      <input type="text" name="message" id="message" class="coach-popup__input" placeholder="Treść ogłoszenia" required>
      <button type="submit" class="coach-popup__button">Dodaj</button>
    </form>
  </div>

  <div class="add-match-result-popup coach-popup">
    <div class="coach-popup__top">
      <p class="coach-popup__title">Zatwierdzanie meczu</p>
      <p class="coach-popup__exit">X</p>
    </div>

    <form action="php/addMatchResult.php" method="post" class="coach-popup__form">
      <label for="match_id">ID meczu:</label>
      <input type="number" name="match_id" id="match_id" class="coach-popup__input" required readonly>
      <label for="rival">Klub rywala:</label>
      <input type="text" name="rival" id="rival" class="coach-popup__input" required readonly>
      <label for="played">Rozegrany:</label>
      <input type="checkbox" value=1 name="played" id="played" checked required readonly>
      <input type="text" name="result" id="result" class="coach-popup__input" placeholder="Wynik" required>
      <button type="submit" class="coach-popup__button">Zapisz</button>
    </form>
  </div>

  <div class="add-absent-popup coach-popup">
    <div class="coach-popup__top">
      <p class="coach-popup__title">Dodawanie nieobecności</p>
      <p class="coach-popup__exit">X</p>
    </div>

    <form action="php/addAbsent.php" method="post" class="coach-popup__form">
      <input type="text" name="player_id" id="player_id" class="coach-popup__input" placeholder="ID zawodnika" required>
      <input type="text" name="date" id="date" class="coach-popup__input" placeholder="Data nieobecności" required>
      <label for="absent_type">Rodzaj nieobecności:</label>
      <select name="absent_type" id="absent_type" class="coach-popup__input" required>
        <option value="Trening" selected>Trening</option>
        <option value="Mecz">Mecz</option>
      </select>
      <button type="submit" class="coach-popup__button">Dodaj</button>
    </form>
  </div>

  <div class="add-player-popup coach-popup">
    <div class="coach-popup__top">
      <p class="coach-popup__title">Dodawanie nowego zawodnika</p>
      <p class="coach-popup__exit">X</p>
    </div>

    <form action="php/addPlayer.php" method="post" class="coach-popup__form">
      <input type="text" name="name" id="name" class="coach-popup__input" placeholder="Imie" required>
      <input type="text" name="surname" id="surname" class="coach-popup__input" placeholder="Nazwisko" required>
      <input type="text" name="group_nr" id="group_nr" class="coach-popup__input" placeholder="Przypisanie do grupy nr" required>
      <input type="text" name="email" id="email" class="coach-popup__input" placeholder="Email" required>
      <input type="text" name="password" id="password" class="coach-popup__input" placeholder="Hasło do logowania" required>
      <button type="submit" class="coach-popup__button">Dodaj</button>
    </form>
  </div>

  <div class="add-group-popup coach-popup">
    <div class="coach-popup__top">
      <p class="coach-popup__title">Dodawanie nowej grupy</p>
      <p class="coach-popup__exit">X</p>
    </div>

    <form action="php/addGroup.php" method="post" class="coach-popup__form">
      <input type="text" name="name" id="name" class="coach-popup__input" placeholder="Nazwa grupy" required>
      <input type="number" name="coach_id" id="coach_id" class="coach-popup__input" placeholder="ID przypisanego trenera" required>
      <input type="text" name="group_age" id="group_age" class="coach-popup__input" placeholder="Rocznik" required>
      <button type="submit" class="coach-popup__button">Dodaj</button>
    </form>
  </div>

  <div class="success_popup coach-popup coach-popup--info">
    <div class="coach-popup__top">
      <p class="coach-popup__title">Sukces</p>
      <p class="coach-popup__exit">X</p>
    </div>
    <br><img src="img/success.png" alt="Ikona sukcesu" class="coach-popup__img"><br>
    <h2>Operacja wykonana pomyślnie</h2><br>
  </div>

  <main class="dashboard">
    <div class="top-bar"></div>
    <h1 class="title">Cześć, Jan!</h1>

    <section class="dashboard-panel dashboard-panel--activeMenu">
      <div class="data-box">
        <div class="data-box__top">
          <p>Najblizsze treningi</p>
          <button class="data-box__top-coach-button button-add-training">Dodaj</button>
        </div>
        <div class="data-box__data data-box__data--practice">
          <!-- <div class="data-box__data-row">
            <div class="data-box__data-row-left">
              <p>16.01</p>
              <p>17:00</p>
            </div>
            <div class="data-box__data-row-center">
              <p>Boisko ul. Kwiatowa 5</p>
            </div>
            <div class="data-box__data-row-right">
              <p>90 min</p>
            </div>
          </div> -->
          <!-- <div class="data-box__data-row">
            <div class="data-box__data-row-left">
              <p>16.01</p>
              <p>17:00</p>
            </div>
            <div class="data-box__data-row-center">
              <p>Boisko klubowe</p>
            </div>
            <div class="data-box__data-row-right">
              <p>90 min</p>
            </div>
          </div> -->
        </div>
      </div>

      <div class="data-box">
        <div class="data-box__top">
          <p>Najblizsze mecze</p>
          <button class="data-box__top-coach-button button-add-match">Dodaj</button>
        </div>
        <div class="data-box__data data-box__data--match">
          <!-- <div class="data-box__data-row">
            <div class="match_id">1</div>
            <div class="data-box__data-row-left">
              <p>16.01</p>
              <p>17:00</p>
            </div>
            <div class="data-box__data-row-center">
              <p class="rival">GKS Katowice</p>
              <p>Boisko klubowe</p>
            </div>
            <div class="data-box__data-row-right">
              <p>Ligowy</p>
              <button class="data-box__result-btn button-add-match-result">wynik</button>
            </div>
          </div> -->
          <!-- <div class="data-box__data-row">
            <div class="match_id">2</div>
            <div class="data-box__data-row-left">
              <p>16.01</p>
              <p>17:00</p>
            </div>
            <div class="data-box__data-row-center">
              <p>GKS Rozbark Bytom</p>
              <p>Boisko klubowe</p>
            </div>
            <div class="data-box__data-row-right">
              <p>Ligowy</p>
              <button class="data-box__result-btn button-add-match-result">wynik</button>
            </div>
          </div> -->
        </div>
      </div>

      <!-- <div class="data-box">
        <div class="data-box__top">
          <p>Najlepsi strzelcy</p>
        </div>
        <div class="data-box__data data-box__data--shooter">
          <div class="data-box__data-row">
            <div class="data-box__data-row-left">
              <p>1</p>
            </div>
            <div class="data-box__data-row-center">
              <p>Mateusz Kowalski</p>
            </div>
            <div class="data-box__data-row-right">
              <p>8</p>
            </div>
          </div>
          <div class="data-box__data-row">
            <div class="data-box__data-row-left">
              <p>2</p>
            </div>
            <div class="data-box__data-row-center">
              <p>Jan Nowak</p>
            </div>
            <div class="data-box__data-row-right">
              <p>5</p>
            </div>
          </div>
        </div>
      </div> -->

      <div class="data-box">
        <div class="data-box__top">
          <p>Rozegrane mecze</p>
        </div>
        <div class="data-box__data data-box__data--played-match">
          <!-- <div class="data-box__data-row">
            <div class="data-box__data-row-left">
              <p>16.01</p>
              <p>17:00</p>
            </div>
            <div class="data-box__data-row-center">
              <p>GKS Katowice</p>
              <p>2:4</p>
            </div>
            <div class="data-box__data-row-right">
              <p>Ligowy</p>
            </div>
          </div> -->
          <!-- <div class="data-box__data-row">
            <div class="data-box__data-row-left">
              <p>16.01</p>
              <p>17:00</p>
            </div>
            <div class="data-box__data-row-center">
              <p>GKS Rozbark Bytom</p>
              <p>3:2</p>
            </div>
            <div class="data-box__data-row-right">
              <p>Ligowy</p>
            </div>
          </div> -->
        </div>
      </div>

      <div class="data-box">
        <div class="data-box__top">
          <p>Ostatnie nieobecności</p>
          <button class="data-box__top-coach-button button-add-absent">Dodaj</button>
        </div>
        <div class="data-box__data data-box__data--absents">
          <!-- <div class="data-box__data-row">
            <div class="data-box__data-row-left">
              <p>1.</p>
            </div>
            <div class="data-box__data-row-center">
              <p>18.04.2022</p>
            </div>
          </div> -->
          <!-- <div class="data-box__data-row">
            <div class="data-box__data-row-left">
              <p>2.</p>
            </div>
            <div class="data-box__data-row-center">
              <p>22.02.2022</p>
            </div>
            <div class="data-box__data-row-right">
              <p>Trening</p>
            </div>
          </div> -->
        </div>
      </div>

    </section>

    <section class="dashboard-menu dashboard-menu--active">
      <img src="img/bars-solid.svg" class="dashboard-menu__bars">
      <div class="dashboard-menu__top">
        <p class="dashboard-menu__top-name">Jan Nowak</p>
        <a href="php/logout.php"><button class="dashboard-menu__top-button">Wyloguj</button></a>
      </div>
      <button class="add-new-button add-new-button--player add-new-player">Dodaj zawodnika</button>
      <button class="add-new-button add-new-button--group add-new-group">Dodaj grupe</button>

      <div class="dashboard-menu__messages">
        <p class="dashboard-menu__messages-title">Ogłoszenia:</p>
        <button class="dashboard-menu__messages-add">Dodaj</button>
        <!-- <div class="dashboard-menu__announcement">
          <div class="dashboard-menu__announcement-top">
            <div class="dashboard-menu__announcment-title">Maciej Kot</div>
            <div class="dashboard-menu__announcment-date">18.01 22:15</div>
          </div>
          <div class="dashboard-menu__announcment-message">Cześć, spóźnie się 10 minut na trening. Zróbcie rozgrzewkę, bo jak nie to będzie słąbo Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur.</div>
        </div> -->
        <!-- <div class="dashboard-menu__announcement">
          <div class="dashboard-menu__announcement-top">
            <div class="dashboard-menu__announcment-title">Maciej Kot</div>
            <div class="dashboard-menu__announcment-date">18.01 22:15</div>
          </div>
          <div class="dashboard-menu__announcment-message">Cześć, spóźnie się 10 minut na trening. Zróbcie rozgrzewkę</div>
        </div> -->
      </div>

      <div class="weather-widget">
        <div class="weather-left">
            <div class="weather-city part"><h3></h3></div>
        </div>
        <div class="weather-middle">
          <div class="weather-temperature part"></div>
        </div>
        <div class="weather-right">
            <img class="weather-img">
        </div>
      </div>
    </section>
  </main>

  <script src="js/player_panel.js"></script>
  <?php
    require_once "php/connect.php";

    if($connect->connect_errno!=0)
    {
        // echo "Error: ".$connect->connect_errno;
        echo "<br></nr>Błąd bazy danych";
    }
    else
    {
      @$sql_trening = "SELECT * FROM Treningi";
      @$sql_mecz = "SELECT * FROM Mecze where Rozegrany = 0";
      @$sql_mecz_rozegrany = "SELECT * FROM Mecze where Rozegrany = 1";
      @$sql_strzelec = "SELECT Strzelcy.Id_strzelca, Strzelcy.Ilosc_bramek, Zawodnicy.Imie FROM Strzelcy join Zawodnicy on Zawodnicy.id_zawodnika = Strzelcy.id_zawodnika";
      @$sql_ogloszenie = "SELECT * FROM Ogloszenia";
      @$sql_nieobecnosc = "SELECT * FROM Nieobecnosci";

      $connect-> query("SET NAMES 'utf8'");


      if($rezultat = @$connect->query($sql_trening))
      {
        while($row = mysqli_fetch_assoc($rezultat))
        {

          $id_treningu = $row['Id_treningu'];
          $adres = $row['Adres'];
          $czas_trwania = $row['Czas_trwania'];
          $data = $row['Data'];
          $godzina = $row['Godzina'];

          echo '<script type="text/javascript">',
          'addPractice("',
          $adres,
          '","',
          $czas_trwania,
          '","',
          $data,
          '", "',
          $godzina,
          '");',
          '</script>'
          ;
        }
      }

      if($rezultat = @$connect->query($sql_mecz))
      {
        while($row = mysqli_fetch_assoc($rezultat))
        {

          $id_meczu = $row['Id_meczu'];
          $adres = $row['Adres'];
          $przeciwnik= $row['Przeciwnik'];
          $data = $row['Data'];
          $godzina = $row['Godzina'];
          $typ_meczu = $row['Typ_meczu'];

          echo '<script type="text/javascript">',
          'addCoachMatch("',
          $id_meczu,
          '","',
          $adres,
          '","',
          $przeciwnik,
          '","',
          $typ_meczu,
          '","',
          $data,
          '", "',
          $godzina,
          '");',
          '</script>'
          ;
        }
      }

      if($rezultat = @$connect->query($sql_mecz_rozegrany))
      {
        while($row = mysqli_fetch_assoc($rezultat))
        {

          $id_meczu = $row['Id_meczu'];
          $wynik = $row['Wynik'];
          $przeciwnik= $row['Przeciwnik'];
          $data = $row['Data'];
          $godzina = $row['Godzina'];
          $typ_meczu = $row['Typ_meczu'];

          echo '<script type="text/javascript">',
          'addCoachPlayedMatch("',
          $id_meczu,
          '","',
          $wynik,
          '","',
          $przeciwnik,
          '","',
          $typ_meczu,
          '","',
          $data,
          '", "',
          $godzina,
          '");',
          '</script>'
          ;
        }
      }

      if($rezultat = @$connect->query($sql_ogloszenie))
      {
        while($row = mysqli_fetch_assoc($rezultat))
        {

          $id_ogloszenia = $row['id_ogloszenia'];
          $nadawca = $row['Nadawca'];
          $data= $row['Data'];
          $tresc = $row['Tresc'];

          echo '<script type="text/javascript">',
          'addAnnouncement("',
          $nadawca,
          '","',
          $data,
          '","',
          $tresc,
          '");',
          '</script>'
          ;
        }
      }

      if($rezultat = @$connect->query($sql_nieobecnosc))
      {
        while($row = mysqli_fetch_assoc($rezultat))
        {

          $id_nieobecnosci = $row['Id_nieobecnoscni'];
          $id_zawodnika = $row['Tresc'];
          $data= $row['Data'];
          $typ = $row['Typ'];

          echo '<script type="text/javascript">',
          'addAbsent("',
          $data,
          '","',
          $typ,
          '");',
          '</script>'
          ;
        }
      }

      // if($rezultat = @$connect->query($sql_strzelec))
      // {
      //   while($row = mysqli_fetch_assoc($rezultat))
      //   {

      //     $id_strzelca = $row['Id_strzelca'];
      //     $imie = $row['Imie'];
      //     $ilosc_bramek= $row['Ilosc_bramek'];

      //     echo '<script type="text/javascript">',
      //     'addShooter("',
      //     $imie,
      //     '","',
      //     $ilosc_bramek,
      //     '");',
      //     '</script>'
      //     ;
      //   }
      // }
    }
  ?>
</body>
<?php
  }
  else
  {

    header("Location: ./?loginStatus=failed");

  }
?>
</html>