<template>
    <div class="container_admin d-flex">
        <div class="sidebar_admin bg-dark">
            <router-link to="/admin" class="text-decoration-none text-white d-flex py-5"><div class="container-fluid text-center">
                User List
            </div></router-link>
            <router-link to="/nft" class="text-decoration-none text-white d-flex py-5"><div class="container-fluid text-center">
                NFT List
            </div></router-link>
            <router-link to="/category" class="text-decoration-none text-white d-flex py-5"><div class="container-fluid text-center">
                Category List
            </div></router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: 'Template_admin',
};
</script>

<style scoped>

</style>
