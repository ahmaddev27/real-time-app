

<template>

</template>


<script type="text/javascript">

import AppStorage from "../../Helpers/AppStorage";

export default {
    created() {
        if (User.loggedIn()) {
            AppStorage.clear()
            this.$router.push({name: '/'})
        }
        this.$router.push({name: '/'})
    }


}


</script>
