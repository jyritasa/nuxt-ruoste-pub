<template>
<div class="hero-container">
  <video loop autoplay muted>
    <source src="../assets/background-video.mp4" type="video/mp4">
  </video>
  <h1 class="Hero">Oikein rakentaminen onnistuu hyvillä ratkaisuilla - Tervetuloa asioimaan Ruosteiseen Rautaan!</h1>
  <button type="button" class="btn btn-outline-primary">Lue Lisää</button>
</div>
</template>

<script>
  export default {
    name: 'MainPageHero'
  }
</script>

<style>
video {
  height: auto;
  width: 100%;
}

* {
  margin: 0;
  padding: 0;
  list-style: none;
}

.hero-container {
  position: relative;
  display: inline-block;
}

.hero-container video {
  display: block;

  background-attachment: fixed;
}

.hero-container h1 {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  transform: translate(0, -50%);
  text-align: center;
  font-size: 5vw;
  color: #FFF9F5;
}

.hero-container button {
  position: absolute;
  bottom: 5px;
  left: 50%;
  right: 0;
  transform: translate(-50%, -50%);
}

video {
  height: auto;
  width: 100%;
}

/*Max Size for the Hero text*/
@media screen and (min-width: 1080px) {
  .hero-container h1 {
    font-size: 56px;
  }
}

</style>