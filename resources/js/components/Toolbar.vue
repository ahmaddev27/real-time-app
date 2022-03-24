<template>
    <v-card height="10px" >
    <v-toolbar    elevation="12" >
        <v-toolbar-title> REALTIME APP </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items class="hidden-sm-and-down">
<!--        <v-btn text>-->
<!--            <router-link to="/login">  Login</router-link>-->
<!--        </v-btn>-->
<!--            <v-btn text>-->
<!--                <router-link to="/forum" > Forum</router-link>-->
<!--        </v-btn>-->

            <router-link v-for="item in items" :key="item.title" :to="item.to" v-if="item.show">
                <v-btn text class=" mt-3">
                 {{ item.title}}
                </v-btn>
            </router-link>

        </v-toolbar-items>
    </v-toolbar>



    </v-card>
</template>


<script>
export default {
    data(){
        return{
            items:[
                {title:'Forum',to:'/forum',show:true},
                {title:'Ask Question',to:'/ask',show:User.loggedIn()},
                {title:'Categories',to:'/category',show:User.loggedIn()},
                {title:'Login',to:'/login',show:!User.loggedIn()},
                {title:'Logout',to:'/logout',show:User.loggedIn()},
            ]
        }
    }
}
</script>
