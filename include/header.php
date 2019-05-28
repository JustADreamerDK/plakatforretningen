<header class="flex-column center">
    <div class="flex between center w-100 b-grey">
        <div class="flex-column middle">
            <button class="header-knap"><a target="_blank" class="f-white" href="https://www.plakatforretningen.dk/">Shop</a></button>
        </div>

        <a href="index.php">
            <img class="logo" src="img/logo.png">
        </a>

        <button id="soeg" href="" class="soeg bold">
            &#9906;
        </button>
    </div>

    <div class="filterLuk w-100">
        <div class="b-lightgrey w-100 flex middle">
            <div class="content flex between p-5">
                <h4 class="bold">
                    <?php
                    if ($kat <> ''){
                        $kategori_id = $kat;
                        $kategori = getKategori($kategori_id);
                        $rowKategori = mysqli_fetch_assoc($kategori);
                        echo $rowKategori['kategori'];
                    }else{
                        echo 'Alle';
                    } ?>
                </h4>
                <h4 class="bold"><?php if($soeg <> ''){ ?>
                    Alle indlæg indeholdende "
                    <?php
                    echo $soeg;
                    ?>"
                <?php } ?></h4>
                <h4 class="bold filteret computer"><i class="fas fa-filter"></i></h4>
                <h4 class="bold filteretMobil mobil"><i class="fas fa-filter"></i></h4>
            </div>
        </div>
    </div>

    <div class="filterAaben w-100">
        <div class="b-lightgrey w-100 flex between">
            <h4 class="bold filter flex middle p-5">
                <a href="index.php">
                    Alle
                </a>
            </h4>
            <h4 class="bold filter flex middle p-5">
                <a href="index.php?id=3">
                    Generelt
                </a>
            </h4>
            <h4 class="bold filter flex middle p-5">
                <a href="index.php?id=1">
                    Indretning
                </a>
            </h4>
            <h4 class="bold filter flex middle p-5">
                <a href="index.php?id=4">
                    Livsstil
                </a>
            </h4>
            <h4 class="bold filter flex middle p-5">
                <a href="index.php?id=2">
                    Tips og tricks
                </a>
            </h4>
            <h4 class="bold filter flex middle p-5">
                <a href="index.php?id=5">
                    Inspiration
                </a>
            </h4>
        </div>
    </div>

    <div class="filterAabenMobil w-100 flex-column">
        <div class="b-lightgrey w-100 flex between">
            <h4 class="bold filter flex middle p-5">
                <a href="index.php">
                    Alle
                </a>
            </h4>
            <h4 class="bold filter flex middle p-5">
                <a href="index.php?id=3">
                    Generelt
                </a>
            </h4>
            <h4 class="bold filter flex middle p-5">
                <a href="index.php?id=1">
                    Indretning
                </a>
            </h4>
        </div>
        <div class="b-lightgrey w-100 flex between">
            <h4 class="bold filter flex middle p-5">
                <a href="index.php?id=4">
                    Livsstil
                </a>
            </h4>
            <h4 class="bold filter flex middle p-5">
                <a href="index.php?id=2">
                    Tips og tricks
                </a>
            </h4>
            <h4 class="bold filter flex middle p-5">
                <a href="index.php?id=5">
                    Inspiration
                </a>
            </h4>
        </div>
    </div>

    <div class="soegAaben w-100">
        <div class="b-lightgrey w-100 flex middle ">
            <div class="content flex between p-5">
                <form  class="flex w-100" action="index.php" method="post">
                    <input class="p-10" type="search" name="soeg" placeholder="Søg"></input>
                    <input class="f-white bold m-lr-10" type="submit" value="Søg"></input>
                </form>
                <h2 class="bold soegLuk">×</h2>
            </div>
        </div>
    </div>


</header>
