var canvas = document.getElementById('can-container');
var ball = document.getElementById('bottomBalls');

// Get context
var context = canvas.getContext('2d');
var ballContext = ball.getContext('2d');

// get the properties of the top canvas
var canvas_w = $('#topBalls').width();
var canvas_h = $('#topBalls').height();

// Get current resolution of the browser
var window_w = $(window).width();
var window_h = $(window).height();

// Assign value to canvas -- display the whole screen
canvas.width = window_w;
canvas.height = window_h;

// Declare a list of balls
var ballsCount = 100;
var listBalls = [];  // list of balls

function getBalls() {
    // Get the color for the ball
    this.color = "(255,255,255," + Math.random() + ")";
    console.log(this.color);
    
    // Get the initial position for the ball
    // random position in the screen
    this.x = randomInt(0, window_w);
    this.y = randomInt(0, window_h);
    
    this.direction = {
      "x": Math.random()*2 - 1,
      "y": Math.random()*2 - 1
    };
    
    this.vector_x = 0.3 * Math.random();
    this.vector_y = 0.3 * Math.random();
    this.radius = randomInt(2,3);
    
    this.float = function() {
      this.x += this.vector_x * this.direction.x;
      this.y += this.vector_y * this.direction.y; 
    };
    
    this.changeDirection = function(axis) {
      this.direction[axis] *= -1;  
    };
    
    this.toTheWall = function() {
        if(this.x >= window_w) {
            this.x = window_w;
            this.changeDirection("x");
        } else if (this.x <= 0) {
            this.x = 0;
            this.changeDirection("x");
        }
        
        if (this.y >= window_h) {
            this.y = window_h;
            this.changeDirection("y");
        } else if (this.y <= 0) {
            this.y = 0;
            this.changeDirection("y");
        }
    };
      
    this.draw = function() {
        context.beginPath();
        context.fillStyle = this.color;
        context.arc(this.x, this.y,
            this.radius, 0, Math.PI * 2, false);
        context.fill();
    }; 
}

function clearScreen() {
    ballContext.clearRect(0,0, window_w, window_h);
    context.clearRect(0,0,window_w, window_h);
}

function createList() {
    for(i = 0; i <= ballsCount; i++) {
        var tempBall = new getBalls();
        listBalls.push(tempBall); 
    }
}

function drawList() {
    for(i = 0; i < listBalls.length; i++) {
        tempBall = listBalls[i];
        tempBall.draw();
    }
}

function update() {
    for(var i = listBalls.length-1; i >= 0; i--) {
        b = listBalls[i];
        b.float();
        b.toTheWall();
    }
}

createList();
drawList();

function moveBalls() {
          clearScreen();
           drawList();
           update();
       ballContext.drawImage(canvas, 0, 0);
        requestAnimationFrame(moveBalls);
}

requestAnimationFrame(moveBalls);
ballContext.drawImage(canvas, 0, 0);

function randomInt(min,max)
{
    return Math.floor(Math.random()*(max-min+1)+min);
}