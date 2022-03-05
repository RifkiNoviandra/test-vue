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
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">NFT</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid w-75 d-flex justify-content-center py-5">
        <img src="" alt="" class="detail_image_nft me-5">
        <div class="container w-50">
            <div class="nft_title d-flex align-items-center">
                <h2>Nft Title Here</h2>
                <div class="category_desc text-center py-1 ms-2">category</div>
            </div>
            <div class="owner">
                <p>owner : Rkinova</p>
            </div>
            <div class="description">
                Put Your Description Here
            </div>
            <div class="price mb-3">
                $64.00
            </div>
            <div class="bid d-flex justify-content-between align-items-center">
                <div>
                    <p>Current Bid</p>
                    <p>$42.15</p>
                    <button class="button_bid">
                        Place A Bid
                    </button>
                </div>

            </div>
<!--            <div class="auction_time d-flex justify-content-center align-items-center h-25">-->
<!--                1 Day 1 Hour 1 Minute 1 Second-->
<!--            </div>-->
            <div class="bid_history mt-3">
                <h3>3 Top Bid History</h3>
                <div class="card mt-2">
                    <div class="card-body">
                        <h5 class="card-title">Username : Rkinova</h5>
                        <p class="card-text">Bid Value: $42.15</p>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <h5 class="card-title">Username : Rkinova</h5>
                        <p class="card-text">Bid Value: $41.15</p>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <h5 class="card-title">Username : Rkinova</h5>
                        <p class="card-text">Bid Value: $40.15</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Detail',
};
</script>

<style scoped>

</style>
