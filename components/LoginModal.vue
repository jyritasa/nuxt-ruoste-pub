<template>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sisään Kirjautuminen</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="login-form">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Käyttäjänimi:</label>
                    <input v-model="loginName" type="text" class="form-control" id="usr-name">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Salasana:</label>
                    <input v-model="loginPass" type="password" class="form-control" id="password">
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sulje</button>
                <button v-if="!$store.state.userInfo.loggedIn" @click="login()" type="button" class="btn btn-primary">Kirjaudu Sisään</button>
                <button v-else @click="logout()" type="button" class="btn btn-primary">Kirjaudu Ulos</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: 'LoginModal',
            data(){ 
            return {
                loginName: "",
                loginPass: "",
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
            async login() {
                let params = new URLSearchParams();
                params.append('loginName', this.loginName);
                params.append('loginPass', this.loginPass);
                const response = await axios.post('/php/login.php', params); 
                if(response.data.password_response){
                    this.$store.commit('SET_USER',
                    {
                        loggedIn: true,
                        firstName: response.data.first_name,
                        lastName: response.data.last_name,
                        id: response.data.user_id,
                    });
                    $('#loginModal').modal('hide');
                    this.$router.push('/controlpanel/');
                }
            },
        }
    }
</script>

<style>

</style>