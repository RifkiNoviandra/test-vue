<template>
    <div class="register-container d-flex justify-content-center align-items-center">
        <div class="container w-25 border-1">
            <h2>Register</h2>
            <form class="mt-3" @submit.prevent>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" v-model="username">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" v-model="password">
                </div>
                <button type="submit" class="btn btn-primary" @click="register">Register</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Register',
    data(){
        return {
            data : [],
            username : "",
            email : "",
            password: "",
        }
    },
    methods : {
        async register(){
            let input = {username : this.username , email: this.email , password : this.password}

            let path = await window.axios.post('/api/user/register' , input);

            console.log(path);

            if (path.data.message === "Insert Complete"){
                this.$router.push('/login')
            }else {
                alert("Data Cant Be Inserted")
            }
        }
    }
};
</script>

<style scoped>

</style>
