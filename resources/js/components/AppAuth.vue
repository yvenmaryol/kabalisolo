<template>
    <div>
        <!-- <toolbar></toolbar> -->
        <router-view></router-view>
    </div>
</template>

<script>
import toolbar from './Assets/Toolbar'
import Login from './Auth/Login'
export default {
    components:{ toolbar, Login }
}
</script>