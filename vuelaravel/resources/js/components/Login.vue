<template>
    <div class="register-container d-flex justify-content-center align-items-center">
        <div class="container w-25 border-1">
            <h2>Login</h2>
            <form class="mt-3">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Login',
};
</script>

<style scoped>

</style>
