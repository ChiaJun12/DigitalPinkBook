<template>
   <div id="new_record">
      <b-navbar toggleable="lg" type="dark" variant="dark">
         <b-navbar-brand href="#">MYHackathon</b-navbar-brand>
         <b-navbar-nav class="ml-auto">
            <b-nav-item href="/">All Records</b-nav-item>
         </b-navbar-nav>
      </b-navbar>
      <div class="container" id="newdata_container">
         <h1 style="font-weight: bold">New Record</h1>
         <b-form id="new_data">
            <b-form-group
               label="BC No."
               label-for="bc"
            >
            <b-form-input :state="user_exist" v-model="bc" id="bc"></b-form-input>
            </b-form-group>

            <b-form-group
               label="Date"
               label-for="date"
            >
            <b-form-input type="date" v-model="check_date" id="date"></b-form-input>
            </b-form-group>

            <b-form-group
               label="Age (Weeks)"
               label-for="age"
            >
            <b-form-input type="number" v-model="age" id="age"></b-form-input>
            </b-form-group>


            <b-form-group label="Vaccine" label-for="vaccine">
               <b-form-checkbox-group stacked v-model="vaccine" :options="options" id="vaccine"></b-form-checkbox-group>
            </b-form-group>
 
 
            <b-form-group
               label="Weight (KG)"
               label-for="weight"
            >
            <b-form-input type="number" step="0.001" v-model="weight" id="weight"></b-form-input>
            </b-form-group>

            
            <b-form-group
               label="Body Length (CM)"
               label-for="body_length"
            >
            <b-form-input type="number" step="0.001" v-model="body_length" id="body_length"></b-form-input>
            </b-form-group>

            
            <b-form-group
               label="Head Circumference (CM)"
               label-for="head_circumference"
            >
            <b-form-input type="number" step="0.001" v-model="head_circumference" id="head_circumference"></b-form-input>
            </b-form-group>

            <b-form-group
               label="Tindak Balas"
               label-for="tindak_balas"
            >
            <b-form-select v-model="tindak_balas" id="tindak_balas" :options="bool"></b-form-select>
            </b-form-group>

            <b-form-group
               label="Jaundice"
               label-for="jaundice"
            >
            <b-form-select v-model="jaundice" id="jaundice" :options="bool"></b-form-select>
            </b-form-group>

            <b-button v-on:click="addRecord" type="submit" variant="primary">Done</b-button>
         </b-form>   
      </div>
   </div>
</template>

<script>
   export default {
      data(){
         return {
            vaccine_id: '', 
            bcs: [],
            bc: '',
            check_date: '',
            age: '',
            weight: '',
            body_length: '',
            head_circumference: '',
            tindak_balas: 0,
            jaundice: 0,
            vaccine: [], 
            bool: [
               { value: 0, text: 'No' },
               { value: 1, text: 'Yes'}
            ], 
            options: [
               { value: 'BCG', text: 'BCG' },
               { value: 'Hepatitis_B(dos1)', text: 'Hepatitis_B(dos1)' },
               { value: 'Hepatitis_B(dos2)', text: 'Hepatitis_B(dos2)' },
               { value: 'DTaP/DT(dos1)', text: 'DTaP/DT(dos1)' },
               { value: 'Hib(dos1)', text: 'Hib(dos1)' },
               { value: 'IPV(dos1)', text: 'IPV(dos1)' },
               { value: 'DTaP/DT(dos2)', text: 'DTaP/DT(dos2)' },
               { value: 'Hib(dos2)', text: 'Hib(dos2)' },
               { value: 'IPV(dos2)', text: 'IPV(dos2)' },
               { value: 'DTaP/DT(dos3)', text: 'DTaP/DT(dos3)' },
               { value: 'Hib(dos3)', text: 'Hib(dos3)' },
               { value: 'IPV(dos3)', text: 'IPV(dos3)' },
               { value: 'Hepatitis_B(dos3)', text: 'Hepatitis_B(dos3)' },
               { value: 'Measles(Sabah)', text: 'Measles(Sabah)' },
               { value: 'JE(dos1)_Sarawak', text: 'JE(dos1)_Sarawak' },
               { value: 'JE(dos2)_Sarawak', text: 'JE(dos2)_Sarawak' },
               { value: 'MMR', text: 'MMR' },
               { value: 'DTaP/DT(booster)', text: 'DTaP/DT(booster)' },
               { value: 'IPV(booster)', text: 'IPV(booster)' },
               { value: 'Hib(booster)', text: 'Hib(booster)' },
               { value: 'JE(dos3)_Sarawak', text: 'JE(dos3)_Sarawak' },
            ]
         }
      },

      methods: {
         addRecord(){
            this.axios.post('api/new_records', {
               'bc': this.bc,
               'check_date': this.check_date, 
               'age': this.age,
               'weight': this.weight,
               'body_length': this.body_length, 
               'head_circumference': this.head_circumference, 
               'tindak_balas': this.tindak_balas,
               'jaundice': this.jaundice, 
               'vaccine_id': this.vaccine_id
            })

            var data = { 'bc': this.bc };
               for(var i=0; i<this.vaccine.length; i++){
                  var d = this.vaccine[i];
                  data[d] = 1;
               };
               this.axios.post('api/new_vaccination', data)
            }
      },

      computed: {
         pre_json(){
            var data = {};
            for(var i=0; i<this.vaccine.length; i++){
               var d = this.vaccine[i];
               data[d] = 1;
            };
            return data;
         },

         user_exist(){
            var bool = false;
            for(var i=0; i<this.bcs.length; i++){
               if(this.bcs[i] === this.bc){
                  bool = true;
               }
            }
            return bool;
         }
      },

      mounted(){ 
         this.axios.get('api/get_vaccines')
         .then(response => {
            if(response.data.length === 0){
               this.vaccine_id = 1;
            }
            else{
               this.vaccine_id = response.data.length + 1;
            }
         });

         this.axios.get('api/allbc')
         .then(response => {
            for(var i=0; i<response.data.length; i++){
               this.bcs.push(response.data[i].bc);
            }
         })
      }
   }
</script>
 