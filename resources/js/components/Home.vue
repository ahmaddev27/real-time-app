<template>
    <div>
        <toolbar-component></toolbar-component>

       <v-container style="margin-top: 100px">
               <router-view></router-view>
           <br>

       </v-container>

        <footer-component></footer-component>
    </div>

</template>

<script>
import Toolbar from "./Toolbar";
import Footer from "./Footer";
import login from "./auth/login";
export default {
    components: {Toolbar,Footer,login}
}
</script>
