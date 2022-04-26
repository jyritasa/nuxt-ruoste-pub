<template>
<div class="reference-section">
  <h2>Referenssit</h2>
  <!-- Carousel -->
  <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner carousel-inner-oma">
      <div class="carousel-item active ">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <img src="../assets/referenssi1.jpg" alt="Referenssi 1" width="50%">
            </div>
            <div class="col-sm-6 carousel-item-oma">
              <h3>Referenssi 1: Suurhanke: Helsinki – Tallinna Silta / Valtakunnan Silta Oy</h3>
              <p>Massiivinen, reippaan punainen Tallinnan silta avattiin liikenteelle tammikuussa 2020. Siltahanke on yksi Suomen ja Viron suurimpia yhteisiä rakennushankkeita. Tähän merkittävään rakennushankkeeseen osallistuivat kaikki suurimmat
                rakennusyhtiöt ja toimijat Suomesta ja Virosta. Ruosteinen Rauta Oy: toimitti kaikki sillan kaiteitten terärakenteiden tukevat pultit ja kaapelien suojaputket pääurakoitsija Valtakunnan Sillat Oy:lle. Pultti ja suojaputkitoimitukset
                saatiin
                toimitettua aikataulun mukaisesti.</p>
              <p>Valtakunnan Sillat Oy valitsi Ruosteinen Rauta Oy:n pultti ja suojaputkitoimittajaksi aikaisemman yhteistyön perusteella luottaen, että hankkeen tiukassa aikataulussa pysytään, kun pultit ja suojaputkitoimituksissa on luotettava
                kumppani.</p>
              <p>Seppo Silta kertookin yhteistyöstä ja toimituksista seuraavasti ”Ruosteinen Rauta yhtenä suurimpana rautakauppa ja metallialan toimittajana pystyy toimittamaan suuria määriä rakennustarvikkeita kriittisiin projekteihin. Yhteistyö
                Ruosteisen
                Raudan kanssa on toiminut aina hyvin ja tehokkaasti”. </p>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <img src="../assets/referenssi2.webp" alt="Referenssi 2">
            </div>
            <div class="col-sm-6 carousel-item-oma">
              <h3>Referenssi 2: Konepalvelut vuokraus / Koneline Oy</h3>
              <p>Koneline Oy tarjoaa maansiirto ja maatyö palveluita rakentajille. Vuonna 2021 KoneLine Oy luopui omista maansiirtokoneistaan ja käyttää urakoissaan Ruosteinen Rauta Oy:n vuokralaitevalikoimaa.</p>
              <p>”Ruosteinen Rauta Oy” toimittaa meille projekteihin tarvittavia laitteistoja ja koneita. Koneet ja laitteet ovat aina toimivia ja hyvin huollettuja. Siirtyessämme vuokrakoneiden käyttöön, olemme pystyneet tarjoamaan maansiirtotöitä
                erittäin
                edulliseen hintaan asiakkaillemme. Vuokrakoneiden käytössä pystymme käyttämään ja saamaan käyttöömme juuri oikean laitteen oikeaan aikaan ja tämä luo liiketoimintaan kustannustehokkuutta. Ruosteinen Rauta on merkittävä kumppanimme,
                joka
                mahdollistaa toimintamme joustavuuden. Kannattavuutemme on kasvanut 89% kun siirryimme hyödyntämään Ruosteisen Raudan vuokrakonevalikoimaa toiminnassamme. ” Kertoo toimitusjohtaja Jorma Kontio Koneline Oy:stä. Koneline Oy
                suositteleekin
                Ruosteisen Raudan konevalikoimaan pienemmille ja suuremmille työmaille. </p>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <img src="../assets/referenssi3.jpg" alt="Referenssi3">
            </div>
            <div class="col-sm-6 carousel-item-oma">
              <h3>Referenssi 3: Talonrakentaja Olli Orava</h3>
              <p>Uniikki koti rakentui Poriin vuonna 2019. Rakentaja Jussi Ahola rakensi unelmiensa kodin hankkien kaikki rakennustarvikkeet Ruosteisen Raudan monipuolisesta valikoimasta. Ahola on 12 metriä korkea moniulotteinen rakennus, oikea
                taideteos, joka
                toteutettiin Arkkitehtitoimisto Ainutlaatuinen koti Oy:n suunnitelmien pohjalta.</p>
              <p>Jussi Ahola kommentoi rakennusprojektiaan seuraavasti: ”Rakentaminen oli helppoa ja nopeaa Ruosteisen Raudan avulla. Monipuolinen valikoima mahdollisti kaikkien tarvikkeiden hankinnan yhdestä ja samasta paikasta, jolloin säästin
                kustannuksista
                ja sain aina kokonaisvaltaista palvelua kaikkiin rakentamiseen liittyviin kysymyksiin ja palveluihin liittyen. Suosittelen Ruosteisen Raudan valikoimaa lämpimästi kaikille rakentajille pieniin ja isoihin projekteihin.”</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</div>
</template>

<script>
export default {
    name: 'MainPageReferences'
}
</script>

<style>
  .reference-section {
    background-color: #cbced4;
  }

  .reference-section img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
  }

  .carousel-inner-oma {
    min-height: 520px;
    max-height: 100%;
    width: 100%;
    margin: 10px;
  }

  .carousel-item-oma{
    padding-left: 30px;
  }
  .carousel-item-oma:last-child {
    padding-bottom: 20px
  }
</style>