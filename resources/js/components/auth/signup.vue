<template>

    <v-layout justify-center >
        <v-card elevation="16" outlined shaped width="60%" justify-center class="mb-5">
            <v-system-bar color="blue lighten-2" dark></v-system-bar>
            <v-card-title color="primary" class="justify-center mt-2">Sign UP</v-card-title>
            <v-form @submit.prevent="signup">
                <v-row>
                    <v-col class="m-5">
                        <v-text-field label="Name" type="text" v-model="form.name"></v-text-field>
                        <span class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </span>

                        <v-text-field label="Email" type="text" v-model="form.email"></v-text-field>
                        <span class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </span>

                           <v-text-field label="Password" type="password" v-model="form.password"></v-text-field>
                           <span class="text-danger" v-if="errors.password"> {{ errors.password[0] }} </span>

                           <v-text-field label="Password Confirmation" type="password" v-model="form.password_confirmation"></v-text-field>
                           <span class="text-danger" v-if="errors.password_confirmation"> {{ errors.password_confirmation[0] }} </span>

                        <v-btn color="green" class="text-white float-end" type="submit">Sing up</v-btn>

                        <v-btn  class="text-white float-end mr-3"><router-link  class=" d-inline-block text-primary" to="/login">Login</router-link></v-btn>

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
            name:null,
            email:null,
            password:null,
            password_confirmation:null,

        },
        errors:{}

    }
},
    created() {
        if(User.loggedIn()) {
            this.$router.push({name: 'forum'})
        }

    },
    methods:{
        signup() {
            axios.post('/api/signup', this.form)
                .then(res => {
                    User.responseAfterLogin(res)
                    this.$router.push({ name: 'forum'})
                })

                .catch(error => this.errors = error.response.data.errors)


        }
}


}
</script>

