.<template>
  <div>
    <footer>
      <div class="footer-container">
        <div class="footer-item">
          <img src="../assets/Logo_light.svg" alt="">
          <div class="contact-information">
            <p>Ruosteinen Rauta Oy <br>
              Urheilutie 1,<br>
              28500 Pori<br>
              044 7011442<br>
              <a href="">info@ruosteinenrauta.fi</a>
            </p>
          </div>
        </div>
        <div class="footer-item">
          <div class="form-title">
            <h3>Ota Yhteyttä</h3>
          </div>
          <div class="form">
            <form class="feedback" action="" method="">
              <div class="form-group">
                <input type="text" class="form-control" id="feedbackName" placeholder="Nimi">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="feedbackNumber" placeholder="Puhelinnumero">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="feedbackEmail" aria-describedby="emailHelp" placeholder="nimi@email.fi">
              </div>
              <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Viesti"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Lähetä</button>
            </form>
          </div>
        </div>
      </div>
      <div class="copyright-text">
        <p>Taitaja &copy; 2022</p>
      </div>
    </footer>
  </div>
</template>

<script>
  export default {
    name: 'FooterBar'
  }
</script>

<style>
  footer {
    background-color: #cbced4;
  }

  .footer-container {
    display: flex;
    flex-wrap: wrap-reverse;
    justify-content: space-between;
  }

  .footer-item {
    padding: 5px;
    min-width: 360px;
  }

  .copyright-text {
    text-align: center;
    padding-bottom: 10px;
  }

  .contact-information p{
    padding-left: 10px;
  }

  .form-group {
    padding-bottom: 10px !important;
  }
</style>

