<template>
    <div class="container-fluid Hero d-flex flex-column align-items-center justify-content-center">
        <h1>Nft Master</h1>
        <h2>Your Nft Development Begin Here</h2>
        <form class="d-flex">
            <input class="form-control me-2 input_search" type="search" placeholder="Search" aria-label="Search" v-model="key">
            <router-link :to="`${this.$route.path}/search/${key}`" class="btn btn_custom_color btn-outline-success py-2" type="submit">Search</router-link>
        </form>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide height_custom" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner height_custom">
            <div class="carousel-item active">
                <img src="images/images.jpg" class="d-block w-100 img_fit" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/images (5).jpg" class="d-block w-100 img_fit" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/neon-jungle-art-4k-pp-2560x1600.jpg" class="d-block w-100 img_fit" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="d-flex">
        <div class="container-fluid py-3">
            <div class="container-fluid border-bottom" id="newest">
                <h2 class="headline">
                    Newest Nft
                </h2>
                <div class="blue-line"></div>
                <div class="container-fluid d-flex flex-wrap mb-5">
                    <div class="card card-width mt-3 pt-3 me-3" v-for="i in newest_data">
                        <img :src="`images/${i.image}`" class="card-img-top nft_image mx-4 hovering1" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{i.name}}</b></h5>
                            <p class="card-text">${{i.price}}</p>
                            <p class="card-text">owner : {{i.user.username}}</p>
                            <router-link :to="`${this.$route.path}/detail/${i.id}`" class="btn btn-primary">Check For More</router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid mt-4" id="topSale">
                <h2 class="headline">
                    Most Selling Nft
                </h2>
                <div class="blue-line"></div>
                <div class="container-fluid d-flex flex-wrap">
                    <div class="card card-width mt-3 pt-3 me-3" v-for="d in hottest_data">
                        <img :src="`images/${d.image}`" class="card-img-top nft_image mx-4 hovering" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{d.name}}</b></h5>
                            <p class="card-text">${{d.price}}</p>
                            <p class="card-text">owner : {{d.user.username}}</p>
                            <router-link :to="`${this.$route.path}/detail/${d.id}`" href="#" class="btn btn-primary">Check For More</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Landing',
    data(){
        return {
            newest_data : [],
            hottest_data: [],

        }
    },
    methods:{
        async get_topSale_data(){
            let path = await window.axios.get('/api/nft/buy');
            this.hottest_data = path.data.data
            if (this.hottest_data.length > 5){
                this.hottest_data.length = 5
            }
            console.log(path);
        },
        async get_Newest_data(){
            let path = await window.axios.get('/api/nft/');
            this.newest_data = path.data.data
            if (this.newest_data.length > 5){
                this.newest_data.length = 5
            }
            console.log(path);
        }
    },
    mounted() {
        this.get_topSale_data();
        this.get_Newest_data();
    }
};
</script>

<style scoped>

</style>
