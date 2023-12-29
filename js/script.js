const images = document.querySelectorAll('.game img'),
    startGameBtn = document.querySelector('.startGameBtn'),
    startGameModal = document.querySelector('.startGameModal'),
    tourField = document.querySelector('.tourField'),
    lostGameModal = document.querySelector('.lostGameModal'),
    cards = document.querySelectorAll('.card img'),
    currentCard = document.querySelector('#current'),
    extraCards = document.querySelectorAll('.extraCards img'),
    helpField = document.querySelector('.helpField'),
    helpFieldImages = document.querySelectorAll('.helpField img'),
    cardBack = helpFieldImages[0].src;
let gameTour = 0,
    cardsClosed = 0,
    cardWatched = false;


cards.forEach((card) => {
        card.addEventListener('dblclick', () => {
            if (cardWatched) {
                if (card.getAttribute('id') === 'current')  {
                    lostGameModal.style.display = 'block';
                }
                cardsClosed++;
                card.src = cardBack;
            } else {
                tourField.style.display = 'block';
                tourField.innerHTML = `Сначала посмотри карту!`;
                console.log(123);
            }
        });
});


images.forEach((img) => {
    img.addEventListener('mouseenter', () => {
        img.style.width='320px';
        img.style.height='420px';
        img.style.transition='1s';
    });
    img.addEventListener('mouseout', () => {
        img.style.width='';
        img.style.height='';
    });
});

startGameBtn.addEventListener('click', () => {
    startGameModal.style.display = 'block';
    tourField.style.display = 'block';
    cardWatched = true;
    if (gameTour === 0) {
        tourField.innerHTML = 'Выложи карту'
    }
});

startGameModal.addEventListener('click', () => {
    startGameModal.style.display = 'none';
});

extraCards.forEach((card) => {
    card.addEventListener('dblclick', () => {
        console.log(`gameTour - ${gameTour}`);
        console.log(`cardsClosed - ${cardsClosed}`);
        if (cardsClosed !== gameTour) {
            tourField.innerHTML = `← Сначала выложи карту!`;
        }
        else {
            helpFieldImages[gameTour].src = card.src;
            gameTour++;
            tourField.innerHTML = `Раунд ${gameTour} | Закрыть карт: ${gameTour === 5 ? 1 : gameTour}`;
            let extraCard = extraCardList.pop();
            card.src = `img/games/${currentGame}/${extraCard}`;
        }
    });
});

helpFieldImages.forEach((image) => {
    image.addEventListener('click', () => {
        image.style.transform = (image.style.transform  === 'rotate(90deg)') ? '' : 'rotate(90deg)';
    })
});
