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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">NFT</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="d-flex">
        <div class="sidebar py-3 px-2">
            <div class="filter d-flex align-items-center">
                <img src="images/filter.png" alt="">
                <div>Filter</div>
            </div>
        </div>
        <div class="container-fluid py-3">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <div>Click To Become Our Member or Login</div>
                <div class="button-group d-flex">
                    <button class="btn-custom register py-2">Register</button>
                    <button class="btn-custom login py-2">Login</button>
                </div>
            </div>
            <div class="container-fluid mb-5">
                <h2 class="headline">
                    Newest Nft
                </h2>
                <div class="blue-line"></div>
                <div class="card card-width mt-3 pt-3">
                    <img src="images/2_optimized.png" class="card-img-top nft_image mx-4" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><b>2_optimized</b></h5>
                        <p class="card-text">$64.00</p>
                        <p class="card-text">owner : Rkinova</p>
                        <router-link to="" href="#" class="btn btn-primary">Check For More</router-link>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <h2 class="headline">
                    Most Selling Nft
                </h2>
                <div class="blue-line"></div>
                <div class="card card-width mt-3 pt-3">
                    <img src="images/2_optimized.png" class="card-img-top nft_image mx-4" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><b>2_optimized</b></h5>
                        <p class="card-text">$64.00</p>
                        <p class="card-text">owner : Rkinova</p>
                        <router-link to="" href="#" class="btn btn-primary">Check For More</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Landing',
};
</script>

<style scoped>

</style>
