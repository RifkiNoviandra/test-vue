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
                    Newest Nft
                </h2>
                <div class="blue-line"></div>
                <div class="container-fluid d-flex">
                    <div class="card card-width mt-3 pt-3 me-4" v-for="i in newest_data">
                        <img :src="`images/${i.image}`" class="card-img-top nft_image mx-4" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{i.name}}</b></h5>
                            <p class="card-text">${{i.price}}</p>
                            <p class="card-text">owner : {{i.user.username}}</p>
                            <router-link :to="`${this.$route.path}/detail/${i.id}`" class="btn btn-primary">Check For More</router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <h2 class="headline">
                    Most Selling Nft
                </h2>
                <div class="blue-line"></div>
                <div class="container-fluid d-flex">
                    <div class="card card-width mt-3 pt-3 me-4" v-for="d in hottest_data">
                        <img :src="`images/${d.image}`" class="card-img-top nft_image mx-4" alt="">
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

    <div class="modal fade" id="NftUpload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent ref="form">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label" >Name :</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Crypto Punk No.2" v-model="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label" >Price :</label>
                            <input type="number" class="form-control" id="" placeholder="In Dollar" v-model="price">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >Description :</label>
                            <textarea class="form-control" id="" rows="3" v-model="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image :</label>
                            <input class="form-control" type="file" id="formFile" ref="image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" @click="upload_nft">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Home',
    data(){
        return {
            newest_data : [],
            hottest_data: [],
            name : "",
            description : "",
            image: "",
            price: 0,
            key: ""
        }
    },
    methods:{
        async get_topSale_data(){
            let path = await window.axios.get('/api/nft/buy');
            this.hottest_data = path.data.data
            if (this.hottest_data.length > 4){
                this.hottest_data.length = 4
            }
            console.log(path);
        },
        async get_Newest_data(){
            let path = await window.axios.get('/api/nft/');
            this.newest_data = path.data.data
            if (this.newest_data.length > 4){
                this.newest_data.length = 4
            }
            console.log(path);
        },
        async upload_nft(){
            let form_data = new FormData;

            form_data.append("name" , this.name);
            form_data.append("image" , this.$refs.image.files[0])
            form_data.append("description" , this.description)
            form_data.append("price" , this.price)

            let path = await  window.axios.post('/api/nft/upload' , form_data);

            console.log(path);
            this.get_Newest_data();
            this.get_topSale_data();

            this.name = "";
            this.price = 0;
            this.description = "";
            this.$refs.form.reset();
        },

        // async logout(){
        //     let path = await
        // }
    },
    mounted() {
        this.get_topSale_data();
        this.get_Newest_data();
    }
};
</script>

<style scoped>

</style>
