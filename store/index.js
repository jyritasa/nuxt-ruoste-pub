export const state = () => ({
    userInfo: {  
        loggedIn: false,  
        id: 0,
        firstName: "",
        lastName: "",
    }
})

export const mutations = {
    RESET_USER (state) {
        state.userInfo = {
            loggedIn : false,
            id : 0,
            firstName : "",
            lastName : ""
        };
    },
    SET_USER (state, payload) {
        state.userInfo = payload;
    }
}