<template>
    <v-layout justify-center>
        <v-card elevation="16" outlined shaped width="60%" justify-center class="mb-5">
            <v-system-bar color="blue lighten-2" dark></v-system-bar>
            <v-card-title color="primary" class="justify-center mt-2">LOGIN</v-card-title>
            <v-form @submit.prevent="login">
                <v-row>
                    <v-col class="m-5">
                        <v-text-field label="Email" type="email" v-model="form.email"></v-text-field>
                        <span class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </span>

                        <v-text-field type="password" class="justify-content-center" label="Password"v-model="form.password"></v-text-field>
                        <span class="text-danger" v-if="errors.password"> {{ errors.password[0] }} </span>

                        <v-btn color="green" class="text-white float-end" type="submit">Login</v-btn>
                        <v-btn  class="text-white float-end mr-3"><router-link to="/signup">Singup</router-link></v-btn>

                    </v-col>
                </v-row>
            </v-form>
        </v-card>
    </v-layout>
</template>

<script>
export default {
data(){
    return{
        form:{
            email:null,
            password:null,

        },
        errors:{}

    }
},
    created() {
    if(User.loggedIn()){
        this.$router.push({ name: 'forum'})
    }
    },
    methods:{
        login(){
            axios.post('/api/login',this.form)
                .then(res => {
                    User.responseAfterLogin(res)
                    this.$router.push({ name: 'forum'})


                })
                .catch(error =>this.errors = error.response.data.errors)

        }
    }


}
</script>

