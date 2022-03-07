<template>
    <div class="register-container d-flex justify-content-center align-items-center">
        <div class="container w-25 border-1">
            <h2>Login</h2>
            <form class="mt-3">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" v-model="username">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" v-model="password">
                </div>
                <button type="submit" class="btn btn-primary" @click="login">Login</button>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Login',
    data(){
        return{
            data : [],
            username : "",
            password : ""
        }

    },
    methods : {
        async login(){
            let input_data = {username : this.username , password : this.password}
            let path = await window.axios.post('/api/user/login' , input_data)
            this.data = path.data
            console.log(path.data);

            if (path.status === 200){
                localStorage.setItem('token' , path.data.message)
                if (this.data.role === 'user'){
                    this.$router.push('/home')
                }else{
                    this.$router.push('/admin')
                }
            }else{

            }
        }
    },
};
</script>

<style scoped>

</style>
