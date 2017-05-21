<template>
    <div>
        <div class="settingBox">
            Settings
        </div>
        <ul class="SideMenuUl">
            <router-link to="/admin/role" tag="li">
                <a><i class="fa fa-gear"></i> <span>&nbsp Role</span></a>
           </router-link>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
