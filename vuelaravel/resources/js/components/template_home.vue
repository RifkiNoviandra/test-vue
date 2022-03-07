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
                        <router-link to="/home" class="nav-link active" aria-current="page" href="#">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">NFT</a>
                    </li>
                </ul>
                <button class="btn btn-outline-info me-2" type="button" data-bs-toggle="modal" data-bs-target="#NftUpload">Upload Your Nft Now</button>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" v-model="key">
                    <router-link :to="`${this.$route.path}/search/${key}`" class="btn btn-outline-success" type="submit">Search</router-link>
                </form>
                <button class="ms-5 logout bg-danger" > Logout </button>
            </div>
        </div>
    </nav>
    <router-view></router-view>
</template>

<script>
export default {
    name: 'template_home',
    data(){
        return {
            name : "",
            description : "",
            image: "",
            price: 0,
            key: ""
        }
    },
};
</script>

<style scoped>

</style>
