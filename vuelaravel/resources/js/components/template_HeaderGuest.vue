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
                        <a class="nav-link active" aria-current="page" href="#newest">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">NFT</a>
                    </li>
                </ul>
                <div class="button-group d-flex">
                    <router-link to="/register" class="btn-custom register d-flex align-items-center justify-content-center">Register</router-link>
                    <router-link to="/login" class="btn-custom login d-flex align-items-center justify-content-center">Login</router-link>
                </div>
            </div>
        </div>
    </nav>
    <router-view></router-view>
    <footer class="container-fluid footer bg-dark border-top d-flex align-items-center justify-content-between">
        <div class="logo">
        </div>
        <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex px-5">
                <h5 class="text-white">Menu</h5>
                <li class="nav-item">
                    <router-link to="/landing" class="nav-link active text-white" aria-current="page" href="#">Home</router-link>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">NFT</a>
                </li>
            </ul>
        </div>
        <div class="subscribe">
            <form>
                <input type="text" class="subs px-3" placeholder="Insert Your Email Here...">
                <button class="button-subs">Subscribe</button>
            </form>
        </div>
        <div class="contact d-flex flex-column">
        <h4 class="text-white">Contact</h4>
        <div class="sosmed d-flex me-5">
            <img src="images/facebook (1).png" class="sosmed_img" alt=""><img src="images/instagram (1).png" class="sosmed_img" alt=""><img src="images/twitter.png" class="sosmed_img" alt="">
        </div>
        </div>
    </footer>
    <div class="container-fluid copyright"> CopyRight : MasterNFT 2022</div>
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
