<template>
    <div>
        <h1>This is an example Page</h1>
        <p>{{ $store.state.userInfo.firstName }}</p>
        <p>{{ $store.state.userInfo.lastName }}</p>
        <p>{{ $store.state.userInfo.id }}</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse nam praesentium nisi vel tempore mollitia amet commodi voluptates minima. Magni debitis illum maiores sint fugit neque harum commodi id ullam.</p>
        <p v-if="$store.state.userInfo.loggedIn">Sessio Testi: ON!</p>
        <p v-else>Sessio Testi: OFF!</p>
    </div>
</template>

<script>

export default {
    data(){ 
        return {
        }
    },
    async created() {
    },
    methods: {
    }
}
</script>
