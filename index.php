<?php
require ('include/entete.inc')
?>
<body>
<nav>
    <div class="container">
        <a href="index.php" class="active">Menu 1</a>
        <a href="#">Menu 2</a>
        <a href="#">Menu 3</a>
        <a href="#">Menu 4</a>
        <a href="#">Menu 5</a>
        <a href="a-propos.php">À propos</a>
        <a href="a-venir.php">À venir</a>
    </div>
</nav>
<div class="separation"></div>
<header>
    <div class="logo-text container">
        <div class="logo"><img src="medias/commun/logoLanParty.png"></div>
        <div>
            <div class="title">LAN party!</div>
            <div class="slogan">Celui que vous ne voulez pas manquer</div>
        </div>
    </div>
</header>
<div class="separation"></div>
<div id="main">
    <div class="container">
        <h1>Tableau de bord</h1>
        Ce site sert à organiser des competitions entre certaines équipes. Ces competitions seront organisées pendant le lan party, alors préparer votre talent, car il sera nécessaire pour gagner.
        <div class="items">
            <div class="item first">
                <a href="#">
                    <div class="content">

                    </div>
                    <div class="caption">
                        <div class="middle">
                            <i id="assassin" class="fa-solid fa-utensils"></i>
                        </div>
                        <div class="title">Assasins</div>
                        <div class="subtitle">One shot ou se faire one shot</div>
                    </div>
                </a>
            </div>
            <div class="item second">
                <a href="#">
                    <div class="content">

                    </div>
                    <div class="caption">
                        <div class="middle">
                            <i id="bruiser" class="fa-solid fa-hammer"></i>
                        </div>
                        <div class="title">Bruiser</div>
                        <div class="subtitle">Destructeur de tours</div>
                    </div>
                </a>
            </div>
            <div class="item third">
                <a href="#">
                    <div class="content">
                        Équipe éliminée ;-(
                    </div>
                    <div class="caption">
                        <div class="middle">
                            <i id="mage" class="fa-solid fa-hat-wizard"></i>
                        </div>
                        <div class="title">Mage</div>
                        <div class="subtitle">OMG les dégats</div>
                    </div>
                </a>
            </div>
            <div class="item fourth">
                <a href="#">
                    <div class="content">

                    </div>
                    <div class="caption">
                        <div class="middle">
                            <i id="support" class="fa-solid fa-cat"></i>
                        </div>
                        <div class="title">Support</div>
                        <div class="subtitle">Inutile dans la plupart des cas</div>
                    </div>
                </a>
            </div>
            <div class="item fifth">
                <a href="#">
                    <div class="content">

                    </div>
                    <div class="caption">
                        <div class="middle">
                            <i id="tank" class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div class="title">Tank</div>
                        <div class="subtitle">Gros tas de pv</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
require ('include/pied-page.inc')
?>
