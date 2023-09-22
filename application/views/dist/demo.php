<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exploding Image</title>
</head>
<body>
    <span class="shape6 header-shape"><img src="https://mict.uk/bbb/assets/website/assets/images/shape/home_6/header6_shape_6.png" alt=""></span>
    
    <script src="script.js"></script>
    <script>
        const colors = ['#ffc000', '#ff3b3b', '#ff8400'];
const bubbles = 25;

const explode = (x, y) => {
    let particles = [];
    let ratio = window.devicePixelRatio;
    let img = document.querySelector('.shape6 img');
    let c = document.createElement('canvas');
    let ctx = c.getContext('2d');

    c.style.position = 'absolute';
    c.style.left = (x - img.width / 2) + 'px';
    c.style.top = (y - img.height / 2) + 'px';
    c.style.pointerEvents = 'none';
    c.style.width = img.width + 'px';
    c.style.height = img.height + 'px';
    c.style.zIndex = 100;
    c.width = img.width * ratio;
    c.height = img.height * ratio;
    document.body.appendChild(c);

    for (var i = 0; i < bubbles; i++) {
        particles.push({
            x: c.width / 2,
            y: c.height / 2,
            radius: r(20, 30),
            color: colors[Math.floor(Math.random() * colors.length)],
            rotation: r(0, 360, true),
            speed: r(8, 12),
            friction: 0.9,
            opacity: r(0, 0.5, true),
            yVel: 0,
            gravity: 0.1
        });
    }

    render(particles, ctx, c.width, c.height);
    setTimeout(() => document.body.removeChild(c), 1000);
}

const render = (particles, ctx, width, height) => {
    requestAnimationFrame(() => render(particles, ctx, width, height));
    ctx.clearRect(0, 0, width, height);

    particles.forEach((p, i) => {
        p.x += p.speed * Math.cos(p.rotation * Math.PI / 180);
        p.y += p.speed * Math.sin(p.rotation * Math.PI / 180);

        p.opacity -= 0.01;
        p.speed *= p.friction;
        p.radius *= p.friction;
        p.yVel += p.gravity;
        p.y += p.yVel;

        if (p.opacity < 0 || p.radius < 0) return;

        ctx.beginPath();
        ctx.globalAlpha = p.opacity;
        ctx.fillStyle = p.color;
        ctx.arc(p.x, p.y, p.radius, 0, 2 * Math.PI, false);
        ctx.fill();
    });

    return ctx;
}

const r = (a, b, c) => parseFloat((Math.random() * ((a ? a : 1) - (b ? b : 0)) + (b ? b : 0)).toFixed(c ? c : 0));

document.querySelector('.shape6').addEventListener('mouseover', e => explode(e.pageX, e.pageY));

    </script>
</body>
</html>
