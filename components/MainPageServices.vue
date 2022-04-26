<template>
  <div>
    <h1>Services</h1> 
    <div v-if="windowWidth>500">
    <div id="services-section">
      <div v-for="teksti in tekstit" :key="teksti.otsikko" class="services-subsection">
        <h3>{{teksti.otsikko}}</h3>
          <p>{{teksti.teksti}}</p>
          <ul>
            <li v-for="rivi in teksti.lista"  v-bind:key="rivi">
              {{rivi}}
            </li>
          </ul>
      </div>
      </div>
      </div>
    <div v-else>
    <div id="services-section">
      <div v-for="(teksti, index) in tekstit" :key="teksti.otsikko" class="services-subsection">
        <h3 @click="toggleItem(index)" class="{active: isActive === index}">{{teksti.otsikko}}</h3>
        <div v-if="isActive === index" class="item-active">
          <p>{{teksti.teksti}}</p>
          <ul>
            <li v-for="rivi in teksti.lista"  v-bind:key="rivi">
              {{rivi}}
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'MainPageServices',
    data() {
      return {
      isActive : null,
      prevActive : null,
      windowWidth: window.innerWidth,
      //This could be JSON from server, or static file somewhere else.
      tekstit: [{otsikko: "Rakennustarvikkeet",
      teksti: "Ruosteinen Rauta tarjoaa rakennustarvikkeet alan johtavilta merkeiltä nopeasti toimitettuna suoraan työmaalle. Ruosteisen Raudan Rakennustarvikkeet – palvelun avulla rakentaminen on helppoa ja edullista. Laadukkuus ja edullisuus ovat ominaisuuksia, joita ostajat odottavat rakennustarvikkeilta. Rakennustarvikkeet - valikoimasta löytyy paljon vaihtoehtoja pienempiin tai isompiin rakennus- tai remontointiprojekteihin.",
      lista: [
        "Perustustarvikkeet",
        "Rakennusmateriaalit",
        "Sähkötarvikkeet",
        "Ilmanvaihto",
        "Lämmitys",
        "LVI",
        "Työkalut ja tarvikkeet"]},
        {otsikko: "Sisustustarvikkeet",
        teksti: "Kun talo on rakennettu, voidaan keskittyä sisustamiseen. Me autamme sinua myös kaikissa sisustamiseen liittyvissä ratkaisuissa. Valikoimaamme kuuluu kaikki sisustukseen tarvittavat tuotteet ja ratkaisut, kuten keittiökalusteet, takat, tapetit, lattiapinnoitteet, laatat, koukut ja maalit.",
        lista: ["Keittiö",
              "Kylpyhuone ja wc",
              "Laatat | lattialaatat, seinälaatat, kuviolaatat",
              "Lattiat | parketit, laminaatit, korkkilattiat, vinyylilattiat",
              "Ovet",
              "Kiukaat",
              "Tapetit",
              "Koukut naulakot ja hyllyt",
              "Takat",
              "Valaistus"]},
      {otsikko: "Piharakennus",
      teksti: "Laajasta valikoimastamme löydät kaiken tarvittavan pihan suunnitteluun ja rakentamiseen.",
      lista: ["Pihakivetys ja päällysteet",
      "Puutarhakalusteet ja tarvikkeet",
      "Kylpytynnyrit ja uima-altaat",
      "Pihavalaisimet"]},
      {otsikko: "Konevuokraus",
      teksti: "Vuokraamme laadukkaat ja turvalliset koneet erikokoisiin projekteihin yrityksille, yhteistyökumppaneille ja yksityisille rakentajille ja remontoijille. Varaa ja tilaa tarvitsemasi kone tai laite, kuljetamme koneen kohteeseen sovittuna ajankohtana. Esimerkkejä koneista ja laitteistamme:",
      lista: ["Henkilönostimet",
      "Nosto- ja siirtokalusto",
      "Maantiivistyskalusto",
      "Maansiirtokalusto",
      "Peräkärryt",
      "Avant",
      "Generaattorit"]}]
      }
    },
    created() {
      window.addEventListener("resize", this.handleResize); 
    },
    unmounted() {
      window.removeEventListener("resize", this.handleResize); 
    },
    methods: {
      handleResize() {
          this.windowWidth = window.innerWidth
      },
      toggleItem(index) {
        this.prevActive = this.isActive;
        this.isActive = index;
        
        //Closes the section if clicked while active.
        if (this.prevActive === this.isActive) {
          this.isActive = null;
        }
      },
    }
  }
</script>

<style>
  #services-section {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
    padding-bottom: 20px;
  }

  .services-subsection {
    border: 2px solid #086BA8;
    border-radius: 5px;
    padding: 5px;
    max-width: 255px;
  }

  @media only screen and (max-width:500px) {
    .services-subsection {
      width: 500px;
    }
  }

  .services-subsection h3{
    text-align: center;
  }

  .services-headline{
    text-align: center;
  }

  #services-section li {
      list-style-type: circle !important;
  }
</style>