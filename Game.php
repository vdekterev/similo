<?php

class Game
{
//    public int $tour = 0; // Номер тура (от 0 до 5)
    public array $allCards; // Все карты из игры
    public array $field; // Сгенерированное поле из 12 карт
    public array $extraCards; // Дополнительные карт для подсказок, которые не вошли в поле
    public array $hand; // Рука из 5 вспомогательных карт
    public string $currentCard; // Загаданная карта
    /*
     * Передается название игры
     * Достаются все карточки в рандомном порядке
     */

    public function __construct(string $game)
    {
        $files = scandir("img/games/$game");
        if (empty($files)) {
            header("Location: notfound.php");
        }

        $this->allCards = array_filter($files, function($f) use ($game) {
            return is_file("img/games/$game/$f") && preg_match('/.*\.jpg$/', $f);
        });
        shuffle($this->allCards);
        $this->generateField();
        $this->extraCards = array_filter($this->allCards, function($card) {
            return !in_array($card, $this->field);
        });
        $this->hand = array_splice($this->extraCards, 0, 5);
    }
    public function generateField(): array // Сгенерировать 12 карт и взять одну из них
    {
        $this->field = array_slice($this->allCards, 0, 12);
        $this->currentCard = $this->field[array_rand($this->field)];
        return $this->field;
    }

    public function getExtraCards(): array
    {
        return $this->extraCards;
    }

//    public function placeCard(int $cardId) : void
//    {
//        $this->tour++;
//        unset($this->hand[$cardId]);
//    }

    public function getHand() : array
    {
        return $this->hand;
    }


}