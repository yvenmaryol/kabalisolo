<template>
    <div>
        <toolbar></toolbar>
        <router-view></router-view>
    </div>
</template>

<script>
import toolbar from './Assets/Toolbar'
export default {
    components:{ toolbar }
}
</script>