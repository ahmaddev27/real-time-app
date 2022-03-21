<template>


    <v-layout justify-center>

        <v-card elevation="16" outlined shaped width="70%" justify-center>
            <v-system-bar color="blue lighten-2" dark></v-system-bar>
            <v-card-title color="primary" class="justify-center mt-2">LOGIN</v-card-title>
            <v-form @submit.prevent="login">
                <v-row>
                    <v-col class="m-5">
                        <v-text-field label="Email" type="email" v-model="form.email"></v-text-field>
<!--                        <small class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </small>-->

                        <v-text-field type="password" class="justify-content-center" label="Password"v-model="form.password"></v-text-field>
<!--                        <small class="text-danger" v-if="errors.password"> {{ errors.password[0] }} </small>-->

                        <v-btn color="green" class="text-white float-end" type="submit">Login</v-btn>
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
    methods:{
        login(){
            User.login(this.form)
        }
    }


}
</script>

