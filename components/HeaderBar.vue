<template>
  <div>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <NuxtLink class="navbar-brand" to="/">
          <img src="../assets/logo_dark.png" alt="logo">
        </NuxtLink>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <NuxtLink class="nav-link" to="/">Etusivu</NuxtLink>
            </li>
            <li class="nav-item">
              <NuxtLink class="nav-link" to="/example">Esimerkki</NuxtLink>
            </li>
            <li v-if="$store.state.userInfo.loggedIn" class="nav-item">
              <NuxtLink class="nav-link" to="/controlpanel">Käyttäjäpaneeli</NuxtLink>
            </li>
          </ul>
          <button v-if="!$store.state.userInfo.loggedIn" type="button" class="btn btn-primary d-flex" data-bs-toggle="modal" data-bs-target="#loginModal">Kirjaudu Sisään</button>
          <button v-else type="button" class="btn btn-primary d-flex" @click="logout()">Kirjaudu Ulos</button>
        </div>
        </div>
      </nav>
    </header>
    <LoginModal />
  </div>
</template>

<script>
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import axios from 'axios';

export default {
  name: 'HeaderBar',
      data(){ 
        return {
        }
    },
    async created() {
        const response = await axios.get('/php/checkSessionStatus.php');
        if(response.data.logged_in == null){
          this.$store.commit('RESET_USER');
        }
        else {
          this.$store.commit('SET_USER',
              {
                loggedIn: true,
                firstName: response.data.first_name,
                lastName: response.data.last_name,
                id: response.data.user_id,
              }
            );
        }
    },
    methods: {
      async logout(){
        const response = await axios.get('/php/logout.php');
        this.$store.commit('RESET_USER');
        this.$router.push('/');
      }
    }
}
</script>

<style>
  
</style>