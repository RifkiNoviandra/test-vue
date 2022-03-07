<template>
    <div class="container-fluid w-75 d-flex justify-content-center py-5">
        <img :src="`images/${data.image}`" alt="" class="detail_image_nft me-5">
        <div class="container w-50">
            <div class="nft_title d-flex align-items-center">
                <h2>{{data.name}}</h2>
                <div class="category_desc text-center py-1 ms-2">{{ category }}</div>
            </div>
            <div class="owner">
                <p>owner : {{data.owner}}</p>
            </div>
            <div class="description">
                {{data.description}}
            </div>
            <div class="price mb-3">
                ${{data.price}}
            </div>
            <div class="bid d-flex justify-content-between align-items-center">
                <div>
                    <p>Current Bid</p>
                    <p>${{price}}</p>

                    <button class="button_bid" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Place A Bid
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Place A Bid</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" v-if="token === token_local">
                                    <h2 class="mb-5" >You Cant Bid Your Own NFT</h2>
                                </div>
                                <div class="modal-body" v-if="token !== token_local">
                                    <h2 class="mb-5" >Minimum Bid For this NFT is ${{price}}</h2>
                                    <form @submit.prevent>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Bid Values</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="bid">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" @click="bid_nft">Bid</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
<!--            <div class="auction_time d-flex justify-content-center align-items-center h-25">-->
<!--                1 Day 1 Hour 1 Minute 1 Second-->
<!--            </div>-->
            <div class="bid_history mt-3">
                <h3>3 Top Bid History</h3>
                <div class="card mt-2" v-for="t in history">
                    <div class="card-body">
                        <h5 class="card-title">Username : {{t.user.username}}</h5>
                        <p class="card-text">Bid Value: ${{t.bid_value}}</p>
                        <p class="ms-auto">Bid At: {{t.Bid_at}}</p>
                    </div>
                </div>
<!--                <div class="card mt-2">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title">Username : Rkinova</h5>-->
<!--                        <p class="card-text">Bid Value: $41.15</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="card mt-2">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title">Username : Rkinova</h5>-->
<!--                        <p class="card-text">Bid Value: $40.15</p>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Detail',
    data(){
        return {
            data : [],
            category : "",
            price : 0,
            history: [],
            bid: 0,
            token: "",
            token_local: "",
        }
    },
    methods :{
      async get_data(){
          let path = await window.axios.get(`/api/nft/${this.$route.params.id}`)
          this.data = path.data.data
          console.log(this.data);
          if (this.data.category.length === 0){
              this.category = "Null"
          }else{
              this.category = this.data.category[0].list_category.name;
          }
          if (this.data.current_bid === null){
                this.price = 0
          }else {
              this.price = this.data.current_bid
          }
          this.token = this.data.user.token
          console.log(this.token);
          this.token_local = localStorage.getItem('token');
          console.log(localStorage.getItem('token'));
      },
      async bidHistory(){
          let path = await window.axios.get(`api/nft/bidhist/${this.$route.params.id}`)
          this.history = path.data.data
          if (this.history.length > 3){
              this.history.length = 3
          }
      },
        async bid_nft(){
            let input = {bid_value : this.bid}
            let path = await window.axios.post(`/api/nft/trade/${this.data.id}` , input)
            console.log(this.bid);
            this.bidHistory()
            console.log(path);
        }
    },
    mounted() {
        this.get_data()
        this.bidHistory()
    }
};
</script>

<style scoped>

</style>
