<template>
    <div id="loginpage">
        <b-navbar variant="dark" type="dark" toggleable="lg">
            <b-navbar-brand href="#">MYHackathon</b-navbar-brand>
            <b-navbar-nav class="ml-auto">
                <b-nav-item href="/register">Sign Up</b-nav-item>
            </b-navbar-nav>
        </b-navbar>

        <div id="LoginContainer" class="container">
            <b-form>
                <h1>Login</h1>
                <b-form-group
                    id="ID"
                    label="Username:"
                    label-for="name"
                >
                <b-form-input id="name" v-model="name"></b-form-input>
                </b-form-group>
                
                <b-form-group
                    id="pwd"
                    label="Password"
                    label-for="password"
                >
                <b-form-input id="password" type="password" v-model="password"></b-form-input>
                </b-form-group>

                <b-button v-on:click="login" type="submit" variant="success">Sign in</b-button>
            </b-form>
        </div>
    </div>
</template>

<script>
    export default {
        // create, mounted, data, methods
        data() {
            return {
                name: "",
                password: ""
            }
        },

        methods: {
            login(){
                this.axios.post('api/login', {
                    'name': this.name,
                    'password': this.password
                })
                .then(response => {
                    console.log(response);
                })
                .catch(err => {
                    console.log(err.response.data)
                })
            }
        }
    }
</script>
