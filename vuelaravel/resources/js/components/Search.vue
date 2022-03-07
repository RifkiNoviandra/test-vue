<template>
    <div class="d-flex">
        <div class="sidebar py-3 px-2">
            <div class="filter d-flex align-items-center">
                <img src="images/filter.png" alt="">
                <div>Filter</div>
            </div>
        </div>
        <div class="container-fluid py-3">
            <div class="container-fluid mb-5">
                <h2 class="headline">
                    Nft With Search Key
                </h2>
                <div class="blue-line"></div>
                <div class="container-fluid d-flex flex-wrap">
                    <div class="card card-width mt-3 pt-3 me-4" v-for="i in data1">
                        <img :src="`images/${i.image}`" class="card-img-top nft_image mx-4" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{i.name}}</b></h5>
                            <p class="card-text">${{i.price}}</p>
                            <p class="card-text">owner : {{i.user.username}}</p>
                            <router-link :to="`/home/detail/${i.id}`" class="btn btn-primary">Check For More</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Search',
    data(){
        return {
            data1 : [],
            data2 : []
        }
    },
    methods : {
        async get_data(){
            let key = {key : this.$route.params.key}

            let path = await window.axios.post('/api/search' , key)
            this.data1 = path.data.data_name;
            // this.data2 = path.data.data_category.category.nft;
            console.log(path);
        }
    },
    mounted() {
        this.get_data()
    }
};
</script>

<style scoped>

</style>
