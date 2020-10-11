<template>
   <div class="registerpage">
      <b-navbar toggleable="lg" type="dark" variant="dark">
         <b-navbar-brand href="#">MYHackathon</b-navbar-brand>
         <b-navbar-nav class="ml-auto">
            <b-nav-item href="/">Sign In</b-nav-item>
         </b-navbar-nav>
      </b-navbar>
      <b-form id="registerform">
         <h1>Register</h1>
         <b-form-group label="Username" label-for="name">
            <b-form-input id="name" v-model="name"></b-form-input>
         </b-form-group>
         
         <b-form-group label="Email" label-for="email">
            <b-form-input id="email" type="email" v-model="email"></b-form-input>
         </b-form-group>
         
         <b-form-group label="Phone Number" label-for="phone">
            <b-form-input id="phone" v-model="phone_no"></b-form-input>
         </b-form-group>

         <b-form-group label="Address" label-for="address">
            <b-form-input id="address" v-model="address"></b-form-input>
         </b-form-group>

         <b-form-group label="Password" label-for="password">
            <b-form-input :state="password_length" id="password" type="password" v-model="password"></b-form-input>
         </b-form-group>

         <b-form-group label="Password Confirmation" label-for="password_confirmation">
            <b-form-input :state="password_match" id="password_confirmation" type="password" v-model="password_confirmation"></b-form-input>
         </b-form-group>
          
         <b-button v-on:click="register" type="submit" variant="success">Sign Up</b-button>
      </b-form>
   </div>
</template>

<script>
   export default {
      data(){
         return {
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            address: "",
            phone_no: ""
         }
      },

      methods: {
         register(){
            this.axios.post('api/register', {
               "name": this.name,
               "email": this.email,
               "password": this.password,
               "address": this.address,
               "phone_no": this.phone_no,
               "password_confirmation": this.password_confirmation 
            })
            .then(response => {
               console.log(response)
            })
            .catch(err => {
               console.log(err.response.data)
            })
         }
      },

      computed: {
         password_length(){
            return this.password.length >= 6 ? true : false;
         },

         password_match(){
            return this.password === this.password_confirmation;
         }
      }
   }
</script>
