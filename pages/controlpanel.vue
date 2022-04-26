<template>
    <div>
        <h1>Hei, {{ $store.state.userInfo.firstName }} {{ $store.state.userInfo.lastName }}</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Etumimi</th>
                <th scope="col">Sukunimi</th>
                <th scope="col">Käyttäjänimi</th>
                <th scope="col">Muokkaa Tietoja</th>
                <th scope="col">Vaihda Salasana</th>
                <th scope="col">Poista Käyttäjä</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users"  v-bind:key="user.id">
                <th scope="row">{{user.id}}</th>
                <td v-if="selectedUserInfo == user.id">
                    <input v-model="changeFirstName" type="text" name="" id="change-first-name">
                </td>
                <td v-else>{{user.first_name}}</td>
                <td v-if="selectedUserInfo == user.id">
                    <input v-model="changeLastName" type="text" name="" id="change-last-name">
                </td>
                <td v-else>{{user.last_name}}</td>
                <td v-if="selectedUserInfo == user.id">
                    <input v-model="changeUserName" type="text" name="" id="change-user-name">
                </td>
                <td v-else>{{user.username}}</td>
                <td>
                    <div v-if="selectedUserInfo == user.id">
                        <button @click="setUserName(user.id)" type="button" class="btn btn-primary">Tallenna</button>
                        <button @click="selectedUserInfo = null" type="button" class="btn btn-primary">Peruuta</button>
                    </div>
                    <button v-else @click="selectUserInfo(user)" type="button" class="btn btn-primary">Muokkaa Tietoja</button>
                </td>
                <td>
                    <div v-if="selectedUserPassword == user.id"> 
                        <input v-model="changePassword" type="password" name="" id="change-pass">
                        <br>
                        <input v-model="changePasswordConfirm" type="password" name="" id="change-pass-confirm">
                        <br>
                        <button @click="setPassword(user.id)" type="button" class="btn btn-primary">Muokkaa</button>
                        <button @click="selectedUserPassword = null" type="button" class="btn btn-primary">Peruuta</button>
                    </div>
                    <button v-else @click="selectedUserPassword = user.id" type="button" class="btn btn-primary">Vaihda Salasana</button>
                </td>
                <td>
                    <button :disabled="$store.state.userInfo.id == user.id" @click="deleteUser(user.id)" type="button" class="btn btn-primary">Poista</button>
                </td>
                </tr>
            </tbody>
            </table>
            <form class="login-form" ref="login-form">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Etunimi:</label>
                    <input v-model="newUserFirstName" type="text" class="form-control" id="usr-fname">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Sukunimi:</label>
                    <input v-model="newUserLastName" type="text" class="form-control" id="usr-lname">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Käyttäjänimi:</label>
                    <input v-model="newUserLoginName" type="text" class="form-control" id="create-name">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Salasana:</label>
                    <input v-model="NewUserPassword" type="password" class="form-control" id="create-password">
                </div>
                <button v-if="$store.state.userInfo.loggedIn" @click="createNewUser()" type="button" class="btn btn-primary">Luo Käyttäjä</button>
            </form>
        </div>
</template>

<script>
    /*
        TODO:
            - Add Error Handling / Form Control.
    */
    import axios from 'axios';
    export default {
        data(){ 
            return {
                newUserFirstName: "",
                newUserLastName: "",
                newUserLoginName: "",
                newUserPassword: "",
                users: [],
                selectedUserInfo : null,
                selectedUserPassword : null,
                changeFirstName: "",
                changeLastName: "",
                changeUserName: "",
                changePassword: "",
                changePasswordConfirm: ""
            }
        },
        async created() {
            const sessionResponse = await axios.get('/php/checkSessionStatus.php');
            if(sessionResponse.data.logged_in == null){
                this.$store.commit('RESET_USER');
                this.$router.push('/');
            }
            else {
                this.$store.commit('SET_USER',
                    {
                        loggedIn: true,
                        firstName: sessionResponse.data.first_name,
                        lastName: sessionResponse.data.last_name,
                        id: sessionResponse.data.user_id,
                    }
                );
                const userResponse = await axios.get('/php/getUsers.php');
                this.users = userResponse.data;
            }
        },
        methods: {
            async createNewUser() {
                let params = new URLSearchParams();
                params.append('userName', this.newUserLoginName);
                params.append('userPass', this.newUserPassword);
                params.append('userFirstName', this.newUserFirstName);
                params.append('userLastName', this.newUserLastName);
                const createuserResponse = await axios.post('/php/addUser.php', params);
                const newRowsResponse = await axios.get('/php/getUsers.php');
                this.users = newRowsResponse.data;
                this.newUserFirstName = "";
                this.newUserLastName = "";
                this.newUserLoginName = "";
                this.newUserPassword = "";
            },
            async deleteUser(id){
                let params = new URLSearchParams();
                params.append('deleteId', id);
                const deleteUserResponse = await axios.post('/php/deleteUser.php', params);
                const newRowsResponse = await axios.get('/php/getUsers.php');
                this.users = newRowsResponse.data;
            },
            selectUserInfo(e){
                this.changeFirstName = e.first_name;
                this.changeLastName = e.last_name;
                this.changeUserName = e.username;
                this.selectedUserInfo = e.id
            },
            async setUserName(id){
                let params = new URLSearchParams();
                params.append('userFirstName', this.changeFirstName);
                params.append('userLastName', this.changeLastName);
                params.append('username', this.changeUserName);
                params.append('userId', id);
                const changeUserInfoResponse = await axios.post('/php/changeUserInfo.php', params);
                alert("Käyttäjätiedot Vaihdettu!");
                const newRowsResponse = await axios.get('/php/getUsers.php');
                this.users = newRowsResponse.data;
                this.selectedUserInfo = null;
                this.selectedUserPassword = null;
            },
            async setPassword(id){
                if(this.changePassword === this.changePasswordConfirm){
                    let params = new URLSearchParams();
                    params.append('userPass', this.changePassword);
                    params.append('userId', id);
                    const changePasswordResponse = await axios.post('/php/changePassword.php', params)
                    alert("Salasana vaihdettu!");
                    this.selectedUserInfo = null;
                    this.selectedUserPassword = null;
                }
                else{
                    alert("Salasana ei täsmää!");
                }
            }
        }   
    }
</script>

<style>
button{
    margin-top: 00.5em;
    margin-bottom: 0.5em;
}
</style>