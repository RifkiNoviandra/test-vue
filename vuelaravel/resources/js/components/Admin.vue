<template>
        <div class="container-fluid">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
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
                    <td v-if="i.status === 'blocked' "><button class="btn btn-info" @click="Unblock_user(i.id)">Open Block</button></td>
                </tr>
                </tbody>
            </table>
        </div>
</template>

<script>
export default {
    name: 'Admin',
    data(){
        return {
            data : [],
            num :0
        }
    },
    methods : {
        async get_data(){
            let path = await window.axios.get('/api/admin/user');
            console.log(path);
            this.data = path.data.data
        },
        async block_user(id_user){
            let input = {user_id : id_user}
            let path = await window.axios.post('/api/admin/blockMember' , input)
            this.get_data()
        },
        async Unblock_user(id_user){
            let input = {user_id : id_user}
            let path = await window.axios.post('/api/admin/UnblockMember' , input)
            this.get_data()
        }
    },
    mounted() {
        this.get_data()
    }
};
</script>

<style scoped>

</style>
