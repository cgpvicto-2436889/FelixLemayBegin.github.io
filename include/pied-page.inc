<?php

function getAnneeActuelle() {
    return date("Y");
}

$annee = getAnneeActuelle();

echo "
</div>
    </div>
        <footer>
            <p>© Maquette par <a href=\"https://christianelagace.com\" target=\"_blank\">Christiane Lagacé</a>, inspirée du travail de
                <a href=\"https://www.free-css.com/free-css-templates/page5/the-hobbit\"target=\"_blank\">Arcsin</a>.</p>

            <p>Site Web par Félix Lemay Bégin. " . $annee . "</p>
        </footer>
    </body>
</html>
";