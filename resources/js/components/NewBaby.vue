<template>
   <div id="new_baby_page">
      <b-navbar toggleable="lg" type="dark" variant="dark">
         <b-navbar-brand href="#">MYHackathon</b-navbar-brand>
         <b-navbar-nav class="ml-auto">
            <b-nav-item href="previouscheck">All Records</b-nav-item>
         </b-navbar-nav>
      </b-navbar>
      <div class="container" id="new_baby_form">
         <h1 style="font-weight: bold;">New Born Baby</h1>
         <b-form> 
            <b-form-group label="BC No." label-for="bc">
               <b-form-input v-model="bc" id="bc"></b-form-input>
            </b-form-group>

            <b-form-group label="Baby Name" label-for="baby_name">
               <b-form-input v-model="name" id="baby_name"></b-form-input>
            </b-form-group>
           
            <b-form-group label="Birth Date" label-for="birth_date">
               <b-form-input v-model="birth_date" type="date" id="birth_date"></b-form-input>
            </b-form-group>

            <b-form-group label="Guardian Name" label-for="guardian">
               <b-form-input id="guardian" v-model="guardian_name"></b-form-input>
            </b-form-group>

            <b-form-group label="Guardian 2 Name" label-for="guardian2">
               <b-form-input id="guardian2" v-model="guardian2_name"></b-form-input>
            </b-form-group>

            <b-form-group label="Address" label-for="address">
               <b-form-input id="address" v-model="address"></b-form-input>
            </b-form-group>

            <b-form-group label="Phone No." label-for="phone_no">
               <b-form-input id="phone_no" v-model="phone_no"></b-form-input>
            </b-form-group>

            <b-form-group label="Baby's Gender" label-for="gender">
               <b-form-select :options="options" id="gender" v-model="gender"></b-form-select>
            </b-form-group>

            <b-form-group label="Ethnic" label-for="ethnic">
               <b-form-select :options="options_2" id="ethnic" v-model="ethnic"></b-form-select>
            </b-form-group> 

            <b-button type="submit" v-on:click="addbaby" variant="success">Done</b-button>
         </b-form>
      </div>
   </div>
</template>

<script>
   export default {
      data(){
         return {
            bc: '',
            name: '',
            birth_date: '',
            guardian_name: '',
            guardian2_name: '',
            address: '',
            gender: '',
            ethnic: '',
            phone_no: '',
            options: [
               { value: 'Male', text: 'Male' },
               { value: 'Female', text: 'Female' }
            ],
            options_2: [
               { value: 'Melayu', text: 'Melayu' },
               { value: 'Cina', text: 'Cina' },
               { value: 'India', text: 'India' },
               { value: 'Orang Asli', text: 'Orang Asli' },
               { value: 'Other', text: 'Other' },
            ]
         }
      },

      methods: {
         addbaby(){
            this.axios.post('api/new_baby', {
               'bc': this.bc,
               'name': this.name,
               'birth_date': this.birth_date,
               'guardian_name': this.guardian_name,
               'guardian2_name': this.guardian2_name,
               'address': this.address,
               'gender': this.gender,
               'ethnic': this.ethnic,
               'phone_no': this.phone_no
            })
            .then(response => {
               console.log(response)
            })
            .catch(err => {
               console.log(err.response.data)
            })
         }
      },
   }
</script> 