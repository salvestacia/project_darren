// Setup canvas
const canvas = document.getElementById("pongCanvas");
const ctx = canvas.getContext("2d");

// Create the paddle
const paddleWidth = 10, paddleHeight = 60;
let leftPaddleY = canvas.height / 2 - paddleHeight / 2;
let rightPaddleY = canvas.height / 2 - paddleHeight / 2;

// Create the ball
const ballSize = 10;
let ballX = canvas.width / 2;
let ballY = canvas.height / 2;
let ballSpeedX = 5;
let ballSpeedY = 2;

// Draw function
function draw() {
    // Clear canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Draw paddles
    ctx.fillStyle = "#000";
    ctx.fillRect(0, leftPaddleY, paddleWidth, paddleHeight);
    ctx.fillRect(canvas.width - paddleWidth, rightPaddleY, paddleWidth, paddleHeight);

    // Draw ball
    ctx.beginPath();
    ctx.arc(ballX, ballY, ballSize, 0, Math.PI * 2);
    ctx.fillStyle = "#000";
    ctx.fill();
    ctx.closePath();

    // Move ball
    ballX += ballSpeedX;
    ballY += ballSpeedY;

    // Bounce off top and bottom walls
    if (ballY - ballSize < 0 || ballY + ballSize > canvas.height) {
        ballSpeedY = -ballSpeedY;
    }

    // Bounce off paddles
    if (
        (ballX - ballSize < paddleWidth && ballY > leftPaddleY && ballY < leftPaddleY + paddleHeight) ||
        (ballX + ballSize > canvas.width - paddleWidth && ballY > rightPaddleY && ballY < rightPaddleY + paddleHeight)
    ) {
        ballSpeedX = -ballSpeedX;
    }

    // Reset ball if it goes beyond paddles
    if (ballX - ballSize < 0 || ballX + ballSize > canvas.width) {
        ballX = canvas.width / 2;
        ballY = canvas.height / 2;
    }

    // Move right paddle
    if (ballY > rightPaddleY + paddleHeight / 2) {
        rightPaddleY += 2;
    } else {
        rightPaddleY -= 2;
    }

    // Request next animation frame
    requestAnimationFrame(draw);
}

// Handle keyboard input
window.addEventListener("keydown", (e) => {
    // W key (up) for left paddle
    if (e.key === "w" && leftPaddleY > 0) {
        leftPaddleY -= 20;
    }
    // S key (down) for left paddle
    else if (e.key === "s" && leftPaddleY + paddleHeight < canvas.height) {
        leftPaddleY += 20;
    }
});

// Start the game
draw();
