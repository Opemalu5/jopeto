<?php
session_start();

?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <title>Sugar Clouds</title>
<style>
    .wrapper {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: #F77A52;
  display: flex;
  overflow: hidden;
}

.holder {
  position: absolute;
  top: 25%;
  right: 100%;
  bottom: 25%;
  left: auto;
  width: 20%;
  background: #332532;
  border-right: 0;
  border-radius: 100% 0 0 100%/20% 0 0 20%;
}
.holder:after {
  position: absolute;
  top: 10%;
  right: 0;
  bottom: 10%;
  left: 37%;
  content: "";
  display: block;
  background: #F77A52;
  border-radius: 100% 0 0 100%/20% 0 0 20%;
}

.press {
  margin: auto;
  width: 30vh;
  max-width: 70%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -20%);
  animation: pour 10000ms infinite;
  transform-origin: 50% 20%;
}
.press:after {
  content: "";
  display: block;
  padding-top: 180%;
}

.carafe {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  box-sizing: border-box;
  height: 80%;
  background: rgba(255, 246, 235, 0.2);
  border-radius: 0 0 4% 4%;
  box-shadow: inset -4rem 0 rgba(255, 255, 255, 0.1);
  z-index: 0;
}

.drop {
  width: 30%;
  background: rgba(51, 36, 9, 0.85);
  position: absolute;
  left: 95%;
  top: 4%;
  border-radius: 0 100% 100% 100%;
  transform: rotate(-45deg);
  animation: drop 10000ms infinite;
  transform-origin: left top;
  z-index: 1;
}
.drop:after {
  content: "";
  display: block;
  padding-top: 100%;
}

.spout {
  position: absolute;
  top: 4%;
  right: auto;
  bottom: auto;
  left: 100%;
  width: 0;
  height: 0;
  padding-bottom: 140%;
  padding-left: 14%;
  overflow: hidden;
}
.spout:after {
  content: "";
  display: block;
  width: 0;
  height: 0;
  margin-left: -500px;
  border-bottom: 500px solid transparent;
  border-left: 500px solid rgba(255, 246, 235, 0.2);
}

.contents {
  position: absolute;
  top: 0;
  right: 5%;
  bottom: 5%;
  left: 5%;
  box-sizing: border-box;
  background: rgba(255, 246, 235, 0.1);
  border-radius: 0 0 1rem 1rem;
  z-index: -1;
  overflow: hidden;
}

.lid {
  position: absolute;
  right: 0;
  left: 0;
  background: #332532;
  border-top-right-radius: 20% 50%;
  border-top-left-radius: 20% 50%;
  height: 20%;
  z-index: 10;
  box-shadow: inset -3rem 0 rgba(0, 0, 0, 0.12);
}
.lid:after {
  content: "";
  display: block;
  position: absolute;
  top: auto;
  right: -2.5%;
  bottom: 0;
  left: -2.5%;
  background: #332532;
  height: 20%;
  border-radius: 0.25rem;
  box-shadow: inset -4rem -1rem rgba(0, 0, 0, 0.12);
}

.plunger {
  position: absolute;
  top: 0;
  right: 5%;
  bottom: 15%;
  left: 5%;
  transform: translateY(-60%);
  animation: plunge 10000ms infinite;
}

.shaft {
  width: 6%;
  position: absolute;
  top: 0;
  left: 50%;
  margin-left: -3%;
  bottom: 0;
  background: #734952;
  box-shadow: inset -0.25rem 0.75rem rgba(0, 0, 0, 0.12);
}
.shaft .knob {
  content: "";
  display: block;
  position: absolute;
  bottom: 98%;
  width: 400%;
  border-radius: 100%;
  left: -150%;
  background: #332532;
  box-shadow: inset -0.5rem 0 rgba(0, 0, 0, 0.12);
}
.shaft .knob:after {
  content: "";
  display: block;
  padding-top: 100%;
}

.filter {
  position: absolute;
  top: auto;
  right: 0;
  bottom: 0;
  left: 0;
  background: #734952;
  height: 5%;
  border: 0.3rem solid #332532;
  border-top: 0;
  border-bottom-right-radius: 1rem;
  border-bottom-left-radius: 1rem;
  box-sizing: border-box;
}

.grounds {
  position: absolute;
  top: auto;
  right: 0;
  bottom: 0;
  left: 0;
  background: #332409;
  height: 20%;
  transform: scaleY(0);
  border-radius: 0 0 4% 4%;
  transform-origin: bottom center;
  animation: fill-grounds 10000ms infinite;
  animation-fill-mode: forwards;
}

.water {
  position: absolute;
  top: 2.5%;
  right: 0;
  bottom: 0;
  left: -100%;
  background: rgba(94, 230, 235, 0.15);
  transform: scaleY(0);
  transform-origin: bottom center;
  animation: fill-water 10000ms infinite;
  animation-fill-mode: forwards;
  z-index: 2;
}

@keyframes fill-grounds {
  10%, 80% {
    transform: scaleY(1);
    opacity: 1;
  }
  5%, 100% {
    opacity: 0;
    transform: scaleY(0);
  }
}
@keyframes fill-water {
  0%, 10% {
    transform: scaleY(0);
  }
  30% {
    transform: scaleY(1);
    transform-origin: bottom right;
  }
  40%, 50% {
    transform: scaleY(1) scaleX(1) rotate(0);
    background-color: rgba(51, 36, 9, 0.85);
    transform-origin: top right;
  }
  70%, 100% {
    transform: rotate(-90deg);
    transform-origin: top right;
    background-color: rgba(51, 36, 9, 0.85);
  }
}
@keyframes plunge {
  0%, 32%, 100% {
    transform: translateY(-72%);
  }
  47%, 80% {
    transform: translateY(0);
  }
}
@keyframes pour {
  50%, 100% {
    transform: translate(-50%, -20%) rotate(0deg);
  }
  75%, 80% {
    transform: rotate(90deg);
  }
}
@keyframes drop {
  0%, 50% {
    transform: rotate(-45deg) scale(0);
  }
  70% {
    transform: rotate(-45deg) scale(1.2);
  }
  72% {
    transform: rotate(-45deg) scale(1);
  }
  80%, 100% {
    transform: rotate(-45deg) scale(1) translate(70vw, 70vw);
  }
}
</style>
</head>
  

<body>
<div class="wrapper">
  <div class="press">
    <div class="holder"></div>
    <div class="lid"></div>
    <div class="carafe">
      <div class="drop"></div>
      <div class="spout"></div>
      <div class="contents">
        <div class="grounds"></div>
        <div class="water"></div>
      </div>
    </div>
    <div class="plunger">
      <div class="shaft">
        <div class="knob"></div>
      </div>
      <div class="filter"></div>
    </div>
  </div>
</div>

</body>

</html>
