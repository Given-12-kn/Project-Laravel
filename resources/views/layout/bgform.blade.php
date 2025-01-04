<div class="relative bg-gradient-to-r h-screen overflow-hidden">

    <!-- Container untuk Hexagon -->
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none z-11"></div>

    <!-- Content -->
    <div class="relative z-10 flex items-center justify-center h-full flex-col"">
        @yield('contentBgForm')
    </div>

</div>

<script>
    function createHexagon() {
    const hexagon = document.createElement('div');
    hexagon.classList.add('hexagon');

    const pastelColors = [
        'rgba(240, 200, 250, 1)',  
        'rgba(220, 230, 255, 1)', 
        'rgba(250, 240, 255, 1)',  
        'rgba(230, 245, 255, 1)', 
        'rgba(245, 220, 250, 1)'   
    ];

    const color = pastelColors[Math.floor(Math.random() * pastelColors.length)];

    hexagon.style.setProperty('--hex-color', color);

    // Tentukan posisi acak
    const posX = Math.random() * 100; 
    const posY = Math.random() * 100; 

    hexagon.style.left = `${posX}%`;
    hexagon.style.top = `${posY}%`;

    const container = document.querySelector('.absolute.top-0.left-0.w-full.h-full.pointer-events-none');
    container.appendChild(hexagon);

    hexagon.addEventListener('animationend', () => {
        hexagon.remove();
    });
}

setInterval(createHexagon, 1500);

for (let i = 0; i < 10; i++) {
    setTimeout(createHexagon, i * 1000); 
}

</script>