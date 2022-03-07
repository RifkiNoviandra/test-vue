<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="" alt="" width="30" height="24" class="d-inline-block align-text-top">
                NFTmaster
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link to="/landing" class="nav-link active" aria-current="page" href="#">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">NFT</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <router-link :to="`${this.$route.path}/search/:key`" class="btn btn-outline-success" type="submit">Search</router-link>
                </form>
            </div>
        </div>
    </nav>
    <router-view></router-view>
</template>

<script>
export default {
    name: 'template_HeaderGuest',
    data(){
        return {
            key: ""
        }
    }
};
</script>

<style scoped>

</style>
