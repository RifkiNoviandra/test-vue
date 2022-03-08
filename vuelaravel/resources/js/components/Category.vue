<template>
    <div class="container-fluid py-3 px-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal" @click="create_check">
            Insert Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent ref="form-data">
                            <label>Name :</label>
                            <input type="text" class="form-control" v-model="name">
                            <label>Description :</label>
                            <textarea class="form-control" v-model="description"></textarea>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="insert_data">Insert</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(i , index) in data">
                <th scope="row">{{index+1}}</th>
                <th class="d-none">{{i.id}}</th>
                <td>{{i.name}}</td>
                <td>{{i.description}}</td>
                <td>
                    <button type="submit" class="btn btn-danger me-2" @click="delete_data(i.id)">Delete</button>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#createModal" @click="update_data(i)">Update</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'Category',
    data(){
        return{
            data:[],
            name : "",
            description : "",
            id : 0,
            number: 0
        }
    },

    methods:{
        async get_data(){
            let path = await window.axios.get('/api/admin/category');
            this.data = path.data.data
            console.log(this.data);
        },

        async insert_data(){
            let input = {name:this.name , description:this.description}

            if (this.id === 0){
                let path = await window.axios.post('/api/admin/category/create' , input)
            }else{
                let path = await window.axios.post(`/api/admin/category/update/${this.id}` , input)
            }
            this.name = ""
            this.description = ""
            this.$refs['form-data'].reset();
            this.get_data()
        },

        async delete_data(id){
            let path = await window.axios.delete(`/api/admin/category/delete/${id}`)
            console.log(path);
            this.get_data();
        },

        async update_data(data){
            this.name = data.name
            this.description = data.description
            this.id = data.id
        },

        async create_check(){
            this.id = 0
          this.name = ""
          this.description = ""
        },
        async test(){
            console.log('test');
        }
    },
    mounted() {
        this.get_data()
    }
};
</script>

<style scoped>

</style>
