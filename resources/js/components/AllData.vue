<template>
   <div id="previous_data">
      <b-navbar toggleable="lg" type="dark" variant="dark" class="w-100">
         <b-navbar-brand href="#">MYHackathon</b-navbar-brand>
      </b-navbar> 
      <div class="container-fluid mt-3">
         <h1 style="font-weight: bold;">Record Search</h1>
         <b-form id="data_field">
            <div class="row">
               <b-form-group class="col" label="BC No." label-for="bc">
                  <b-form-input :state="user_exist" id="bc" v-model="bc"></b-form-input>
               </b-form-group>
            </div> 
            <b-button v-if="user_exist" variant="primary" href="/everydaycheck">Add Record</b-button>
            <b-button v-if="filter_data.toString() === '' && !user_exist && bc.length == 12" variant="success" href="/newbaby">Add New baby</b-button>
         </b-form>
         <div id="allrecord" v-if="bc.length == 12 && user_exist">
            <b-table sticky-head striped :items="data"></b-table> 
         </div>
      </div>
   </div>
</template>

<script> 
   export default {
      data(){
         return {
            bc: "", 
            data: [], 
            filtered: [],
            bcs: []
         }
      }, 

      mounted(){
         this.axios.get('api/alldata')
         .then(response => {
            this.data = response.data; 
            console.log(this.data);          
         }),

         this.axios.get('api/allbc')
         .then(response => {
            for(var i=0; i<response.data.length; i++){
               this.bcs.push(response.data[i].bc);
            }
            console.log(this.bcs)
         })
      },
         
      computed: {
         filter_data(){
            return this.data.filter(d => {
               return d.bc.match(this.bc);
            })
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
      }
   }
</script> 