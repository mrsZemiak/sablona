<?php
function pridajPozdrav() {
    $hour = date('H');
    if ($hour < 12) {
        echo "<h3>Dobré ráno</h3>";
    } elseif ($hour < 18) {
        echo "<h3>Dobrý deň</h3>";
    } else {
        echo "<h3>Dobrý večer</h3>";
    }
}
function generateSlides($dir) {
    $files = glob($dir . "/*.jpg");
    $json = file_get_contents("data/datas.json");
    $data = json_decode($json, true);
    $text = $data["text_banner"];

    foreach ($files as $file) {
        echo '<div class="slide fade">';
        echo '<img src="' . $file . '">';
        echo '<div class="slide-text">';

        echo ($text[basename($file)]); //basename zistí názov
        echo '</div>';
        echo '</div>';
    }
    echo '<a id="prev" class="prev">❮</a>';
    echo '<a id="next" class="next">❯</a>';
}

function insertQnA()
{
    $json = file_get_contents("data/datas.json");
    $data = json_decode($json, true);
    $otazky = $data["otazky"];
    $odpovede = $data["odpovede"];
    echo '<section class="container">';
    for ($i = 0; $i < count($otazky); $i++) {
        echo '<div class="accordion">
                    <div class="question">' .
            $otazky[$i] . '
                     </div>
                    <div class="answer">' .
            $odpovede[$i] . '
                    </div>
            </div>';
    }
    echo '</section>';
}

function validateMenuType(string $type): bool
{
    $menuTypes = [
        'header',
        'footer'
    ];
    if(in_array($type, $menuTypes)) {
        return true;
    } else {
        return false;
    }
}
function getMenuData(string $type): array{
    $menu = [];
    if(validateMenuType($type)) {
        if($type === "header") {
            $menu = [
                'home' => [
                    'name' => 'Domov',
                    'path' => 'index.php',
                ],
                'portfolio' => [
                    'name' => 'Portfólio',
                    'path' => 'portfolio.php',
                ],
                'qna' => [
                    'name' => 'Q&A',
                    'path' => 'qna.php',
                ],
                'kontakt' => [
                    'name' => 'Kontakt',
                    'path' => 'kontakt.php',
                ]
            ];
        }
    }
    return $menu;
}
function printMenu(array $menu){
    foreach ($menu as $menuName => $menuData) {
        echo '<li><a href="'.$menuData['path'].'">'.$menuData['name'].'</a></li>';
    }
}

function preparePortfolio(int $numberOfRows = 2, int $numberOfCols = 4): array{
    $portfolio = [];
    $colIndex = 1;
    for ($i = 1; $i <= $numberOfRows; $i++) {
        for($j = 1; $j <= $numberOfCols; $j++) {
            $portfolio[$i][$j] = $colIndex;
            $colIndex++;
        }
    }
    return $portfolio;
}
function getCSS(){
    $jsonStr = file_get_contents("data/datas.json");
    $data = json_decode($jsonStr, true);
    $stranka = basename($_SERVER['REQUEST_URI']);
    echo $stranka;
    $stranka = explode(".", $stranka)[0];
    $suboryCSS = $data['stranky'][$stranka];
    foreach ($suboryCSS as $subor) {
        echo "<link rel='stylesheet' href='$subor'>";
    }
}

function finishPortfolio(){
    $portfolio = preparePortfolio();
    foreach ($portfolio as $row => $col) {
        echo '<div class="row">';
        foreach ($col as $index) {
            echo '<div class="col-25 portfolio text-white text-center" id="portfolio-'.$index.'">
                            Web stránka '.$index.'
                         </div>';
        }
        echo '</div>';
    }
}

//text sa nacitava dynamicky zo suboru datas.json
function finishPortfolio2() {
    $portfolioData = preparePortfolio();
    $data = json_decode(file_get_contents("data/datas.json"), true);
    $portfolioTexts = $data["portfolio-text"];
    foreach ($portfolioData as $row => $col) {
        echo '<div class="row">';
        foreach ($col as $index) {
            $text = $portfolioTexts["portfolio{$index}.jpg"]; // Získanie textu z JSON súboru
            echo '<div class="col-25 portfolio text-white text-center" id="portfolio-'.$index.'">
                            '.$text.'
                         </div>';
        }
        echo '</div>';
    }
}

// po kliknuti na okienko sa dostaneme na URL, ktora je ulozena v jsone
function finishPortfolio3() {
    $portfolioData = preparePortfolio();
    $data = json_decode(file_get_contents("data/datas.json"), true);
    foreach ($portfolioData as $row => $col) {
        echo '<div class="row">';
        foreach ($col as $index) {
            $text = $data["portfolio-text-url"]["portfolio{$index}.jpg"]["text"]; // Získanie textu z JSON súboru
            $link = $data["portfolio-text-url"]["portfolio{$index}.jpg"]["link"];
            //<<<HTML je tzv. "here-doc" syntax, ktorá umožňuje vložiť viacriadkový text do premennej.
            echo <<<HTML
                    <a id="portfolio-{$index}" class="col-25 portfolio" href="{$link}">
                    <div class="text-center">
                    $text
                    </div>
                    </a>
            HTML;
        }
        echo '</div>';
    }
}

