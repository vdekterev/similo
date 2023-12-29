<?php
require_once 'Game.php';

$game = $_GET['game'];
$allCards = new Game($game);
$cards = $allCards->field;
$currentCard = $allCards->currentCard;
$hand = $allCards->getHand();
$extraCards = $allCards->getExtraCards();
?>
<head>
    <title>Similo | <?=ucfirst($game)?></title>
    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Doodle+Shadow&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: url('./img/cardBacks/<?=$game?>.jpg');
            backdrop-filter: blur(20px);
        }
    </style>
</head>

<div class="lostGameModal">
    <div class="lostGameModalContent">
        Вы проиграли :(
        <a onclick="window.location.reload()"><b>Начать сначала</b></a>
    </div>
</div>
<div class="startGameBtn">Посмотреть карту</div>
<div class="tourField">Раунд 1 | Закрыть карт: 1</div>
<div class="startGameModal">
    <div class="startGameModalContent">
        <img src="img/games/<?=$game?>/<?= $currentCard?>" alt="currentCard">
    </div>
</div>
<div class="main">
    <div class="helpField">
        <div class="helpCard" number="1"><img src="img/cardBacks/<?=$game?>.jpg" alt="cardBack"></div>
        <div class="helpCard" number="2"><img src="img/cardBacks/<?=$game?>.jpg" alt="cardBack"></div>
        <div class="helpCard" number="3"><img src="img/cardBacks/<?=$game?>.jpg" alt="cardBack"></div>
        <div class="helpCard" number="4"><img src="img/cardBacks/<?=$game?>.jpg" alt="cardBack"></div>
        <div class="helpCard" number="5"><img src="img/cardBacks/<?=$game?>.jpg" alt="cardBack"></div>
    </div>
    <div class="field">
        <?php foreach ($cards as $card): ?>
            <div class="card">
                <img src="img/games/<?=$game?>/<?=$card?>" alt="<?=$card?>" <?= "$card" == $currentCard ? 'id="current"' : ''?>>
            </div>
        <?php endforeach;?>
    </div>

    <div class="myCards">
        <div class="myCardsModal">
            <div class="myCardsModalContent">
                <div class="extraCards">
                    <?php foreach ($hand as $handItem):?>
                    <img src="img/games/<?=$game?>/<?=$handItem?>" alt="extracard">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const extraCardList = <?php print_r(json_encode($allCards->getExtraCards())); ?>,
    currentGame = '<?php echo $game; ?>';

</script>
<script src="js/script.js"></script>
