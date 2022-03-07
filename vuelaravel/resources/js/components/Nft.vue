<template>
    <div class="container-fluid">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
                <th scope="col">Password</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="i in data">
                <th scope="row">{{i.id}}</th>
                <td>{{i.username}}</td>
                <td>{{i.email}}</td>
                <td>{{i.password}}</td>
                <td>{{i.status}}</td>
                <td v-if="i.status === 'aktif' "><button class="btn btn-danger"  @click="block_user(i.id)">Block Member</button></td>
                <td v-if="i.status === 'blocked' "><button class="btn btn-info">Open Block</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'Nft',
};
</script>

<style scoped>

</style>
