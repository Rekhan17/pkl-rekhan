const characters = [
    { name: 'KLA', ability: 'Muay Thai', description: 'Meningkatkan kerusakan pukulan.', image: 'img/kla.png', abilityimg: 'img/klaAbility.png'},
    { name: 'J.BIEBS', ability: 'Silent Sentinel', description: 'Memungkinkan sekutu dalam radius tertentu untuk memblokir kerusakan menggunakan EP.', image: 'img/biebs.png', abilityimg: 'img/biebsAbility.png'},
    { name: 'MISHA', ability: 'Afterburner', description: 'Meningkatkan kecepatan mengemudi dan mengurangi kerusakan yang diterima saat mengemudi.', image: 'img/misha.png', abilityimg: 'img/mishaAbility.png'},
    { name: 'CAROLINE', ability: 'Agility', description: 'Meningkatkan kecepatan bergerak saat menggunakan shotgun.', image: 'img/caroline.png', abilityimg: 'img/carolineAbility.png'},
    { name: 'CRONO', ability: 'Time Turner', description: 'Menciptakan medan gaya yang memblokir kerusakan dari luar.', image: 'img/crono.png', abilityimg: 'img/cronoAbility.png'},
    { name: 'HOMER', ability: 'Neural Impulse', description: 'Mengirim drone untuk menyerang musuh, mengurangi kecepatan gerakan dan tembakan mereka.', image: 'img/homer.png', abilityimg: 'img/homerAbility.png'},
    { name: 'KAIROS', ability: 'Riptide Rhythm', description: 'Mengaktifkan kekuatan musik untuk menyembuhkan sekutu dan meningkatkan kecepatan.', image: 'img/kairos.png', abilityimg: 'img/kairosAbility.png'},
    { name: 'KASSIE', ability: 'Healing Heartbeat', description: 'Membuat aura penyembuhan yang memulihkan HP sekutu dalam radius tertentu.', image: 'img/kassie.png', abilityimg: 'img/kassieAbility.png'},
    { name: 'MAXIM', ability: 'Gluttony', description: 'Mengurangi waktu yang diperlukan untuk makan jamur dan menggunakan medkits.', image: 'img/maxim.png', abilityimg: 'img/maximAbility.png'},
    { name: 'MIGUEL', ability: 'Crazy Slayer', description: 'Memulihkan EP untuk setiap kill.', image: 'img/miguel.png', abilityimg: 'img/miguelAbility.png'},
];

function renderCharacterButtons() {
    const buttonList = document.querySelector('.button-list');

    characters.forEach((character, index) => {
        const button = document.createElement('button');
        button.textContent = character.name;
        button.addEventListener('click', () => displayCharacter(index));
        buttonList.appendChild(button);
    });
}

function displayCharacter(index) {
    const character = characters[index];
    const characterList = document.querySelector('.character-list');
    characterList.innerHTML = ''; 

    const characterCard = document.createElement('div');
    characterCard.classList.add('character-card');

    const characterImage = document.createElement('img');
    characterImage.src = character.image;
    characterImage.alt = character.name;
    characterCard.appendChild(characterImage);
    
    const characterName = document.createElement('h2');
    characterName.textContent = character.name;
    characterCard.appendChild(characterName);

    const characterAbility = document.createElement('h4');
    characterAbility.innerHTML = `<strong>Ability:</strong>`;
    characterCard.appendChild(characterAbility);

    const abilityImage = document.createElement('img');
    abilityImage.src = character.abilityimg;
    abilityImage.alt = character.ability;
    abilityImage.classList.add('ability-image');
    characterCard.appendChild(abilityImage);

    const characterability = document.createElement('h4');
    characterability.textContent = character.ability;
    characterCard.appendChild(characterability);

    const characterDescription = document.createElement('p');
    characterDescription.textContent = character.description;
    characterCard.appendChild(characterDescription);

    characterList.appendChild(characterCard);
}

document.addEventListener('DOMContentLoaded', () => {
    renderCharacterButtons();
    displayCharacter(0); 
});
