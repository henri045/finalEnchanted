const container = document.querySelector('.container');

function createFirefly() {
  const firefly = document.createElement('div');
  firefly.classList.add('firefly');
  firefly.style.left = Math.random() * window.innerWidth + 'px';
  firefly.style.top = Math.random() * window.innerHeight + 'px';
  container.appendChild(firefly);
}

function animateFireflies() {
  const fireflies = document.querySelectorAll('.firefly');
  fireflies.forEach(firefly => {
    firefly.style.animationPlayState = 'running';
  });
}

for (let i = 0; i < 25; i++) {  /* Create 10 fireflies */
  createFirefly();
}

animateFireflies();
